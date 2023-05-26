<?php

namespace App\Services\Rate\Requests;

use Symfony\Component\HttpFoundation\Request;

final class RateRequest extends AbstractCoinApiRequest
{
    protected const PATH = '/v1/exchangerate/BTC/UAH';
    protected const METHOD = Request::METHOD_GET;

}
