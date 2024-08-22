<?php

namespace App\Application\Services\Tincoff\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class CreateTincoffPaymentDTO extends DataTransferObject
{
    public int $amount;
    public string $order;
    public string $terminal;
}
