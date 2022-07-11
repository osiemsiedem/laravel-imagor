<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor;

use RuntimeException;

class UrlBuilder
{
    use Filters\BackgroundColor;
    use Filters\Blur;
    use Filters\Brightness;
    use Filters\Contrast;
    use Filters\Fill;
    use Filters\Focal;
    use Filters\Format;
    use Filters\Grayscale;
    use Filters\Hue;
    use Filters\MaxBytes;
    use Filters\Proportion;
    use Filters\Quality;
    use Filters\Rgb;
    use Filters\Rotate;
    use Filters\Saturation;
    use Filters\Sharpen;
    use Filters\Upscale;
    use Filters\Watermark;

    /**
     * The path signer instance.
     *
     * @var \OsiemSiedem\Imagor\PathSigner
     */
    protected PathSigner $signer;

    /**
     * Indicates if the surrounding empty space should be removed.
     *
     * @var bool
     */
    protected bool $trim = false;

    /**
     * Indicates if the image should not be auto-cropped.
     *
     * @var bool
     */
    protected bool $fitIn = false;

    /**
     * Indicates if the image should be resized without keeping its aspect ratio.
     *
     * @var bool
     */
    protected bool $stretch = false;

    /**
     * The new size of the image.
     *
     * @var array<string, int|null>
     */
    protected array $size = [];

    /**
     * Indicates if the image should use smart detection of focal points.
     *
     * @var bool
     */
    protected bool $smart = false;

    /**
     * The list of filters.
     *
     * @var array<string, string>
     */
    protected array $filters = [];

    /**
     * The URL to the image.
     *
     * @var string
     */
    protected string $image;

    /**
     * Create a new builder instance.
     *
     * @param  string  $baseUrl
     * @return void
     */
    public function __construct(protected string $baseUrl)
    {
        //
    }

    /**
     * Indicate that the surrounding empty space should be removed.
     *
     * @return $this
     */
    public function trim(): self
    {
        $this->trim = true;

        return $this;
    }

    /**
     * Indicate that the image should not be auto-cropped.
     *
     * @return $this
     */
    public function fitIn(): self
    {
        $this->fitIn = true;

        return $this;
    }

    /**
     * Resize the image without keeping its aspect ratio.
     *
     * @return $this
     */
    public function stretch(): self
    {
        $this->stretch = true;

        return $this;
    }

    /**
     * Resize the image to the given width and height.
     *
     * @param  int|null  $width
     * @param  int|null  $height
     * @return $this
     */
    public function size(?int $width, ?int $height): self
    {
        $this->size = [
            'width' => max($width, 0),
            'height' => max($height, 0),
        ];

        return $this;
    }

    /**
     * Indicate that the image should use smart detection of focal points.
     *
     * @return $this
     */
    public function smart(): self
    {
        $this->smart = true;

        return $this;
    }

    /**
     * Set the URL to the image.
     *
     * @param  string  $url
     * @return $this
     */
    public function image(string $url): self
    {
        $this->image = $url;

        return $this;
    }

    /**
     * Build the URL to the image.
     *
     * @return string
     */
    public function build(): string
    {
        $parameters = [];

        if ($this->trim) {
            $parameters[] = 'trim';
        }

        if ($this->fitIn) {
            $parameters[] = 'fit-in';
        }

        if ($this->stretch) {
            $parameters[] = 'stretch';
        }

        if ($this->size) {
            $parameters[] = sprintf('%dx%d',
                (int) $this->size['width'],
                (int) $this->size['height']
            );
        }

        if ($this->smart) {
            $parameters[] = 'smart';
        }

        if (count($this->filters) > 0) {
            ksort($this->filters, SORT_NATURAL);

            $parameters[] = 'filters:'.implode(':', $this->filters);
        }

        if ($this->image) {
            $parameters[] = $this->image;
        } else {
            throw new RuntimeException('Image has not been set.');
        }

        $path = implode('/', $parameters);

        if (isset($this->signer)) {
            $hash = $this->signer->sign($path);
        } else {
            $hash = 'unsafe';
        }

        return "{$this->baseUrl}/{$hash}/{$path}";
    }

    /**
     * Set the path signer instance.
     *
     * @param  \OsiemSiedem\Imagor\PathSigner  $signer
     * @return $this
     */
    public function setPathSigner(PathSigner $signer): self
    {
        $this->signer = $signer;

        return $this;
    }

    /**
     * Build the URL to the image.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->build();
    }
}
