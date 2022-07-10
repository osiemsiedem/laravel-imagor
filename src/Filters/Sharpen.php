<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Filters;

trait Sharpen
{
    /**
     * Apply the sharpen to the image.
     *
     * @param  float|int  $sigma
     * @return $this
     */
    public function sharpen(float|int $sigma): self
    {
        $this->filters['sharpen'] = sprintf('sharpen(%g)',
            min(max($sigma, 0.000001), 10000)
        );

        return $this;
    }
}
