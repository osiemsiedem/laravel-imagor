<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\BackgroundColor;

test('background_color', function ($value, $expected) {
    $filter = new BackgroundColor($value);

    expect($filter)->toEqual("background_color({$expected})");
})->with([
    ['red', 'red'],
    ['white', 'white'],
    ['#ff0000', 'ff0000'],
    ['1e50fe', '1e50fe'],
]);
