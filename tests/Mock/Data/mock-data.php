<?php

return [
    'translations/stations' => [[
        'id' => 1,
        'translations' => [
            'it' => ['name' => 'Milano'],
            'en' => ['name' => 'Milan']
        ],
        'country_translations' => [
            'it' => ['name' => 'Italia'],
            'en' => ['name' => 'Italy']
        ],
        'country_codes' => ['IT', 'ITA']
    ]],

    'rally_stations' => [[
        'id' => 1,
        'name' => 'Milano',
        'city' => [
            'id' => 1,
            'name' => 'Milano',
            'country' => 'IT',
            'country_name' => 'Italy',
            'country_translated' => 'Italia'
        ],
        'enabled' => true,
        'public' => true,
        'one_way' => true,
        'returns' => [2, 3]
    ]],

    'timeframes' => [[
        'startDate' => '2024-01-01T00:00:00+00:00',
        'endDate' => '2024-01-08T00:00:00+00:00'
    ]]
];
