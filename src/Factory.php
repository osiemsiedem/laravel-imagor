<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor;

class Factory
{
    /**
     * Create a new factory instance.
     *
     * @param  string  $baseUrl
     * @param  \OsiemSiedem\Imagor\PathSigner|null  $signer
     * @return void
     */
    public function __construct(protected string $baseUrl, protected ?PathSigner $signer = null)
    {
        //
    }

    /**
     * Create a new URL builder instance.
     *
     * @param  string  $image
     * @return \OsiemSiedem\Imagor\UrlBuilder
     */
    public function make(string $image): UrlBuilder
    {
        $builder = new UrlBuilder($this->baseUrl);
        $builder->image($image);

        if (isset($this->signer)) {
            $builder->setPathSigner($this->signer);
        }

        return $builder;
    }
}
