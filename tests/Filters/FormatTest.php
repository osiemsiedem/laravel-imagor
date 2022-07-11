<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\Format;

test('format', function ($value, $expected) {
    $builder = new class
    {
        use Format;

        public array $filters = [];
    };

    $builder->format($value);

    expect($builder->filters['format'])->toEqual("format({$expected})");
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
    $builder = new class
    {
        use Format;

        public array $filters = [];
    };

    $builder->format('psd');
})->throws(InvalidArgumentException::class);
