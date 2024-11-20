<?php

use MockApiTesting\Exception\APIException;

it('creates an exception from a status code', function () {
    $statusCode = 500;
    $exception = APIException::fromStatusCode($statusCode);

    expect($exception)
        ->toBeInstanceOf(APIException::class)
        ->getMessage()->toBe('API Fail, status code: 500');
});

it('creates an exception from a message', function () {
    $message = 'Something went wrong';
    $exception = APIException::fromMessage($message);

    expect($exception)
        ->toBeInstanceOf(APIException::class)
        ->getMessage()->toBe('API error: Something went wrong');
});
