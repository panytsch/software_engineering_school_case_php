<?php

namespace App\Http\Controllers;

use App\Mail\CurrentRateEmail;
use App\Services\Rate\RateService;
use App\Storage\EmailStorage;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as SymphonyResponse;

class SendEmailsController extends Controller
{
    public function __invoke(EmailStorage $emailStorage, RateService $rateService): JsonResponse
    {
        $rateResponse = $rateService->getCurrentRate();

        foreach ($emailStorage->emails() as $email) {
            $emailEntity = new CurrentRateEmail($rateResponse->rate);
            $emailEntity
                ->to($email)
                ->send(Mail::mailer());
        }

        return Response::json(null, SymphonyResponse::HTTP_OK);
    }
}
