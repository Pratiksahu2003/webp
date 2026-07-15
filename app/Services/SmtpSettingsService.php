<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Throwable;

class SmtpSettingsService
{
    public const GROUP = 'mail';

    public const SETTING_KEY = 'mail.smtp';

    public const PASSWORD_KEY = 'mail.smtp.password';

    /**
     * @return array<string, mixed>
     */
    public function defaults(): array
    {
        return [
            'enabled' => false,
            'host' => (string) (config('mail.mailers.smtp.host') ?? ''),
            'port' => (int) (config('mail.mailers.smtp.port') ?? 587),
            'username' => (string) (config('mail.mailers.smtp.username') ?? ''),
            'encryption' => $this->normalizeEncryption(config('mail.mailers.smtp.scheme')),
            'from_address' => (string) (config('mail.from.address') ?? ''),
            'from_name' => (string) (config('mail.from.name') ?? config('app.name')),
        ];
    }

    /**
     * @return array{
     *     enabled: bool,
     *     host: string,
     *     port: int,
     *     username: string,
     *     encryption: string,
     *     from_address: string,
     *     from_name: string,
     *     is_configured: bool,
     *     source: string,
     *     has_password: bool
     * }
     */
    public function current(): array
    {
        $defaults = $this->defaults();
        $stored = $this->storedMeta();
        $merged = array_merge($defaults, $stored);

        $hasPassword = filled(Setting::get(self::PASSWORD_KEY)) || filled(config('mail.mailers.smtp.password'));
        $enabled = (bool) ($merged['enabled'] ?? false);
        $host = (string) ($merged['host'] ?? '');
        $fromDashboard = $enabled && filled($host);

        return [
            'enabled' => $enabled,
            'host' => $host,
            'port' => (int) ($merged['port'] ?? 587),
            'username' => (string) ($merged['username'] ?? ''),
            'encryption' => $this->normalizeEncryption($merged['encryption'] ?? 'tls'),
            'from_address' => (string) ($merged['from_address'] ?? ''),
            'from_name' => (string) ($merged['from_name'] ?? ''),
            'is_configured' => $fromDashboard
                ? (filled($host) && filled($merged['username'] ?? null) && $hasPassword)
                : (in_array(config('mail.default'), ['smtp', 'failover'], true) && filled(config('mail.mailers.smtp.host'))),
            'source' => $fromDashboard
                ? 'dashboard'
                : ((config('mail.default') !== 'log' && filled(config('mail.mailers.smtp.host'))) ? 'environment' : 'none'),
            'has_password' => $hasPassword,
        ];
    }

    public function applyToConfig(): void
    {
        try {
            if (! Schema::hasTable('settings')) {
                return;
            }
        } catch (Throwable) {
            return;
        }

        $stored = $this->storedMeta();

        if (! ($stored['enabled'] ?? false) || blank($stored['host'] ?? null)) {
            return;
        }

        $encryption = $this->normalizeEncryption($stored['encryption'] ?? 'tls');
        $scheme = $encryption === 'ssl' ? 'smtps' : null;
        $password = Setting::get(self::PASSWORD_KEY);

        Config::set('mail.default', 'smtp');
        Config::set('mail.mailers.smtp.transport', 'smtp');
        Config::set('mail.mailers.smtp.host', $stored['host']);
        Config::set('mail.mailers.smtp.port', (int) ($stored['port'] ?? 587));
        Config::set('mail.mailers.smtp.username', $stored['username'] ?? null);
        Config::set('mail.mailers.smtp.scheme', $scheme);

        if (filled($password)) {
            Config::set('mail.mailers.smtp.password', $password);
        }

        if (filled($stored['from_address'] ?? null)) {
            Config::set('mail.from.address', $stored['from_address']);
        }

        if (filled($stored['from_name'] ?? null)) {
            Config::set('mail.from.name', $stored['from_name']);
        }

        Mail::purge('smtp');
        Mail::purge();
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    public function save(array $data): array
    {
        $payload = [
            'enabled' => (bool) ($data['enabled'] ?? false),
            'host' => trim((string) ($data['host'] ?? '')),
            'port' => (int) ($data['port'] ?? 587),
            'username' => trim((string) ($data['username'] ?? '')),
            'encryption' => $this->normalizeEncryption($data['encryption'] ?? 'tls'),
            'from_address' => trim((string) ($data['from_address'] ?? '')),
            'from_name' => trim((string) ($data['from_name'] ?? '')),
        ];

        Setting::set(self::SETTING_KEY, $payload, 'json', self::GROUP, 'SMTP mail configuration');

        if (array_key_exists('password', $data) && filled($data['password'])) {
            Setting::set(self::PASSWORD_KEY, (string) $data['password'], 'encrypted', self::GROUP, 'SMTP password');
        }

        $this->applyToConfig();

        return $this->current();
    }

    public function clear(): void
    {
        Setting::where('key', self::SETTING_KEY)->delete();
        Setting::where('key', self::PASSWORD_KEY)->delete();
    }

    public function sendTest(string $toEmail): void
    {
        $this->applyToConfig();

        $fromAddress = config('mail.from.address');
        $fromName = config('mail.from.name');

        Mail::raw(
            "This is a test email from ".config('app.name').".\n\n".
            "If you received this, your SMTP configuration is working.\n".
            'Sent at: '.now()->toDateTimeString(),
            function ($message) use ($toEmail, $fromAddress, $fromName) {
                $message->to($toEmail)
                    ->subject('SMTP test — '.config('app.name'));

                if (filled($fromAddress)) {
                    $message->from($fromAddress, $fromName ?: config('app.name'));
                }
            }
        );
    }

    /**
     * @return array<string, mixed>
     */
    protected function storedMeta(): array
    {
        try {
            if (! Schema::hasTable('settings')) {
                return [];
            }
        } catch (Throwable) {
            return [];
        }

        $data = Setting::get(self::SETTING_KEY, []);

        return is_array($data) ? $data : [];
    }

    protected function normalizeEncryption(mixed $value): string
    {
        $value = strtolower(trim((string) ($value ?? 'tls')));

        return match ($value) {
            'ssl', 'smtps' => 'ssl',
            'none', 'null', '' => 'none',
            default => 'tls',
        };
    }
}
