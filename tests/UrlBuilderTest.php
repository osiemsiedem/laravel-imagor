<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\PathSigner;
use OsiemSiedem\Imagor\UrlBuilder;

it('generates unsafe url', function () {
    $builder = new UrlBuilder('http://example.com');

    $builder->image('cat.jpg');

    expect($builder->build())->toEqual('http://example.com/unsafe/cat.jpg');
});

it('uses path signer to sign the url', function () {
    $builder = new UrlBuilder('http://example.com');

    $builder->setPathSigner(new PathSigner('mysecret'));

    $builder->image('dog.webp');

    expect($builder->build())->toEqual('http://example.com/LIn-ESjGT_U-4P2-o92AuA8BZ58=/dog.webp');
});

it('supports "trim" parameter', function () {
    $builder = new UrlBuilder('http://example.com');

    $builder
        ->image('image.jpg')
        ->trim();

    expect($builder->build())->toEqual('http://example.com/unsafe/trim/image.jpg');
});

it('supports "fit-in" parameter', function () {
    $builder = new UrlBuilder('http://example.com');

    $builder
        ->image('image.jpg')
        ->fitIn();

    expect($builder->build())->toEqual('http://example.com/unsafe/fit-in/image.jpg');
});

it('supports "stretch" parameter', function () {
    $builder = new UrlBuilder('http://example.com');

    $builder
        ->image('image.jpg')
        ->stretch();

    expect($builder->build())->toEqual('http://example.com/unsafe/stretch/image.jpg');
});

it('resizes the image', function ($width, $height, $expected) {
    $builder = new UrlBuilder('http://example.com');

    $builder
        ->image('image.jpg')
        ->size($width, $height);

    expect($builder->build())->toEqual("http://example.com/unsafe/{$expected}/image.jpg");
})->with([
    [640, 480, '640x480'],
    [null, 100, '0x100'],
    [250, null, '250x0'],
]);

it('supports "smart" parameter', function () {
    $builder = new UrlBuilder('http://example.com');

    $builder
        ->image('image.jpg')
        ->smart();

    expect($builder->build())->toEqual('http://example.com/unsafe/smart/image.jpg');
});

