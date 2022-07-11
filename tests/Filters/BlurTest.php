<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\Blur;

test('blur', function ($value, $expected) {
    $builder = new class
    {
        use Blur;

        public array $filters = [];
    };

    $builder->blur($value);

    expect($builder->filters['blur'])->toEqual("blur({$expected})");
})->with([
    [0.0000001, '0.000001'],
    [0.000001, '0.000001'],
    [5, '5'],
    [22.3, '22.3'],
    [10000, '10000'],
    [10001, '10000'],
]);
