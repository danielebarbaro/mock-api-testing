<?php

namespace MockApiTesting\DTO;

readonly class StationDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public CityDTO $city,
        public bool $enabled = true,
        public bool $public = true,
        public bool $oneWay = false,
        public array $returns = []
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
