<?php

namespace App\Application\Services\PaymentMethod;

use App\Domain\Models\PaymentMethod\Driver\PaymentDriver;
use App\Infrastructure\Repository\PaymentMethod\PaymentMethodCrudContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

readonly class PaymentMethodService
{
    public function __construct(private PaymentMethodCrudContract $paymentMethodCrudRepository)
    {
    }

    public function index(): Collection
    {
        try {
            return $this->paymentMethodCrudRepository->index();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    public function getDriver(string $payment_uuid): PaymentDriver
    {
        try {
            $payment = $this->paymentMethodCrudRepository->getPayment($payment_uuid);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception($e->getMessage());
        }

        try {
            return $this->paymentMethodCrudRepository->getDriver($payment->paymentMethod->driver->value);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

}
