<?php

namespace App\Application\Services\Payment\DTO;

use App\Domain\Models\PaymentMethod\Driver\PaymentDriver;
use Spatie\DataTransferObject\DataTransferObject;

class CompletePaymentDTO extends DataTransferObject
{
    public bool $success;
    public string $payment_uuid;
}
