<?php

namespace App\Console\Commands;

use App\CurrencyRate\Contracts\CurrencyRateInterface;
use App\CurrencyRate\Enum\Currencies;
use App\Mail\CurrencyRateMail;
use App\Models\CurrencyRateSubscriber;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendRatesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-rates-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send today`s UAH to USD currency rate to subscribed customers';

    /**
     * Execute the console command.
     */
    public function handle(CurrencyRateInterface $currencyRate)
    {
        $rate = $currencyRate->rate(Currencies::USD, Currencies::UAH);

        $subscribers = CurrencyRateSubscriber::query()->lazy()->sortBy('created_at');
        foreach ($subscribers as $subscriber) {
            Log::info("Sending currency rate for subscriber {$subscriber->email}");

            (new CurrencyRateMail($rate))
                ->to($subscriber->email)
                ->send(Mail::mailer('smtp'));
        }
    }
}
