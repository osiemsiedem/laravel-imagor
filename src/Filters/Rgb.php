<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor\Filters;

trait Rgb
{
    /**
     * Set the amount of color in each of the channels.
     *
     * @return $this
     */
    public function rgb(int $red, int $green, int $blue): self
    {
        $this->filters['rgb'] = sprintf('rgb(%d,%d,%d)',
            $this->parseChannel($red),
            $this->parseChannel($green),
            $this->parseChannel($blue)
        );

        return $this;
    }

    /**
     * Parse the channel.
     */
    protected function parseChannel(int $channel): int
    {
        return min(max($channel, -100), 100);
    }
}
