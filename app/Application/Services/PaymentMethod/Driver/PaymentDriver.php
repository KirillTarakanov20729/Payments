<?php

namespace App\Application\Services\PaymentMethod\Driver;

use App\Domain\Models\Payment\Payment;

abstract class PaymentDriver
{
    abstract public function createPayment(string $payment_uuid): Payment;

    abstract public function redirect(Payment $payment);
}
