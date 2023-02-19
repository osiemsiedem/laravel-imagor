<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Filters;

trait Quality
{
    /**
     * Set the image compression quality.
     *
     * @return $this
     */
    public function quality(int $quality): self
    {
        $this->filters['quality'] = sprintf('quality(%d)',
            min(max($quality, 0), 100)
        );

        return $this;
    }
}
