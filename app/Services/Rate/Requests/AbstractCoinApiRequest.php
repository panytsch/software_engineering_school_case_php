<?php

namespace App\Services\Rate\Requests;

use GuzzleHttp\Psr7\Request;

abstract class AbstractCoinApiRequest extends Request
{
    protected const URL = 'https://rest.coinapi.io';
    protected const PATH = '/';

    protected const METHOD = '';

    public function __construct(
        array $headers = [],
              $body = null
    )
    {
        parent::__construct(static::METHOD, $this->getUrl(), $this->applyHeaders($headers), $body);
    }

    protected function getUrl(): string
    {
        return static::URL . static::PATH;
    }

    protected function applyHeaders(array $headers): array
    {
        $headers['X-CoinAPI-Key'] = env('COIN_API_KEY');

        return $headers;
    }

}
