<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\Grayscale;

test('grayscale', function () {
    $builder = new class
    {
        use Grayscale;

        public array $filters = [];
    };

    $builder->grayscale();

    expect($builder->filters['grayscale'])->toEqual('grayscale()');
});
