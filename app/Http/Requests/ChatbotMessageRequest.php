<?php

namespace App\Http\Requests;

use App\Models\ContactLead;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ChatbotMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'message' => ['required', 'string', 'max:2000'],
            'lead' => ['nullable', 'array'],
            'lead.step' => ['nullable', 'string', 'max:40'],
            'lead.name' => ['nullable', 'string', 'max:255'],
            'lead.email' => ['nullable', 'email', 'max:255'],
            'lead.phone' => ['nullable', 'string', 'max:30'],
            'lead.service' => ['nullable', 'string', Rule::in(array_keys(ContactLead::SERVICES))],
            'lead.message' => ['nullable', 'string', 'max:5000'],
            'website' => ['nullable', 'string', 'max:255'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->ensureIsNotRateLimited();
        RateLimiter::hit($this->throttleKey(), 60);
    }

    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 40)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'message' => "Too many chat messages. Please wait {$seconds} seconds.",
        ]);
    }

    public function throttleKey(): string
    {
        return 'chatbot-message|'.$this->ip();
    }
}
