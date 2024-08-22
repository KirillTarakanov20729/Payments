<?php

namespace Database\Factories;

use App\Domain\Models\Currency\Currency;
use App\Domain\Models\Payment\Enum\PaymentStatusEnum;
use App\Domain\Models\Payment\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Domain\Models\Payment\Payment>
 */
class PaymentFactory extends Factory
{
    protected $model = Payment::class;
    public function definition(): array
    {
        return [
            'status' => PaymentStatusEnum::pending,
            'currency_id' => Currency::query()->inRandomOrder()->first()->id,
            'amount' => 100,
            'payable_id' => rand() % 100 + 1,
            'payable_type' => rand() % 2 ? 'subscription' : 'order',
            'payment_method_id' => 1
        ];
    }
}
