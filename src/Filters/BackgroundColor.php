<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Filters;

trait BackgroundColor
{
    /**
     * Set the background color of the image.
     *
     * @return $this
     */
    public function backgroundColor(string $color): self
    {
        if (str_starts_with($color, '#')) {
            $color = substr($color, 1);
        }

        $this->filters['background_color'] = "background_color({$color})";

        return $this;
    }
}
