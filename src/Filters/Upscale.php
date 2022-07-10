<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Filters;

trait Upscale
{
    /**
     * Upscale the image.
     *
     * @return $this
     */
    public function upscale(): self
    {
        $this->filters['upscale'] = 'upscale()';

        return $this;
    }
}
