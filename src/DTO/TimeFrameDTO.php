<?php

namespace MockApiTesting\DTO;

use DateTimeImmutable;

readonly class TimeFrameDTO
{
    public function __construct(
        public DateTimeImmutable $startDate,
        public DateTimeImmutable $endDate
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            startDate: new DateTimeImmutable($data['startDate']),
            endDate: new DateTimeImmutable($data['endDate'])
        );
    }
}
