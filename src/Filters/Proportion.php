<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Filters;

trait Proportion
{
    /**
     * Scale the image by a percentage of the original image size.
     *
     * @return $this
     */
    public function proportion(int $percentage): self
    {
        $this->filters['proportion'] = sprintf('proportion(%d)',
            min(max($percentage, 1), 100)
        );

        return $this;
    }
}
