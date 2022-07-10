<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\Hue;

test('hue', function ($value, $expected) {
    $filter = new Hue($value);

    expect($filter)->toEqual("hue({$expected})");
})->with([
    [-1, 0],
    [0, 0],
    [275, 275],
    [360, 360],
    [500, 360],
]);
