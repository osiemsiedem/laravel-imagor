<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\Rotate;

test('rotate', function ($value, $expected) {
    $builder = new class
    {
        use Rotate;

        public array $filters = [];
    };

    $builder->rotate($value);

    expect($builder->filters['rotate'])->toEqual("rotate({$expected})");
})->with([
    [-5, '0'],
    [0, '0'],
    [90, '90'],
    [92, '0'],
    [180, '180'],
    [270, '270'],
    [360, '0'],
    [365, '0'],
]);
