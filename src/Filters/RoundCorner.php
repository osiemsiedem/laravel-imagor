<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Filters;

trait RoundCorner
{
    /**
     * Add the watermark to the image.
     *
     * @param  string  $image
     * @param  int  $rx
     * @param  int|null  $ry
     * @param  string|null  $color
     * @return $this
     */
    public function roundCorner(int $rx, ?int $ry = null, ?string $color = null): self
    {
        $keys = ['%d'];
        $values = [max($rx, 1)];

        if (func_num_args() > 1) {
            $keys[] = '%d';
            $values[] = max($ry, 1);

            if (isset($color)) {
                if (str_starts_with($color, '#')) {
                    $color = substr($color, 1);
                }

                $keys[] = '%s';
                $values[] = $color;
            }
        }

        $this->filters['round_corner'] = sprintf('round_corner('.implode(',', $keys).')', ...$values);

        return $this;
    }
}
