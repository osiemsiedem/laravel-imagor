<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\Rgb;

test('rgb', function ($red, $green, $blue, $expected) {
    $builder = new class
    {
        use Rgb;

        public array $filters = [];
    };

    $builder->rgb($red, $green, $blue);

    expect($builder->filters['rgb'])->toEqual("rgb({$expected})");
})->with([
    [-101, -200, -5, '-100,-100,-5'],
    [-100, -100, -100, '-100,-100,-100'],
    [0, 0, 0, '0,0,0'],
    [13, 52, 15, '13,52,15'],
    [100, 100, 100, '100,100,100'],
    [105, 33, 900, '100,33,100'],
]);
