<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\Format;

test('format', function ($value, $expected) {
    $filter = new Format($value);

    expect($filter)->toEqual("format({$expected})");
})->with([
    ['avif', 'avif'],
    ['gif', 'gif'],
    ['GIF', 'gif'],
    ['jpeg', 'jpeg'],
    ['jpg', 'jpeg'],
    ['png', 'png'],
    ['tiff', 'tiff'],
    ['webp', 'webp'],
]);

it('throws exception for unsupported formats', function () {
    new Format('psd');
})->throws(InvalidArgumentException::class);
