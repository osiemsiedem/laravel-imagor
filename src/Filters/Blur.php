<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Filters;

trait Blur
{
    /**
     * Apply the gaussian blur to the image.
     *
     * @return $this
     */
    public function blur(float|int $sigma): self
    {
        $this->filters['blur'] = sprintf(
            'blur(%s)',
            rtrim(
                rtrim(
                    sprintf(
                        '%.6f',
                        min(max($sigma, 0.000001), 10000)
                    ),
                    '0'
                ),
                '.'
            )
        );

        return $this;
    }
}
