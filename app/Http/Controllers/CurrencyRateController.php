<?php

namespace App\Http\Controllers;

use App\CurrencyRate\Contracts\CurrencyRateInterface;
use App\CurrencyRate\Enum\Currencies;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class CurrencyRateController extends Controller
{
    public function rate(CurrencyRateInterface $currencyRate): JsonResponse
    {
        try {
            $rate = $currencyRate->rate(Currencies::USD, Currencies::UAH);
        } catch (\Throwable) {
            return Response::json(null, \Symfony\Component\HttpFoundation\Response::HTTP_BAD_REQUEST);
        }

        return Response::json($rate);
    }
}
