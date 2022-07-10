<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\Quality;

test('quality', function ($value, $expected) {
    $filter = new Quality($value);

    expect($filter)->toEqual("quality({$expected})");
})->with([
    [-1, 1],
    [0, 1],
    [1, 1],
    [54, 54],
    [100, 100],
    [101, 100],
]);
