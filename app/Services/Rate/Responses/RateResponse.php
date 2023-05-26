<?php

namespace App\Services\Rate\Responses;

use GuzzleHttp\Psr7\Response;

final class RateResponse extends AbstractResponse
{
    public function __construct(public readonly float $rate)
    {
    }

    static function fromPsrResponse(Response $response): self
    {
        $body = json_decode($response->getBody(), true);

        return new self($body['rate']);
    }
}
