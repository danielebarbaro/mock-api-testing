<?php

namespace MockApiTesting\HttpClient;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class Client implements ClientInterface
{
    public function __construct(
        private HttpClientInterface $client,
        private string $baseUrl,
        private string $lang = 'it'
    ) {
        $this->client = $client;
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->lang = $lang;
    }

    public function fetch(
        string $resourcePath,
        ?string $resourceId = null,
        bool $ignoreLanguage = false
    ): array|object {
        $uri = $this->buildUri($resourcePath, $resourceId, $ignoreLanguage);

        $response = $this->client->request('GET', $uri);

        return $this->parseResponse($response);
    }

    public function buildUri(
        string $resourcePath,
        ?string $resourceId,
        bool $ignoreLanguage
    ): string {
        return implode('/', array_filter([
            $this->baseUrl,
            $ignoreLanguage ? null : $this->lang,
            $resourcePath,
            $resourceId,
        ], fn ($part) => !is_null($part)));
    }

    public function parseResponse(ResponseInterface $response): array|object
    {
        $data = $response->toArray();
        $isAssoc = array_keys($data) !== range(0, count($data) - 1);

        return $isAssoc ? (object) $data : $data;
    }
}
