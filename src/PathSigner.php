<?php

declare(strict_types=1);

namespace OsiemSiedem\Imagor;

class PathSigner
{
    /**
     * Create a new signer instance.
     *
     * @return void
     */
    public function __construct(protected string $key)
    {
        //
    }

    /**
     * Sign the given path.
     */
    public function sign(string $path): string
    {
        return str_replace(['+', '/'], ['-', '_'], base64_encode(hash_hmac('sha1', $path, $this->key, true)));
    }
}
