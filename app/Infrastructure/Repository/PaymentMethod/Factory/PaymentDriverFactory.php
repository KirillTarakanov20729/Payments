<?php

namespace App\Infrastructure\Repository\PaymentMethod\Factory;

use App\Domain\Models\PaymentMethod\Driver\PaymentDriver;
use App\Domain\Models\PaymentMethod\Driver\TestDriver;
use App\Domain\Models\PaymentMethod\Enum\PaymentDriverEnum;
use InvalidArgumentException;

class PaymentDriverFactory
{
    public function make(string $paymentDriver): PaymentDriver
    {
        return match ($paymentDriver) {
            PaymentDriverEnum::test => new TestDriver(),


            default => throw new InvalidArgumentException('Invalid payment method driver'),
        };
    }
}
