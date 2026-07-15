<?php

namespace App\Support;

class IndianGstStates
{
    /**
     * GST state/UT code => official name used for place of supply.
     *
     * @return array<string, string>
     */
    public static function all(): array
    {
        return [
            '01' => 'Jammu and Kashmir',
            '02' => 'Himachal Pradesh',
            '03' => 'Punjab',
            '04' => 'Chandigarh',
            '05' => 'Uttarakhand',
            '06' => 'Haryana',
            '07' => 'Delhi',
            '08' => 'Rajasthan',
            '09' => 'Uttar Pradesh',
            '10' => 'Bihar',
            '11' => 'Sikkim',
            '12' => 'Arunachal Pradesh',
            '13' => 'Nagaland',
            '14' => 'Manipur',
            '15' => 'Mizoram',
            '16' => 'Tripura',
            '17' => 'Meghalaya',
            '18' => 'Assam',
            '19' => 'West Bengal',
            '20' => 'Jharkhand',
            '21' => 'Odisha',
            '22' => 'Chhattisgarh',
            '23' => 'Madhya Pradesh',
            '24' => 'Gujarat',
            '26' => 'Dadra and Nagar Haveli and Daman and Diu',
            '27' => 'Maharashtra',
            '29' => 'Karnataka',
            '30' => 'Goa',
            '31' => 'Lakshadweep',
            '32' => 'Kerala',
            '33' => 'Tamil Nadu',
            '34' => 'Puducherry',
            '35' => 'Andaman and Nicobar Islands',
            '36' => 'Telangana',
            '37' => 'Andhra Pradesh',
            '38' => 'Ladakh',
            '97' => 'Other Territory',
        ];
    }

    /**
     * @return list<string>
     */
    public static function names(): array
    {
        return array_values(self::all());
    }

    public static function codeFor(?string $state): ?string
    {
        $canonical = self::canonicalName($state);

        if ($canonical === null) {
            return null;
        }

        $flipped = array_flip(self::all());

        return $flipped[$canonical] ?? null;
    }

    public static function nameForCode(?string $code): ?string
    {
        $code = str_pad(preg_replace('/\D+/', '', (string) $code) ?? '', 2, '0', STR_PAD_LEFT);

        return self::all()[$code] ?? null;
    }

    public static function canonicalName(?string $state): ?string
    {
        $raw = strtolower(trim(preg_replace('/\s+/', ' ', (string) $state) ?? ''));

        if ($raw === '') {
            return null;
        }

        if (preg_match('/^\d{1,2}$/', $raw)) {
            return self::nameForCode($raw);
        }

        $aliases = [
            'jammu & kashmir' => 'Jammu and Kashmir',
            'j&k' => 'Jammu and Kashmir',
            'uttaranchal' => 'Uttarakhand',
            'orissa' => 'Odisha',
            'pondicherry' => 'Puducherry',
            'nct of delhi' => 'Delhi',
            'new delhi' => 'Delhi',
            'dadra and nagar haveli' => 'Dadra and Nagar Haveli and Daman and Diu',
            'daman and diu' => 'Dadra and Nagar Haveli and Daman and Diu',
            'andaman and nicobar' => 'Andaman and Nicobar Islands',
            'andhra' => 'Andhra Pradesh',
            'up' => 'Uttar Pradesh',
            'mp' => 'Madhya Pradesh',
            'hp' => 'Himachal Pradesh',
            'tn' => 'Tamil Nadu',
            'wb' => 'West Bengal',
        ];

        if (isset($aliases[$raw])) {
            return $aliases[$raw];
        }

        foreach (self::all() as $name) {
            if (strtolower($name) === $raw) {
                return $name;
            }
        }

        return null;
    }

    public static function isValid(?string $state): bool
    {
        return self::canonicalName($state) !== null;
    }

    /**
     * @return list<string>
     */
    public static function validationValues(): array
    {
        return self::names();
    }
}
