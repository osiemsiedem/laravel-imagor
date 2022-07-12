<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\Factory;
use OsiemSiedem\Imagor\UrlBuilder;

it('creates new url builder instance', function () {
    $builder = (new Factory('http://example.com'))->make('test.png');

    expect($builder)->toBeInstanceOf(UrlBuilder::class);

    expect($builder->build())->toEqual('http://example.com/unsafe/test.png');
});
