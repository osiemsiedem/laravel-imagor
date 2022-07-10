<?php

declare(strict_types=1);

use OsiemSiedem\Imagor\PathSigner;

it('generates the correct hash', function () {
    $hash = (new PathSigner('mysecret'))->sign(
        '500x500/top/raw.githubusercontent.com/cshum/imagor/master/testdata/gopher.png'
    );

    expect($hash)->toEqual('cST4Ko5_FqwT3BDn-Wf4gO3RFSk=');
});
