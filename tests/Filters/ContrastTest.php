<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\Contrast;

test('contrast', function ($value, $expected) {
    $builder = new class
    {
        use Contrast;

        public array $filters = [];
    };

    $builder->contrast($value);

    expect($builder->filters['contrast'])->toEqual("contrast({$expected})");
})->with([
    [-101, '-100'],
    [-100, '-100'],
    [0, '0'],
    [13, '13'],
    [100, '100'],
    [101, '100'],
]);
