<?php

use MockApiTesting\DTO\CityDTO;
use MockApiTesting\DTO\StationDTO;
use MockApiTesting\DTO\TimeFrameDTO;

describe('DTOs', function () {
    it('creates CityDTO from array', function () {
        $data = [
            'id' => 1,
            'name' => 'Milano',
            'country' => 'IT',
            'country_name' => 'Italy',
            'country_translated' => 'Italia',
        ];

        $city = CityDTO::fromArray($data);

        expect($city)
            ->toBeInstanceOf(CityDTO::class)
            ->and($city->id)->toBe(1)
            ->and($city->name)->toBe('Milano')
            ->and($city->country)->toBe('IT')
            ->and($city->countryName)->toBe('Italy')
            ->and($city->countryTranslated)->toBe('Italia');
    });

    it('creates StationDTO from array', function () {
        $data = [
            'id' => 1,
            'name' => 'Milano Station',
            'city' => [
                'id' => 1,
                'name' => 'Milano',
                'country' => 'IT',
                'country_name' => 'Italy',
                'country_translated' => 'Italia',
            ],
            'enabled' => true,
            'public' => true,
            'one_way' => true,
            'returns' => [2, 3],
        ];

        $station = StationDTO::fromArray($data);

        expect($station)
            ->toBeInstanceOf(StationDTO::class)
            ->and($station->id)->toBe(1)
            ->and($station->name)->toBe('Milano Station')
            ->and($station->city)->toBeInstanceOf(CityDTO::class)
            ->and($station->enabled)->toBeTrue()
            ->and($station->returns)->toBe([2, 3]);
    });

    it('creates TimeFrameDTO from array', function () {
        $data = [
            'startDate' => '2024-01-01T00:00:00+00:00',
            'endDate' => '2024-01-08T00:00:00+00:00',
        ];

        $timeframe = TimeFrameDTO::fromArray($data);

        expect($timeframe)
            ->toBeInstanceOf(TimeFrameDTO::class)
            ->and($timeframe->startDate)->toBeInstanceOf(DateTimeImmutable::class)
            ->and($timeframe->startDate->format('Y-m-d'))->toBe('2024-01-01')
            ->and($timeframe->endDate->format('Y-m-d'))->toBe('2024-01-08');
    });
});
