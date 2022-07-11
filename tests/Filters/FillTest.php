<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\Fill;

test('fill', function ($value, $expected) {
    $builder = new class
    {
        use Fill;

        public array $filters = [];
    };

    $builder->fill($value);

    expect($builder->filters['fill'])->toEqual("fill({$expected})");
})->with([
    ['red', 'red'],
    ['white', 'white'],
    ['#ff0000', 'ff0000'],
    ['1e50fe', '1e50fe'],
    ['auto', 'auto'],
    ['blur', 'blur'],
]);
