<?php

namespace App\Helpers;

class MoneyHelper
{
    public static function denominator($money): string
    {
        $money = abs($money);

        $words = ["", "one", "two", "three",
            "four", "five", "six", "seven",
            "eight", "nine", "ten", "eleven",
            "twelve", "thirteen", "fourteen", "fifteen",
            "sixteen", "seventeen", "eighteen", "nineteen"];

        $denominators = ["", "", "twenty", "thirty", "forty",
            "fifty", "sixty", "seventy", "eighty", "ninety"];

        $temp = "";
        if ($money < 20) {
            $temp = " " . $words[$money];
        } else if ($money < 100) {
            $temp = $denominators[floor($money / 10)] . " " . $words[$money % 10];
        } else if ($money < 1000) {
            $temp = $words[floor($money / 100)] . " hundred " . $denominators[floor(($money % 100) / 10)] . " " . $words[$money % 10];
        } else if ($money < 1000000) {
            $temp = self::denominator(floor($money / 1000)) . " thousand " . self::denominator($money % 1000);
        } else if ($money < 1000000000) {
            $temp = self::denominator(floor($money / 1000000)) . " million " . self::denominator($money % 1000000);
        } else if ($money < 1000000000000) {
            $temp = self::denominator(floor($money / 1000000000)) . " billion " . self::denominator($money % 1000000000);
        } else if ($money < 1000000000000000) {
            $temp = self::denominator(floor($money / 1000000000000)) . " trillion " . self::denominator($money % 1000000000000);
        }
        return $temp;

    }
}
