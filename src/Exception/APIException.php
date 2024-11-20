<?php

namespace MockApiTesting\Exception;

use Exception;

class APIException extends Exception
{
    public static function fromStatusCode(int $statusCode): self
    {
        return new self('API Fail, status code: '.$statusCode);
    }

    public static function fromMessage(string $message): self
    {
        return new self('API error: '.$message);
    }
}
