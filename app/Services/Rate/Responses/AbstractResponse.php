<?php

namespace App\Services\Rate\Responses;

use GuzzleHttp\Psr7\Response;

abstract class AbstractResponse
{
    abstract static function fromPsrResponse(Response $response);
}
