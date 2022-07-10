<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Filters;

trait Focal
{
    /**
     * Set the focal region.
     *
     * @param  float|int  $left
     * @param  float|int  $top
     * @param  float|int  $right
     * @param  float|int  $bottom
     * @return $this
     */
    public function focal(float|int $left, float|int $top, float|int $right, float|int $bottom): self
    {
        $this->filters['focal'] = sprintf('focal(%gx%g:%gx%g)',
            $this->parseCoordinate($left),
            $this->parseCoordinate($top),
            $this->parseCoordinate($right),
            $this->parseCoordinate($bottom)
        );

        return $this;
    }

    /**
     * Parse the coordinate.
     *
     * @param  float|int  $value
     * @return float|int
     */
    protected function parseCoordinate(float|int $value): float|int
    {
        return is_float($value) ? min(max($value, 0.0), 1.0) : $value;
    }
}
