<?php

namespace App\Domain\Models\PaymentMethod;

use App\Domain\Models\PaymentMethod\Enum\PaymentDriverEnum;
use Database\Factories\PaymentMethodFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name,
 * @property PaymentDriverEnum $driver,
 * @property bool $active
 */
class PaymentMethod extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'active',
        'driver',
    ];

    protected $casts = [
        'active' => 'boolean',
        'driver' => PaymentDriverEnum::class,
    ];

    protected static function newFactory(): PaymentMethodFactory
    {
        return PaymentMethodFactory::new();
    }
}
