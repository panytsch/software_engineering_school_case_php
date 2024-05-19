<?php

namespace App\CurrencyRate;

use App\CurrencyRate\Contracts\CurrencyRateInterface;
use App\CurrencyRate\Enum\Currencies;

readonly class CurrencyRate implements CurrencyRateInterface
{

    public function __construct(private CurrencyRateApi $currencyRateApi)
    {
    }

    public function rate(Currencies $currencyFrom, Currencies $currencyTo): int|float
    {
        $response = $this->currencyRateApi->convert($currencyFrom->value, $currencyTo->value, 1);

        return $response['value'];
    }
}
