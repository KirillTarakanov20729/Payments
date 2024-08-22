<?php

namespace App\UI\API\Controllers;

use App\Application\Services\Tincoff\DTO\CreateTincoffPaymentDTO;
use App\Application\Services\Tincoff\DTO\TincoffConfigDTO;
use App\Application\Services\Tincoff\TincoffService;
use App\UI\API\Requests\Tincoff\CreateTincoffPaymentRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

readonly class TincoffController
{
    private TincoffService $service;
    public function __construct()
    {
        $data = new TincoffConfigDTO(['terminal' => env('TINCOFF_TERMINAL'), 'password' => env('TINCOFF_PASSWORD')]);

        $this->service = new TincoffService($data);
    }

    public function config(): JsonResponse
    {
        return response()->json(['data' => $this->service->getConfig()]);
    }

    public function createPayment(CreateTincoffPaymentRequest $request): JsonResponse
    {
        $data = new CreateTincoffPaymentDTO([
            'terminal' => $this->service->getConfig()['terminal'],
            'amount' => $request->validated('amount'),
            'order' => $request->validated('order')]);

        return response()->json(['data' => $this->service->createPayment($data)]);
    }
}
