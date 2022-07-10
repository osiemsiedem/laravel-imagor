<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\Focal;

test('focal', function ($left, $top, $right, $bottom, $expected) {
    $filter = new Focal($left, $top, $right, $bottom);

    expect($filter)->toEqual("focal({$expected})");
})->with([
    [0.0, 0.0, 1.0, 1.0, '0x0:1x1'],
    [-0.4, -1.5, 1.2, 1.1, '0x0:1x1'],
    [10, 15, 443, 500, '10x15:443x500'],
]);
