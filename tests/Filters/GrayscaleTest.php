<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Filters\Grayscale;

test('grayscale')
    ->expect(new Grayscale)
    ->toEqual('grayscale()');
