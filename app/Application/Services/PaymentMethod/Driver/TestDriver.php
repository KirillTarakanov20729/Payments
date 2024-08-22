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
        return 'Redirect test payment, payment_uuid: ' . $payment->uuid . ', driver_payment_id: ' . $payment->driver_payment_id;
    }
}
