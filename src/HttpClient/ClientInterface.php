<?php

namespace MockApiTesting\HttpClient;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface ClientInterface
{
    public function fetch(
        string $resourcePath,
        ?string $resourceId = null,
        bool $ignoreLanguage = false
    ): array|object;

    public function buildUri(
        string $resourcePath,
        ?string $resourceId,
        bool $ignoreLanguage
    ): string;

    public function parseResponse(
        ResponseInterface $response
    ): array|object;
}
