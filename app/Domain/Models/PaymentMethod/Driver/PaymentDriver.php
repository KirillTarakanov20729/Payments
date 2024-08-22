<?php

namespace App\Domain\Models\PaymentMethod\Driver;

abstract class PaymentDriver
{
    abstract public function test();
}
