<?php

namespace MockApiTesting\DTO;

class CityDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public string $country,
        public string $countryName,
        public string $countryTranslated
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
            country: $data['country'],
            countryName: $data['country_name'],
            countryTranslated: $data['country_translated']
        );
    }
}

