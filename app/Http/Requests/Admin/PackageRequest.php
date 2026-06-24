<?php

namespace App\Http\Requests\Admin;

use App\Models\ServicePackage;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PackageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $packageId = $this->route('package')?->id;
        $subServiceId = $this->input('sub_service_id');

        return [
            'sub_service_id' => ['required', 'exists:sub_services,id'],
            'package_name' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable', 'string', 'max:255',
                Rule::unique('packages', 'slug')->where('sub_service_id', $subServiceId)->ignore($packageId),
            ],
            'price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['nullable', 'numeric', 'min:0', 'lte:price'],
            'delivery_days' => ['nullable', 'integer', 'min:1'],
            'revisions' => ['nullable', 'integer', 'min:0'],
            'support_period' => ['nullable', 'string', 'max:100'],
            'badge' => ['nullable', 'string', Rule::in(ServicePackage::BADGES)],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['nullable', 'boolean'],
            'features' => ['nullable', 'array'],
            'features.*.feature_title' => ['required_with:features', 'string', 'max:255'],
            'features.*.sort_order' => ['nullable', 'integer', 'min:0'],
            'features.*.status' => ['nullable', 'boolean'],
        ];
    }
}
