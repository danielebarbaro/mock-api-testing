<?php

namespace MockApiTesting\DTO;

use DateTimeImmutable;

class TimeFrameDTO
{
    public function __construct(
        public readonly DateTimeImmutable $startDate,
        public readonly DateTimeImmutable $endDate
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            startDate: new DateTimeImmutable($data['startDate']),
            endDate: new DateTimeImmutable($data['endDate'])
        );
    }
}
