<?php

namespace App\CurrencyRate\Contracts;

use App\CurrencyRate\Enum\Currencies;

interface CurrencyRateInterface
{
    public function rate(Currencies $currencyFrom, Currencies $currencyTo): int|float;
}
