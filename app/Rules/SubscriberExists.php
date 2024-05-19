<?php

namespace App\Rules;

use App\Models\CurrencyRateSubscriber;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SubscriberExists implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $emailAlreadyAdded = CurrencyRateSubscriber::query()->where('email', '=', $value)->exists();
        if ($emailAlreadyAdded) {
            $fail($attribute . ' already exists.');
        }
    }
}
