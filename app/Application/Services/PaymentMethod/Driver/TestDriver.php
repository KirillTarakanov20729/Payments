<?php

namespace App\Application\Services\PaymentMethod\Driver;

use App\Domain\Models\Payment\Payment;

class TestDriver extends PaymentDriver
{
    public function createPayment(string $payment_uuid): Payment
    {
        $driver_payment_uuid = uuid_create();

        /** @var Payment $payment */
        $payment = Payment::query()->where('uuid', $payment_uuid)->first();
        $payment->driver_payment_id = $driver_payment_uuid;
        $payment->save();

        return $payment;
    }

    public function redirect(Payment $payment): string
    {
        return match ($payment->currency_id) {
            'RUB' => "Return URL for RUB payment with payment_uuid: {$payment->uuid}, driver_payment_id: {$payment->driver_payment_id}",
            'USD' => "Return URL for USD payment with payment_uuid: {$payment->uuid}, driver_payment_id: {$payment->driver_payment_id}",
            'EUR' => "Return URL for EUR payment with payment_uuid: {$payment->uuid}, driver_payment_id: {$payment->driver_payment_id}",
            default => throw new \Exception('Unsupported currency')
        };
    }
}
