<?php

namespace App\Services\Rate;

use App\Services\Rate\Requests\RateRequest;
use App\Services\Rate\Responses\RateResponse;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;

final class RateService
{
    private const RATE_URL = 'https://rest.coinapi.io/v1/exchangerate/BTC/UAH';

    public function __construct(private readonly Client $client)
    {
    }

    public function getCurrentRate(): ?RateResponse
    {
        try {
            $response = $this->client->send(resolve(RateRequest::class));
        } catch (GuzzleException $e) {
            return null;
        }

        return RateResponse::fromPsrResponse($response);
    }
}
