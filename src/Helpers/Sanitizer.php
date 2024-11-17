<?php

namespace App\Helpers;

class Sanitizer
{
    /**
     * Sanitize a full name by trimming extra spaces and removing any HTML tags.
     */
    public static function sanitizeFullName(string $name): string
    {
        $name = trim(strip_tags($name));
        return preg_replace('/\s+/', ' ', $name);
    }

    public static function sanitizeNumber(string $str){
        $number = trim($str);
        return preg_replace('/^\d+$/', '', $number);
    }

    /**
     * Sanitize an address by trimming and removing any HTML tags.
     */
    public static function sanitizeAddress(string $address): string
    {
        $address = trim(strip_tags($address));
        return preg_replace('/\s+/', ' ', $address);
    }

    /**
     * Sanitize a general string by removing HTML tags and trimming whitespace.
     */
    public static function sanitizeString(string $string): string
    {
        return trim(strip_tags($string));
    }

    /**
     * Sanitize a password by trimming spaces.
     */
    public static function sanitizePassword(string $password): string
    {
        return trim($password);
    }

    /**
     * Sanitize an email address by removing unwanted characters.
     */
    public static function sanitizeEmail(string $email): string
    {
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }

    /**
     * Sanitize a mobile number by removing non-numeric characters.
     */
    public static function sanitizeMobile(string $mobile): string
    {
        return preg_replace('/\D/', '', $mobile);
    }

    /**
     * Sanitize a otp validation code by removing non-numeric characters.
     */
    public static function sanitizeOTP(string $otp){
        return preg_replace("/[^0-9]/", "", $otp);
    }
}
