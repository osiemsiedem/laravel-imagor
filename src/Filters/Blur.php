<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Filters;

trait Blur
{
    /**
     * Apply the gaussian blur to the image.
     *
     * @param  float|int  $sigma
     * @return $this
     */
    public function blur(float|int $sigma): self
    {
        $this->filters['blur'] = sprintf('blur(%g)',
            min(max($sigma, 0.000001), 10000)
        );

        return $this;
    }
}
