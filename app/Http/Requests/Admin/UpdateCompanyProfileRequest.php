<?php

namespace App\Http\Requests\Admin;

use App\Support\IndianGstStates;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCompanyProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'legal_name' => ['required', 'string', 'max:255'],
            'trade_name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'address_line_1' => ['required', 'string', 'max:255'],
            'address_line_2' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:100'],
            'state' => ['required', 'string', 'max:100', Rule::in(IndianGstStates::validationValues())],
            'state_code' => ['nullable', 'string', 'max:2'],
            'postal_code' => ['nullable', 'string', 'max:20'],
            'country' => ['required', 'string', 'max:100'],
            'pan' => ['nullable', 'string', 'max:10'],
            'gstin' => ['nullable', 'string', 'max:15'],
            'udyam' => ['nullable', 'string', 'max:30'],
            'cin' => ['nullable', 'string', 'max:30'],
            'bank_name' => ['nullable', 'string', 'max:255'],
            'bank_account_name' => ['nullable', 'string', 'max:255'],
            'bank_account_number' => ['nullable', 'string', 'max:50'],
            'bank_ifsc' => ['nullable', 'string', 'max:20'],
            'bank_branch' => ['nullable', 'string', 'max:255'],
            'default_gst_rate' => ['required', 'numeric', 'min:0', 'max:100'],
            'default_hsn_sac' => ['nullable', 'string', 'max:20'],
            'invoice_prefix' => ['nullable', 'string', 'max:20'],
            'invoice_terms' => ['nullable', 'string', 'max:5000'],
            'jurisdiction_court' => ['nullable', 'string', 'max:255'],
            'place_of_supply_default' => ['nullable', 'string', 'max:100', Rule::in(IndianGstStates::validationValues())],
        ];
    }

    protected function prepareForValidation(): void
    {
        $state = IndianGstStates::canonicalName($this->input('state'));
        $place = $this->filled('place_of_supply_default')
            ? IndianGstStates::canonicalName($this->input('place_of_supply_default'))
            : null;

        $this->merge([
            'pan' => $this->filled('pan') ? strtoupper(trim((string) $this->input('pan'))) : null,
            'gstin' => $this->filled('gstin') ? strtoupper(trim((string) $this->input('gstin'))) : null,
            'bank_ifsc' => $this->filled('bank_ifsc') ? strtoupper(trim((string) $this->input('bank_ifsc'))) : null,
            'state' => $state ?: $this->input('state'),
            'state_code' => $state ? IndianGstStates::codeFor($state) : $this->input('state_code'),
            'place_of_supply_default' => $place,
        ]);
    }
}
