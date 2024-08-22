<?php

namespace App\Domain\Models\PaymentMethod\Driver;

class TestDriver extends PaymentDriver
{
    public function test(): string
    {
        return 'Test driver check';
    }
}
