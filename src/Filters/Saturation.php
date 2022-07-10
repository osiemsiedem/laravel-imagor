<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Filters;

trait Saturation
{
    /**
     * Apply the saturation adjustment to the image.
     *
     * @param  int  $amount
     * @return $this
     */
    public function saturation(int $amount): self
    {
        $this->filters['saturation'] = sprintf('saturation(%d)',
            min(max($amount, -100), 100)
        );

        return $this;
    }
}
