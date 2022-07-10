<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Filters;

trait Contrast
{
    /**
     * Apply the contrast adjustment to the image.
     *
     * @param  int  $amount
     * @return $this
     */
    public function contrast(int $amount): self
    {
        $this->filters['contrast'] = sprintf('contrast(%d)',
            min(max($amount, -100), 100)
        );

        return $this;
    }
}
