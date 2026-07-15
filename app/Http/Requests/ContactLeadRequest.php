<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ContactLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'service' => ['nullable', 'string', Rule::in(array_keys(\App\Models\ContactLead::SERVICES))],
            'budget' => ['nullable', 'string', Rule::in(array_keys(\App\Models\ContactLead::BUDGETS))],
            'message' => ['nullable', 'string', 'max:5000'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->ensureIsNotRateLimited();
        RateLimiter::hit($this->throttleKey(), 3600);
    }

    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 3)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => "Too many contact requests from your network. Please try again in {$seconds} seconds.",
        ]);
    }

    public function throttleKey(): string
    {
        return 'contact-lead|'.$this->ip();
    }
}
