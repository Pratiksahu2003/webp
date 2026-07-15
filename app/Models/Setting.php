<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Throwable;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'description',
    ];

    public static function get($key, $default = null)
    {
        $setting = static::where('key', $key)->first();

        if (! $setting) {
            return $default;
        }

        if ($setting->type === 'encrypted') {
            if ($setting->value === null || $setting->value === '') {
                return $default;
            }

            try {
                return Crypt::decryptString($setting->value);
            } catch (Throwable) {
                return $default;
            }
        }

        return $setting->value;
    }

    public static function set($key, $value, $type = 'text', $group = 'general', $description = null)
    {
        $storedValue = $value;

        if ($type === 'encrypted' && $value !== null && $value !== '') {
            $storedValue = Crypt::encryptString((string) $value);
        }

        return static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $storedValue,
                'type' => $type,
                'group' => $group,
                'description' => $description,
            ]
        );
    }

    public function scopeByGroup($query, $group)
    {
        return $query->where('group', $group);
    }
}
