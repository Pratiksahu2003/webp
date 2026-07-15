<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateSmtpSettingsRequest;
use App\Services\SmtpSettingsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;

class SmtpSettingsController extends Controller
{
    public function __construct(
        protected SmtpSettingsService $smtpSettings
    ) {}

    public function edit(): View
    {
        $settings = $this->smtpSettings->current();

        return view('admin.settings.smtp', compact('settings'));
    }

    public function update(UpdateSmtpSettingsRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->boolean('enabled') && blank($data['password'] ?? null) && ! $this->smtpSettings->current()['has_password']) {
            return back()
                ->withInput()
                ->withErrors(['password' => 'SMTP password is required when enabling email delivery for the first time.']);
        }

        $this->smtpSettings->save($data);

        return redirect()
            ->route('admin.settings.smtp.edit')
            ->with('success', 'SMTP settings saved.');
    }

    public function destroy(): RedirectResponse
    {
        $this->smtpSettings->clear();

        return redirect()
            ->route('admin.settings.smtp.edit')
            ->with('success', 'Dashboard SMTP settings cleared. Environment mail config will be used if set.');
    }

    public function test(Request $request): RedirectResponse
    {
        $request->validate([
            'test_email' => ['required', 'email', 'max:255'],
        ]);

        $settings = $this->smtpSettings->current();

        if (! $settings['is_configured'] && ! $settings['enabled']) {
            return back()->with('error', 'Configure and enable SMTP before sending a test email.');
        }

        try {
            $this->smtpSettings->sendTest($request->string('test_email')->toString());
        } catch (Throwable $e) {
            report($e);

            return back()
                ->withInput()
                ->with('error', 'Test email failed: '.$e->getMessage());
        }

        return back()->with('success', 'Test email sent to '.$request->input('test_email').'.');
    }
}
