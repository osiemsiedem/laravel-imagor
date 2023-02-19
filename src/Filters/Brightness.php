<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Filters;

trait Brightness
{
    /**
     * Apply the brightness adjustment to the image.
     *
     * @return $this
     */
    public function brightness(int $amount): self
    {
        $this->filters['brightness'] = sprintf('brightness(%d)',
            min(max($amount, -100), 100)
        );

        return $this;
    }
}
