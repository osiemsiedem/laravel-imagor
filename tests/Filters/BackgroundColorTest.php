<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\BackgroundColor;

test('background_color', function ($value, $expected) {
    $builder = new class
    {
        use BackgroundColor;

        public array $filters = [];
    };

    $builder->backgroundColor($value);

    expect($builder->filters['background_color'])->toEqual("background_color({$expected})");
})->with([
    ['red', 'red'],
    ['white', 'white'],
    ['#ff0000', 'ff0000'],
    ['1e50fe', '1e50fe'],
]);
