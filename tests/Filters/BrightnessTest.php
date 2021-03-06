<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\Brightness;

test('brightness', function ($value, $expected) {
    $builder = new class
    {
        use Brightness;

        public array $filters = [];
    };

    $builder->brightness($value);

    expect($builder->filters['brightness'])->toEqual("brightness({$expected})");
})->with([
    [-101, '-100'],
    [-100, '-100'],
    [0, '0'],
    [13, '13'],
    [100, '100'],
    [101, '100'],
]);
