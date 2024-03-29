<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \OsiemSiedem\Imagor\UrlBuilder make(string $image)
 *
 * @see \OsiemSiedem\Imagor\Factory
 */
class Imagor extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'imagor';
    }
}
