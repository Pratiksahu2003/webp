<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class StoreInvoiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_id' => ['required', Rule::exists('users', 'id')->where('role', 'user')],
            'type' => ['required', Rule::in(['package', 'custom'])],
            'package_id' => ['required_if:type,package', 'nullable', 'exists:packages,id'],
            'invoice_title' => ['nullable', 'string', 'max:255'],
            'notes' => ['nullable', 'string', 'max:5000'],
            'place_of_supply' => ['nullable', 'string', 'max:100'],
            'buyer_gstin' => ['nullable', 'string', 'max:15'],
            'default_gst_rate' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'default_hsn' => ['nullable', 'string', 'max:20'],
            'line_items' => ['required_if:type,custom', 'nullable', 'array', 'min:1'],
            'line_items.*.title' => ['required_if:type,custom', 'string', 'max:255'],
            'line_items.*.description' => ['nullable', 'string', 'max:1000'],
            'line_items.*.hsn' => ['nullable', 'string', 'max:20'],
            'line_items.*.quantity' => ['required_if:type,custom', 'numeric', 'min:0.01'],
            'line_items.*.rate' => ['required_if:type,custom', 'numeric', 'min:0'],
            'line_items.*.gst_rate' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'send_now' => ['nullable', 'boolean'],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            if ($this->input('type') !== 'custom') {
                return;
            }

            $items = collect($this->input('line_items', []))
                ->filter(fn ($item) => filled($item['title'] ?? null));

            if ($items->isEmpty()) {
                $validator->errors()->add('line_items', 'Add at least one line item.');

                return;
            }

            $total = $items->sum(fn ($item) => (float) ($item['quantity'] ?? 0) * (float) ($item['rate'] ?? 0));

            if ($total <= 0) {
                $validator->errors()->add('line_items', 'Taxable total must be greater than zero.');
            }
        });
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'send_now' => $this->boolean('send_now'),
            'buyer_gstin' => $this->filled('buyer_gstin')
                ? strtoupper(trim((string) $this->input('buyer_gstin')))
                : null,
        ]);
    }
}
