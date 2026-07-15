<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactLeadRequest;
use App\Models\ContactLead;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function store(ContactLeadRequest $request): RedirectResponse
    {
        if ($request->filled('website')) {
            return redirect()
                ->route('contact')
                ->with('success', 'Thank you! Your message has been sent successfully. We will get back to you soon.');
        }

        ContactLead::create([
            'name' => $request->validated('name'),
            'email' => $request->validated('email'),
            'company' => $request->validated('company'),
            'phone' => $request->validated('phone'),
            'service' => $request->validated('service'),
            'budget' => $request->validated('budget'),
            'message' => $request->validated('message'),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'new',
        ]);

        return redirect()
            ->route('contact')
            ->with('success', 'Thank you! Your message has been sent successfully. We will get back to you soon.');
    }
}
