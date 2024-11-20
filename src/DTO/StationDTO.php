<?php

namespace MockApiTesting\DTO;

class StationDTO
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly CityDTO $city,
        public readonly bool $enabled = true,
        public readonly bool $public = true,
        public readonly bool $oneWay = false,
        public readonly array $returns = []
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
            city: CityDTO::fromArray($data['city']),
            enabled: $data['enabled'] ?? true,
            public: $data['public'] ?? true,
            oneWay: $data['one_way'] ?? false,
            returns: $data['returns'] ?? []
        );
    }
}
