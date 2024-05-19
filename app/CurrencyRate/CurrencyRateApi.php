<?php

namespace App\CurrencyRate;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;

class CurrencyRateApi
{
    public function convert(string $from, string $to, string $amount)
    {

        $response = $this->get('convert', [
            'from' => $from,
            'to' => $to,
            'amount' => $amount,
        ]);

        return $response;
    }

    private function get(string $path, array $data): array
    {
        $query = array_merge(['api_key' => $this->key()], $data);

        $response = $this->client()->get($path, [
            'json' => $data,
            'query' => $query,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    private function client(): Client
    {
        return new Client([
            'base_uri' => 'https://api.currencybeacon.com/v1/',
        ]);
    }

    private function key(): string
    {
        $key = env('CURRENCYBEACON_API_KEY');

        if (!$key) {
            throw new \RuntimeException('no currency beacon API key has been specified');
        }

        return $key;
    }
}
