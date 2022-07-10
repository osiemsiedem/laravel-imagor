<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\Brightness;

test('brightness', function ($value, $expected) {
    $filter = new Brightness($value);

    expect($filter)->toEqual("brightness({$expected})");
})->with([
    [-101, -100],
    [-100, -100],
    [0, 0],
    [13, 13],
    [100, 100],
    [101, 100],
]);
