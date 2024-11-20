<?php

use OpenSwoole\HTTP\Server;
use OpenSwoole\HTTP\Request;
use OpenSwoole\HTTP\Response;
use OpenSwoole\Constant;

$host = '127.0.0.1';
$port = 9501;

$server = new Server($host, $port);
$mockData = require __DIR__ . '/../Data/mock-data.php';

$server->set([
    'worker_num' => 2,
    'log_level' => Constant::LOG_INFO,
    'log_rotation' => Constant::LOG_ROTATION_DAILY,
    'log_date_format' => '%Y-%m-%d %H:%M:%S',
    'max_request' => 10000,
    'buffer_output_size' => 32 * 1024 * 1024, // 32MB
    'package_max_length' => 10 * 1024 * 1024, // 10MB
    'hook_flags' => SWOOLE_HOOK_ALL,
]);

$server->on('start', function (Server $server) use ($host, $port) {
    echo sprintf("\n🚀 OpenSwoole Mock Server v%s\n", OPENSWOOLE_VERSION);
    echo sprintf("Server running at http://%s:%d\n\n", $host, $port);
    echo "Available endpoints:\n";
    echo "  - GET /translations/stations\n";
    echo "  - GET /it/rally/stations\n";
    echo "  - GET /it/rally/stations/{id}\n";
    echo "  - GET /it/rally/timeframes/{stationIds}\n";
    echo "  - GET /health\n\n";
});

$server->on('request', function (Request $request, Response $response) use ($mockData) {
    $startTime = microtime(true);
    $path = trim($request->server['request_uri'], '/');

    $server = $request->server;
    $logMessage = sprintf(
        "[%s] %s %s %s",
        date('Y-m-d H:i:s'),
        $server['remote_addr'],
        $server['request_method'],
        $server['request_uri']
    );
    error_log($logMessage);

    $response->header('Access-Control-Allow-Origin', '*');
    $response->header('Access-Control-Allow-Methods', 'GET, OPTIONS');
    $response->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');

    if ($request->server['request_method'] === 'OPTIONS') {
        $response->status(204);
        $response->end();
        return;
    }

    $response->header('Content-Type', 'application/json');

    try {
        switch ($path) {
            case 'translations/stations':
                $response->end(json_encode($mockData['translations/stations']));
                break;

            case 'it/rally/stations':
                $response->end(json_encode($mockData['rally_stations']));
                break;

            case 'it/rally/stations/1':
                $response->end(json_encode($mockData['rally_stations'][0]));
                break;

            case 'it/rally/timeframes/1-2':
                $response->end(json_encode($mockData['timeframes']));
                break;

            case 'health':
                $response->end(json_encode([
                    'status' => 'ok',
                    'version' => OPENSWOOLE_VERSION,
                    'timestamp' => time(),
                    'uptime' => time() - $server->stats()['start_time']
                ]));
                break;

            default:
                $response->status(404);
                $response->end(json_encode([
                    'error' => 'Not Found',
                    'message' => 'Endpoint not found'
                ]));
                break;
        }
    } catch (Throwable $e) {
        error_log("Error: " . $e->getMessage());
        $response->status(500);
        $response->end(json_encode([
            'error' => 'Internal Server Error',
            'message' => $e->getMessage()
        ]));
    } finally {
        $duration = (microtime(true) - $startTime) * 1000;
        error_log(sprintf("Response time: %.2fms", $duration));
    }
});

$server->on('workerStart', function (Server $server, int $workerId) {
    echo sprintf("Worker #%d started\n", $workerId);
});

$server->start();
