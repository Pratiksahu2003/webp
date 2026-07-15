<?php

namespace App\Support;

class IndianCurrency
{
    public static function inWords(float|string $amount): string
    {
        $amount = round((float) $amount, 2);
        $rupees = (int) floor($amount);
        $paise = (int) round(($amount - $rupees) * 100);

        $words = self::numberToWords($rupees);
        $result = 'Rupees '.($words !== '' ? ucwords($words) : 'Zero');

        if ($paise > 0) {
            $paiseWords = self::numberToWords($paise);
            $result .= ' and '.ucwords($paiseWords).' Paise';
        }

        return $result.' Only';
    }

    protected static function numberToWords(int $number): string
    {
        if ($number === 0) {
            return 'zero';
        }

        $words = [
            0 => '', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five',
            6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine', 10 => 'ten',
            11 => 'eleven', 12 => 'twelve', 13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
            16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen', 19 => 'nineteen', 20 => 'twenty',
            30 => 'thirty', 40 => 'forty', 50 => 'fifty', 60 => 'sixty', 70 => 'seventy',
            80 => 'eighty', 90 => 'ninety',
        ];

        $levels = [
            10000000 => 'crore',
            100000 => 'lakh',
            1000 => 'thousand',
            100 => 'hundred',
        ];

        $parts = [];

        foreach ($levels as $value => $label) {
            if ($number >= $value) {
                $count = intdiv($number, $value);
                $number %= $value;
                $parts[] = self::numberToWords($count).' '.$label;
            }
        }

        if ($number > 0) {
            if ($number < 21) {
                $parts[] = $words[$number];
            } else {
                $tens = ((int) floor($number / 10)) * 10;
                $ones = $number % 10;
                $parts[] = trim($words[$tens].($ones ? ' '.$words[$ones] : ''));
            }
        }

        return trim(implode(' ', $parts));
    }
}
