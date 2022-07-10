<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\MaxBytes;

test('max_bytes', function ($value, $expected) {
    $filter = new MaxBytes($value);

    expect($filter)->toEqual("max_bytes({$expected})");
})->with([
    [-1, 1],
    [0, 1],
    [1, 1],
    [60000, 60000],
]);
