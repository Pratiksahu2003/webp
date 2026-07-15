<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Throwable;

class PaymentGatewaySettingsService
{
    public const GROUP = 'payment';

    public const KEYS = [
        'access_key' => 'nimbbl.access_key',
        'access_secret' => 'nimbbl.access_secret',
        'webhook_secret' => 'nimbbl.webhook_secret',
        'currency' => 'nimbbl.currency',
    ];

    public function applyToConfig(): void
    {
        try {
            if (! Schema::hasTable('settings')) {
                return;
            }
        } catch (Throwable) {
            return;
        }

        foreach (self::KEYS as $field => $configKey) {
            $value = Setting::get($configKey);

            if ($value === null || $value === '') {
                continue;
            }

            Config::set($configKey, $value);
        }
    }

    /**
     * @return array{access_key: ?string, access_secret: ?string, webhook_secret: ?string, currency: string, is_configured: bool, source: string}
     */
    public function current(): array
    {
        $accessKey = $this->resolved('nimbbl.access_key');
        $accessSecret = $this->resolved('nimbbl.access_secret');
        $webhookSecret = $this->resolved('nimbbl.webhook_secret');
        $currency = $this->resolved('nimbbl.currency') ?: 'INR';

        $fromDatabase = filled(Setting::get('nimbbl.access_key')) || filled(Setting::get('nimbbl.access_secret'));

        return [
            'access_key' => $accessKey,
            'access_secret' => $accessSecret,
            'webhook_secret' => $webhookSecret,
            'currency' => $currency,
            'is_configured' => filled($accessKey) && filled($accessSecret),
            'source' => $fromDatabase ? 'dashboard' : (filled($accessKey) ? 'environment' : 'none'),
        ];
    }

    /**
     * @param  array{access_key?: ?string, access_secret?: ?string, webhook_secret?: ?string, currency?: ?string}  $data
     */
    public function save(array $data): void
    {
        if (array_key_exists('access_key', $data) && filled($data['access_key'])) {
            Setting::set('nimbbl.access_key', trim((string) $data['access_key']), 'text', self::GROUP, 'Nimbbl access key');
        }

        if (array_key_exists('access_secret', $data) && filled($data['access_secret'])) {
            Setting::set('nimbbl.access_secret', trim((string) $data['access_secret']), 'encrypted', self::GROUP, 'Nimbbl access secret');
        }

        if (array_key_exists('webhook_secret', $data)) {
            $webhook = trim((string) ($data['webhook_secret'] ?? ''));
            if ($webhook !== '') {
                Setting::set('nimbbl.webhook_secret', $webhook, 'encrypted', self::GROUP, 'Nimbbl webhook secret');
            }
        }

        if (array_key_exists('currency', $data) && filled($data['currency'])) {
            Setting::set('nimbbl.currency', strtoupper(trim((string) $data['currency'])), 'text', self::GROUP, 'Payment currency');
        }

        $this->forgetGatewayCache();
        $this->applyToConfig();
    }

    public function clearCredentials(): void
    {
        Setting::whereIn('key', array_values(self::KEYS))->delete();
        $this->forgetGatewayCache();
    }

    protected function resolved(string $configKey): ?string
    {
        $db = Setting::get($configKey);

        if ($db !== null && $db !== '') {
            return $db;
        }

        $env = config($configKey);

        return filled($env) ? (string) $env : null;
    }

    protected function forgetGatewayCache(): void
    {
        $cacheKey = config('nimbbl.merchant_token_cache_key', 'nimbbl.merchant_token');
        Cache::forget($cacheKey);
    }
}
