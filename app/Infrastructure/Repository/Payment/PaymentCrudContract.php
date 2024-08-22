<?php

namespace App\Infrastructure\Repository\Payment;

use App\Application\Services\Payment\DTO\ChoosePaymentMethodDTO;
use App\Application\Services\Payment\DTO\IndexPaymentDTO;
use App\Application\Services\Payment\DTO\ShowPaymentDTO;
use App\Application\Services\Payment\DTO\UpdatePayableStatusDTO;
use App\Application\Services\Payment\DTO\UpdatePaymentMethodDTO;
use App\Application\Services\Payment\DTO\UpdatePaymentStatusDTO;
use App\Domain\Models\Payment\Payment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface PaymentCrudContract
{
    public function index(IndexPaymentDTO $data): LengthAwarePaginator;

    public function show(ShowPaymentDTO $data): Payment;

    public function updatePaymentMethod(UpdatePaymentMethodDTO $data): Payment;

    public function updatePaymentStatus(UpdatePaymentStatusDTO $data): Payment;

    public function updatePayableStatus(UpdatePayableStatusDTO $data): bool;
}
