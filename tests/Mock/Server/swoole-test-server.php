<?php

use Swoole\Http\Server;
use Swoole\Http\Request;
use Swoole\Http\Response;

$host = '127.0.0.1';
$port = 9501;

$mockData = require __DIR__.'/../Data/mock-data.php';
$server = new Server($host, $port);

$server->on('request', function (Request $request, Response $response) use ($mockData) {
    $path = trim($request->server['request_uri'], '/');
    echo sprintf("[%s] Request: %s\n", date('Y-m-d H:i:s'), $path);

    $response->header('Content-Type', 'application/json');

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

        default:
            $response->status(404);
            $response->end(json_encode([
                'error' => 'Not Found',
                'message' => 'Endpoint not found',
            ]));
            break;
    }
});

echo sprintf("\n🚀 Mock Server running at http://%s:%d\n\n", $host, $port);
echo "Available endpoints:\n";
echo "  - GET /translations/stations\n";
echo "  - GET /it/rally/stations\n";
echo "  - GET /it/rally/stations/1\n";
echo "  - GET /it/rally/timeframes/1-2\n\n";

$server->start();
