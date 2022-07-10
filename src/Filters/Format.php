<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Filters;

use InvalidArgumentException;

trait Format
{
    /**
     * Set the output format of the image.
     *
     * @param  string  $format
     * @return $this
     */
    public function format(string $format): self
    {
        $format = strtolower($format);

        if (! in_array($format, ['avif', 'gif', 'jpeg', 'jpg', 'png', 'tiff', 'webp'])) {
            throw new InvalidArgumentException("Format [{$format}] not supported.");
        }

        if ($format === 'jpg') {
            $format = 'jpeg';
        }

        $this->filters['format'] = "format({$format})";

        return $this;
    }
}
