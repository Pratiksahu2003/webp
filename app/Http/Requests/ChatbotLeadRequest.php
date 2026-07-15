<?php

namespace App\Http\Requests;

use App\Models\ContactLead;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ChatbotLeadRequest extends FormRequest
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
            'phone' => ['nullable', 'string', 'max:30'],
            'service' => ['nullable', 'string', Rule::in(array_keys(ContactLead::SERVICES))],
            'message' => ['nullable', 'string', 'max:5000'],
            'company' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'string', 'max:255'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->ensureIsNotRateLimited();
        RateLimiter::hit($this->throttleKey(), 3600);
    }

    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => "Too many chatbot lead submissions. Please try again in {$seconds} seconds.",
        ]);
    }

    public function throttleKey(): string
    {
        return 'chatbot-lead|'.$this->ip();
    }
}
