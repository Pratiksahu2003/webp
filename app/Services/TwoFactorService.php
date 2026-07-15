<?php

namespace App\Services;

use App\Models\User;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use PragmaRX\Google2FA\Google2FA;

class TwoFactorService
{
    public function __construct(
        protected Google2FA $google2fa = new Google2FA,
    ) {}

    public function generateSecret(): string
    {
        return $this->google2fa->generateSecretKey();
    }

    public function encryptSecret(string $secret): string
    {
        return Crypt::encryptString($secret);
    }

    public function decryptSecret(string $encrypted): string
    {
        return Crypt::decryptString($encrypted);
    }

    public function qrCodeSvg(User $user, string $secret): string
    {
        $company = config('app.name', 'VanTroZ');
        $otpauth = $this->google2fa->getQRCodeUrl($company, $user->email, $secret);

        $renderer = new ImageRenderer(
            new RendererStyle(192, 0),
            new SvgImageBackEnd
        );

        return (new Writer($renderer))->writeString($otpauth);
    }

    public function verify(string $secret, string $code): bool
    {
        $code = preg_replace('/\s+/', '', $code) ?? '';

        if ($code === '') {
            return false;
        }

        return $this->google2fa->verifyKey($secret, $code, 1);
    }

    /**
     * @return list<string>
     */
    public function generateRecoveryCodes(int $count = 8): array
    {
        return Collection::times($count, fn () => Str::lower(Str::random(4).'-'.Str::random(4)))
            ->values()
            ->all();
    }

    /**
     * @param  list<string>  $codes
     */
    public function hashRecoveryCodes(array $codes): string
    {
        return Crypt::encryptString(json_encode(array_values($codes)));
    }

    /**
     * @return list<string>
     */
    public function decryptRecoveryCodes(?string $payload): array
    {
        if (! filled($payload)) {
            return [];
        }

        $decoded = json_decode(Crypt::decryptString($payload), true);

        return is_array($decoded) ? array_values($decoded) : [];
    }

    public function consumeRecoveryCode(User $user, string $code): bool
    {
        $codes = $this->decryptRecoveryCodes($user->two_factor_recovery_codes);
        $normalized = Str::lower(trim($code));
        $matchIndex = null;

        foreach ($codes as $index => $stored) {
            if (hash_equals(Str::lower($stored), $normalized)) {
                $matchIndex = $index;
                break;
            }
        }

        if ($matchIndex === null) {
            return false;
        }

        unset($codes[$matchIndex]);

        $user->forceFill([
            'two_factor_recovery_codes' => $this->hashRecoveryCodes(array_values($codes)),
        ])->save();

        return true;
    }
}
