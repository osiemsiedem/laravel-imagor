<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\Saturation;

test('saturation', function ($value, $expected) {
    $builder = new class
    {
        use Saturation;

        public array $filters = [];
    };

    $builder->saturation($value);

    expect($builder->filters['saturation'])->toEqual("saturation({$expected})");
})->with([
    [-101, '-100'],
    [-100, '-100'],
    [0, '0'],
    [13, '13'],
    [100, '100'],
    [101, '100'],
]);
