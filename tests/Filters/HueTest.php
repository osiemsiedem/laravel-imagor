<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\Hue;

test('hue', function ($value, $expected) {
    $builder = new class
    {
        use Hue;

        public array $filters = [];
    };

    $builder->hue($value);

    expect($builder->filters['hue'])->toEqual("hue({$expected})");
})->with([
    [-1, '0'],
    [0, '0'],
    [275, '275'],
    [360, '360'],
    [500, '360'],
]);
