<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use Database\Factories\CurrencyRateSubscriberFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class SubscribeController extends Controller
{
    public function subscribe(SubscribeRequest $request): JsonResponse
    {
        $email = $request->validated('email');

        CurrencyRateSubscriberFactory::new(['email' => trim($email)])->create();

        return Response::json(null);
    }
}
