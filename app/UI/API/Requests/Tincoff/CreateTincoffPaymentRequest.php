<?php

namespace App\UI\API\Requests\Tincoff;

use Illuminate\Foundation\Http\FormRequest;

class CreateTincoffPaymentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order' => ['required', 'string'],
            'amount' => ['required', 'integer'],
        ];
    }
}
