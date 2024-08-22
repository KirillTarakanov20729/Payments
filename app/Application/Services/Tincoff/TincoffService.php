<?php

namespace App\Application\Services\Tincoff;

use App\Application\Services\Tincoff\DTO\CreateTincoffPaymentDTO;
use App\Application\Services\Tincoff\DTO\TincoffConfigDTO;
use Illuminate\Support\Facades\Http;

readonly class TincoffService
{
    public function __construct(private TincoffConfigDTO $data)
    {
    }

    public function getConfig(): TincoffConfigDTO
    {
        return $this->data;
    }

    public function getTerminalKey(): string
    {
        return $this->data->terminal;
    }

    public function createPayment(CreateTincoffPaymentDTO $data)
    {
        $response = Http::post('https://securepay.tincoff.ru/v2/Init', [
            'TerminalKey' => $this->data->terminal,
            'amount' => $data->amount,
            'orderId' => $data->order,
        ]);

        return $response->json();
    }
}
