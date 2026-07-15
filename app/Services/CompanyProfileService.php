<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Throwable;

class CompanyProfileService
{
    public const SETTING_KEY = 'company.profile';

    public const GROUP = 'company';

    /**
     * @return array<string, mixed>
     */
    public function defaults(): array
    {
        return [
            'legal_name' => config('company.name', 'VanTroZ'),
            'trade_name' => config('company.name', 'VanTroZ'),
            'email' => config('company.contact.email'),
            'phone' => config('company.contact.phone'),
            'address_line_1' => config('company.address.primary.line1'),
            'address_line_2' => null,
            'city' => config('company.address.primary.city'),
            'state' => config('company.address.primary.state', 'Haryana'),
            'state_code' => '06',
            'postal_code' => null,
            'country' => config('company.address.primary.country', 'India'),
            'pan' => null,
            'gstin' => null,
            'udyam' => null,
            'cin' => null,
            'bank_name' => null,
            'bank_account_name' => null,
            'bank_account_number' => null,
            'bank_ifsc' => null,
            'bank_branch' => null,
            'default_gst_rate' => 18,
            'default_hsn_sac' => '998314',
            'invoice_prefix' => 'INV',
            'invoice_terms' => 'Payment due as per the payment link. Goods/services once delivered are non-refundable except as per company policy.',
            'jurisdiction_court' => trim((config('company.address.primary.city', 'Gurugram').', '.config('company.address.primary.state', 'Haryana')), ' ,'),
            'place_of_supply_default' => config('company.address.primary.state', 'Haryana'),
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function all(): array
    {
        $stored = [];

        try {
            if (Schema::hasTable('settings')) {
                $stored = Setting::get(self::SETTING_KEY, []) ?: [];
            }
        } catch (Throwable) {
            $stored = [];
        }

        return array_merge($this->defaults(), is_array($stored) ? $stored : []);
    }

    public function get(string $key, mixed $default = null): mixed
    {
        $all = $this->all();

        return $all[$key] ?? $default;
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public function save(array $data): array
    {
        $profile = array_merge($this->all(), $data);

        $profile['default_gst_rate'] = (float) ($profile['default_gst_rate'] ?? 18);

        $canonicalState = \App\Support\IndianGstStates::canonicalName($profile['state'] ?? null);
        if ($canonicalState) {
            $profile['state'] = $canonicalState;
            $profile['state_code'] = \App\Support\IndianGstStates::codeFor($canonicalState) ?? $this->normalizeStateCode((string) ($profile['state_code'] ?? ''));
        } else {
            $profile['state_code'] = $this->normalizeStateCode((string) ($profile['state_code'] ?? ''));
        }

        $canonicalPlace = \App\Support\IndianGstStates::canonicalName($profile['place_of_supply_default'] ?? null);
        if ($canonicalPlace) {
            $profile['place_of_supply_default'] = $canonicalPlace;
        }

        Setting::set(self::SETTING_KEY, $profile, 'json', self::GROUP, 'Company invoice & tax profile');

        return $profile;
    }

    public function fullAddress(): string
    {
        $p = $this->all();

        return collect([
            $p['address_line_1'] ?? null,
            $p['address_line_2'] ?? null,
            $p['city'] ?? null,
            trim(($p['state'] ?? '').' '.($p['postal_code'] ?? '')),
            $p['country'] ?? null,
        ])->filter()->implode(', ');
    }

    public function jurisdictionCourt(): string
    {
        $profile = $this->all();
        $configured = trim((string) ($profile['jurisdiction_court'] ?? ''));

        if ($configured !== '') {
            return $configured;
        }

        return collect([
            $profile['city'] ?? null,
            $profile['state'] ?? null,
        ])->filter()->implode(', ') ?: 'Gurugram, Haryana';
    }

    public function jurisdictionClause(): string
    {
        $court = $this->jurisdictionCourt();

        return "All legal, judicial and dispute matters arising from or relating to this invoice shall be subject to the exclusive jurisdiction of the competent courts at {$court}, where the company is registered. Courts elsewhere shall have no jurisdiction.";
    }

    public function isGstRegistered(): bool
    {
        return filled($this->get('gstin'));
    }

    protected function normalizeStateCode(string $code): string
    {
        $code = preg_replace('/\D+/', '', $code) ?? '';

        return str_pad(substr($code, 0, 2), 2, '0', STR_PAD_LEFT);
    }
}
