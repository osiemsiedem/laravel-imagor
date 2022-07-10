<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\Fill;

test('background_color', function ($value, $expected) {
    $filter = new Fill($value);

    expect($filter)->toEqual("fill({$expected})");
})->with([
    ['red', 'red'],
    ['white', 'white'],
    ['#ff0000', 'ff0000'],
    ['1e50fe', '1e50fe'],
    ['auto', 'auto'],
    ['blur', 'blur'],
]);
