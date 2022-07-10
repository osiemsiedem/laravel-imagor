<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Filters;

trait Rotate
{
    /**
     * Rotate the image.
     *
     * @param  int  $angle
     * @return $this
     */
    public function rotate(int $angle): self
    {
        $this->filters['rotate'] = sprintf('rotate(%d)',
            in_array($angle, [0, 90, 180, 270]) ? $angle : 0
        );

        return $this;
    }
}
