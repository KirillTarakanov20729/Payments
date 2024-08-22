<?php

namespace App\Application\Services\Tincoff\DTO;

use App\Domain\Models\Tincoff\Enum\TincoffPaymentStatusEnum;

class PaymentTincoffDTO
{
    public string $id;
    public TincoffPaymentStatusEnum $status;
    public string $order;
    public int $amount;
    public string $url;
}
