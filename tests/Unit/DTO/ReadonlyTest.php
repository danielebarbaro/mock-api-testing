<?php

use MockApiTesting\DTO\CityDTO;
use MockApiTesting\DTO\StationDTO;

it('prevents modification of readonly properties', function () {
    $station = new StationDTO(
        id: 1,
        name: 'Milano Station',
        city: new CityDTO(1, 'Milano', 'IT', 'Italy', 'Italia')
    );

    expect(fn() => $station->name = 'Rome')
        ->toThrow(Error::class, 'Cannot modify readonly property');
});

it('allows reading readonly properties', function () {
    $station = new StationDTO(
        id: 1,
        name: 'Milano Station',
        city: new CityDTO(1, 'Milano', 'IT', 'Italy', 'Italia')
    );

    expect($station->name)->toBe('Milano Station')
        ->and($station->id)->toBe(1)
        ->and($station->city)->toBeInstanceOf(CityDTO::class);
});

it('maintains immutability through object graph', function () {
    $station = StationDTO::fromArray([
        'id' => 1,
        'name' => 'Milano Station',
        'city' => [
            'id' => 1,
            'name' => 'Milano',
            'country' => 'IT',
            'country_name' => 'Italy',
            'country_translated' => 'Italia'
        ]
    ]);

    expect(fn() => $station->city->name = 'Rome')
        ->toThrow(Error::class, 'Cannot modify readonly property');
});
