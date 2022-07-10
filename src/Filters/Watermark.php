<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Filters;

trait Watermark
{
    /**
     * Add the watermark to the image.
     *
     * @param  string  $image
     * @param  string|int  $x
     * @param  string|int  $y
     * @param  int  $alpha
     * @param  int|null  $widthRatio
     * @param  int|null  $heightRatio
     * @return $this
     */
    public function watermark(string $image, string|int $x, string|int $y, int $alpha, ?int $widthRatio = null, ?int $heightRatio = null): self
    {
        $keys = ['%s', '%s', '%s', '%d'];
        $values = [$image, $x, $y, min(max($alpha, 0), 100)];

        if (func_num_args() >= 5) {
            $keys[] = '%d';
            $values[] = min(max($widthRatio, 1), 100);

            $keys[] = '%d';
            $values[] = min(max($heightRatio, 1), 100);

            if (func_num_args() === 5) {
                array_pop($keys);
                array_pop($values);
            }
        }

        $this->filters['watermark'] = sprintf('watermark('.implode(',', $keys).')', ...$values);

        return $this;
    }
}
