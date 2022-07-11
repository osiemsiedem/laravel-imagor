<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\Quality;

test('quality', function ($value, $expected) {
    $builder = new class
    {
        use Quality;

        public array $filters = [];
    };

    $builder->quality($value);

    expect($builder->filters['quality'])->toEqual("quality({$expected})");
})->with([
    [-1, '0'],
    [0, '0'],
    [1, '1'],
    [54, '54'],
    [100, '100'],
    [101, '100'],
]);
