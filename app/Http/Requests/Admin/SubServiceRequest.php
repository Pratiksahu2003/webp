<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $subServiceId = $this->route('sub_service')?->id;
        $serviceId = $this->input('service_id');

        return [
            'service_id' => ['required', 'exists:services,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable', 'string', 'max:255',
                Rule::unique('sub_services', 'slug')->where('service_id', $serviceId)->ignore($subServiceId),
            ],
            'image' => ['nullable', 'image', 'max:5120'],
            'short_description' => ['nullable', 'string', 'max:1000'],
            'description' => ['nullable', 'string'],
            'starting_price' => ['nullable', 'numeric', 'min:0'],
            'delivery_days' => ['nullable', 'integer', 'min:1'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['nullable', 'boolean'],
            'technology_ids' => ['nullable', 'array'],
            'technology_ids.*' => ['exists:technologies,id'],
        ];
    }
}
