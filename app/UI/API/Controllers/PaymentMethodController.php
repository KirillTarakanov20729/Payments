<?php

namespace App\UI\API\Controllers;

use App\Application\Services\PaymentMethod\PaymentMethodService;
use App\Domain\Models\PaymentMethod\Enum\PaymentDriverEnum;
use App\Domain\Models\PaymentMethod\Resource\PaymentMethodResource;
use App\Infrastructure\Repository\PaymentMethod\PaymentMethodCrudContract;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

readonly class PaymentMethodController
{
    public function __construct(private PaymentMethodService $paymentMethodService)
    {
    }

    public function index(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $methods = $this->paymentMethodService->index();
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }

        return PaymentMethodResource::collection($methods);
    }

    public function getDriver(string $payment_uuid): JsonResponse|RedirectResponse
    {
        try {
            $payment_driver_class = $this->paymentMethodService->getDriver($payment_uuid);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }

        return response()->json(['driver' => $payment_driver_class->test(), 'payment_uuid' => $payment_uuid]);
    }
}
