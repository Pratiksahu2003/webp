<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentGatewayRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'access_key' => ['nullable', 'string', 'max:255'],
            'access_secret' => ['nullable', 'string', 'max:255'],
            'webhook_secret' => ['nullable', 'string', 'max:255'],
            'currency' => ['required', 'string', 'size:3'],
        ];
    }

    public function messages(): array
    {
        return [
            'currency.size' => 'Currency must be a 3-letter code (e.g. INR).',
        ];
    }
}
