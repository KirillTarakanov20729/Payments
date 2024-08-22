<?php

namespace App\UI\API\Controllers;

use App\Application\Services\Tincoff\DTO\CreateTincoffPaymentDTO;
use App\Application\Services\Tincoff\DTO\TincoffConfigDTO;
use App\Application\Services\Tincoff\TincoffService;
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
}
