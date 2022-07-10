<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Filters;

trait Grayscale
{
    /**
     * Convert the image into grayscale.
     *
     * @return $this
     */
    public function grayscale(): self
    {
        $this->filters['grayscale'] = 'grayscale()';

        return $this;
    }
}
