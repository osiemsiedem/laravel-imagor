<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\Proportion;

test('proportion', function ($value, $expected) {
    $builder = new class
    {
        use Proportion;

        public array $filters = [];
    };

    $builder->proportion($value);

    expect($builder->filters['proportion'])->toEqual("proportion({$expected})");
})->with([
    [-5, '1'],
    [0, '1'],
    [1, '1'],
    [13, '13'],
    [100, '100'],
    [101, '100'],
]);
