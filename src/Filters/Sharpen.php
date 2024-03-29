<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Filters;

trait Sharpen
{
    /**
     * Apply the sharpen to the image.
     *
     * @return $this
     */
    public function sharpen(float|int $sigma): self
    {
        $this->filters['sharpen'] = sprintf(
            'sharpen(%s)',
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
