<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Filters;

trait Hue
{
    /**
     * Apply the hue adjustment to the image.
     *
     * @return $this
     */
    public function hue(int $angle): self
    {
        $this->filters['hue'] = sprintf('hue(%d)',
            min(max($angle, 0), 360)
        );

        return $this;
    }
}
