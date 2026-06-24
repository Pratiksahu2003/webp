<?php

namespace App\Http\Requests\Admin;

use App\Models\Technology;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TechnologyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $technologyId = $this->route('technology')?->id;

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('technologies', 'slug')->ignore($technologyId)],
            'logo' => ['nullable', 'image', 'max:2048'],
            'description' => ['nullable', 'string'],
            'website_url' => ['nullable', 'url', 'max:255'],
            'technology_type' => ['nullable', 'string', Rule::in(Technology::TYPES)],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['nullable', 'boolean'],
        ];
    }
}
