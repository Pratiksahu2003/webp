<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSmtpSettingsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $enabled = $this->boolean('enabled');

        return [
            'enabled' => ['nullable', 'boolean'],
            'host' => [$enabled ? 'required' : 'nullable', 'string', 'max:255'],
            'port' => [$enabled ? 'required' : 'nullable', 'integer', 'min:1', 'max:65535'],
            'username' => [$enabled ? 'required' : 'nullable', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'max:255'],
            'encryption' => ['required', Rule::in(['tls', 'ssl', 'none'])],
            'from_address' => [$enabled ? 'required' : 'nullable', 'email', 'max:255'],
            'from_name' => [$enabled ? 'required' : 'nullable', 'string', 'max:255'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'enabled' => $this->boolean('enabled'),
        ]);
    }

    public function messages(): array
    {
        return [
            'host.required' => 'SMTP host is required when email delivery is enabled.',
            'username.required' => 'SMTP username is required when email delivery is enabled.',
            'from_address.required' => 'From address is required when email delivery is enabled.',
        ];
    }
}
