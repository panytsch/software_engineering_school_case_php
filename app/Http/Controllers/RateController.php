<?php

namespace App\Http\Controllers;

use App\Services\Rate\RateService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as SymphonyResponse;

class RateController extends Controller
{

    public function __construct(private readonly RateService $rateService)
    {
    }

    public function __invoke(): JsonResponse
    {
        $result = $this->rateService->getCurrentRate();
        if (!$result) {
            return Response::json(status: SymphonyResponse::HTTP_BAD_REQUEST);
        }

        return Response::json($result->rate, SymphonyResponse::HTTP_OK);
    }
}
