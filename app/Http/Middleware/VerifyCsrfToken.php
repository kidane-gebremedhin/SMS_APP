<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
       /*//NB: this is one option to prevent TokenMisMatchException Error but the approperiate way is in Exceptions/Handler Class render method
        '/logout'*/
    ];
}
