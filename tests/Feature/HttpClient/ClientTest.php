<?php

use MockApiTesting\HttpClient\Client;
use Symfony\Component\HttpClient\HttpClient;

beforeEach(function () {
    $this->baseUrl = 'http://127.0.0.1:9501';
    $this->lang = 'it';

    $this->client = new Client(
        HttpClient::create([
            'verify_host' => false,
            'verify_peer' => false,
        ]),
        $this->baseUrl,
        $this->lang
    );
});

it('fetches stations list', function () {
    $result = $this->client->fetch(
        'translations/stations',
        null,
        true
    );

    expect($result)
        ->toBeArray()
        ->toHaveCount(1)
        ->and($result[0])
        ->toHaveKey('translations')
        ->toHaveKey('country_translations');
});

it('fetches single station', function () {
    $result = $this->client->fetch(
        'rally/stations',
        '1',
        false
    );

    expect($result)
        ->toBeObject()
        ->toHaveProperty('id')
        ->toHaveProperty('name')
        ->toHaveProperty('city');
});

it('builds correct URI with language', function () {
    $uri = $this->client->buildUri('rally/stations', '1', false);
    expect($uri)->toBe('http://127.0.0.1:9501/it/rally/stations/1');
});

it('builds correct URI without language', function () {
    $uri = $this->client->buildUri('translations/stations', null, true);
    expect($uri)->toBe('http://127.0.0.1:9501/translations/stations');
});
