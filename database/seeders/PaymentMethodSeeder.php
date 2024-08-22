<?php

namespace Database\Seeders;

use App\Domain\Models\PaymentMethod\Enum\PaymentDriverEnum;
use App\Domain\Models\PaymentMethod\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->create_test_payment();
        $this->create_stripe_payment();
        $this->create_paypal_payment();
    }

    private function create_test_payment(): void
    {
       PaymentMethod::query()->firstOrCreate([
           'name' => 'test',
       ], [
           'driver' => PaymentDriverEnum::test
       ]);
    }

    private function create_stripe_payment(): void
    {
        PaymentMethod::query()->firstOrCreate([
            'name' => 'stripe',
        ], [
            'driver' => PaymentDriverEnum::stripe
        ]);
    }

    private function create_paypal_payment(): void
    {
        PaymentMethod::query()->firstOrCreate([
            'name' => 'paypal',
        ], [
            'driver' => PaymentDriverEnum::paypal
        ]);
    }
}
