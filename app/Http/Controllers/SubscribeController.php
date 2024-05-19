<?php

namespace App\Http\Controllers;

use App\Rules\SubscriberExists;
use Database\Factories\CurrencyRateSubscriberFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class SubscribeController extends Controller
{
    public function subscribe(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', new SubscriberExists()]
        ]);

        if ($validator->fails()) {
            return Response::json(null, \Symfony\Component\HttpFoundation\Response::HTTP_CONFLICT);
        }

        $email = $request->input('email');

        CurrencyRateSubscriberFactory::new(['email' => trim($email)])->create();

        return Response::json(null);
    }
}
