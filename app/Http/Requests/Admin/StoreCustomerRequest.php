<?php

namespace App\Http\Requests\Admin;

use App\Support\IndianGstStates;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['required', 'string', 'max:20'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'address_line_1' => ['required', 'string', 'max:255'],
            'address_line_2' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:100'],
            'state' => ['required', 'string', 'max:100', Rule::in(IndianGstStates::validationValues())],
            'country' => ['required', 'string', 'max:100'],
            'postal_code' => ['required', 'string', 'max:20'],
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->filled('state')) {
            $canonical = IndianGstStates::canonicalName($this->input('state'));
            if ($canonical) {
                $this->merge(['state' => $canonical]);
            }
        }
    }
}
