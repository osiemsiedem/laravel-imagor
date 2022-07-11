<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\Upscale;

test('upscale', function () {
    $builder = new class
    {
        use Upscale;

        public array $filters = [];
    };

    $builder->upscale();

    expect($builder->filters['upscale'])->toEqual('upscale()');
});
