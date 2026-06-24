<?php
namespace App\Helpers;

class PhoneBeautifier
{
    public static function prefix($phone)
    {
        $prefix = preg_replace('/\D/', '', $phone); // Remove non-digit characters

        if (strlen($prefix) >= 3) {
            $prefix = substr($prefix, 0, 3); // Get the first three digits
        }
        return $prefix;
    }

    public static function phone($phone)
    {
        $cleanedNumber = preg_replace('/\D/', '', $phone); // Remove non-digit characters

        $prefix = '';
        $numberAfterPrefix = '';

        if (strlen($cleanedNumber) >= 3) {
            $prefix = substr($cleanedNumber, 0, 3); // Get the first three digits
            $numberAfterPrefix = substr($cleanedNumber, 3); // Get the remaining digits after the prefix
        }

        $formattedNumberAfterPrefix = substr($numberAfterPrefix, 0, 3) . ' - ' . substr($numberAfterPrefix, 3, 2) . ' - ' . substr($numberAfterPrefix, 5);
        return $formattedNumberAfterPrefix;
    }

    public static function fullPhone($phone){
        return '('.self::prefix($phone).') '.self::phone($phone);
    }
    public static function bluredPhone($phone)
    {
        $cleanedNumber = preg_replace('/\D/', '', $phone); // Remove non-digit characters
        $numberAfterPrefix = '';

        if (strlen($cleanedNumber) >= 3) {
            $numberAfterPrefix = substr($cleanedNumber, 3); // Get the remaining digits after the prefix
        }
        $formattedPhoneNumber = '(' .self::prefix($phone) . ') ' . substr($numberAfterPrefix, 0, 3) .'-'. substr($numberAfterPrefix, 3, 2) . '-●●';
        return $formattedPhoneNumber;
    }

    public static function withoutDashes($phone)
    {
        $phone = str_replace([' ', '-'], '', $phone);
        return $phone;
    }
}
