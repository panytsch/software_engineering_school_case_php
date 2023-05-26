<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Storage\EmailStorage;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as SymphonyResponse;

class SubscribeController extends Controller
{
    public function __invoke(SubscribeRequest $request, EmailStorage $emailStorage): JsonResponse
    {
        $email = $request->getEmail();

        if ($emailStorage->exists($email)) {
            return Response::json(null, SymphonyResponse::HTTP_CONFLICT);
        }

        $emailStorage->put($email);

        return Response::json(null, SymphonyResponse::HTTP_OK);
    }

}
