<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Filters;

trait Fill
{
    /**
     * Set the fill color of the missing area.
     *
     * @return $this
     */
    public function fill(string $color): self
    {
        if (str_starts_with($color, '#')) {
            $color = substr($color, 1);
        }

        $this->filters['fill'] = "fill({$color})";

        return $this;
    }
}
