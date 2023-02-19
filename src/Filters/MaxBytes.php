<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Filters;

trait MaxBytes
{
    /**
     * Set the maximum size (in bytes) of the image.
     *
     * @return $this
     */
    public function maxBytes(int $bytes): self
    {
        $this->filters['max_bytes'] = sprintf('max_bytes(%d)', max($bytes, 1));

        return $this;
    }
}
