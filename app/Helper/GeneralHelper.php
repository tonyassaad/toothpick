<?php

namespace App\Helper;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Money\Currency;
use Money\Money;
use Ramsey\Uuid\Uuid;

class GeneralHelper
{
    public static function getUniqueIdentitifer($limit = 12)
    {
        return Str::upper(substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit));
    }

    public static function concat2Strings($string1, $string2)
    {
        return $string1.' '.$string2;
    }

    public static function generateUuid()
    {
        return  Str::uuid();
    }

    public static function moneyAmount($amount, $currency = 'AUD', $convert = false)
    {
        /**
         * Instance of money class.
         *
         * @param mixed  $amount
         * @param string $currency
         * @param bool   $convert
         *
         * @return \Akaunting\Money\Money
         */
        $currency = new Currency($currency);
        $amountInCent = $amount * 100;
        $moneyInCent = new Money($amountInCent, $currency, $convert);
        $money = new Money($amount, $currency, $convert);

        return [
            'money_in_cent'=>$moneyInCent,
            'money_in_dollar'=>$money,
            ];
    }

    public static function currency($currency)
    {
        if (! function_exists('currency')) {
            /**
             * Instance of currency class.
             *
             * @param string $currency
             *
             * @return \Akaunting\Money\Currency
             */
            function currency($currency)
            {
                return new Currency($currency);
            }
        }
    }

    public static function removeImage($imagePath)
    {
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }
}
