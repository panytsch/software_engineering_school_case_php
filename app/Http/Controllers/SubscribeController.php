<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Storage\EmailStorage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Response as ResponseFacade;
use Symfony\Component\HttpFoundation\Response as SymphonyResponse;

class SubscribeController extends Controller
{
    public function __invoke(SubscribeRequest $request, EmailStorage $emailStorage): Response
    {
        $email = $request->getEmail();

        if ($emailStorage->exists($email)) {
            return ResponseFacade::make(status: SymphonyResponse::HTTP_CONFLICT);
        }

        $emailStorage->put($email);

        return ResponseFacade::make(status: SymphonyResponse::HTTP_OK);
    }

}
