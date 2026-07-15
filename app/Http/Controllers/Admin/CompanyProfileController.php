<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateCompanyProfileRequest;
use App\Services\CompanyProfileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CompanyProfileController extends Controller
{
    public function __construct(
        protected CompanyProfileService $companyProfile
    ) {}

    public function edit(): View
    {
        $profile = $this->companyProfile->all();

        return view('admin.settings.company-profile', compact('profile'));
    }

    public function update(UpdateCompanyProfileRequest $request): RedirectResponse
    {
        $this->companyProfile->save($request->validated());

        return redirect()
            ->route('admin.settings.company-profile.edit')
            ->with('success', 'Company invoice profile saved.');
    }
}
