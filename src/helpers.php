<?php

declare(strict_types=1);

if (! function_exists('imagor')) {
    /**
     * Imagor helper.
     *
     * @param  string  $image
     * @return \OsiemSiedem\Imagor\UrlBuilder
     */
    function imagor(string $image)
    {
        return \OsiemSiedem\Imagor\Facades\Imagor::make($image);
    }
}
