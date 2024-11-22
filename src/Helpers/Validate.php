<?php

namespace App\Helpers;

use Respect\Validation\Validator as v;

class Validate {

    // Validate email address
    public static function validateEmail($email) {
        return v::email()->validate($email);
    }

    // Validate full name (Only allows alphabets and spaces)
    public static function validateFullName($name) {
        // return v::alpha()->noWhitespace()->length(3, 100)->validate($name);
        return v::length(3, 100)->regex('/^[a-zA-Z\s]+$/')->validate($name);
    }

    // Validate password (At least 8 characters, at least 1 letter, and at least 1 number)
    public static function validatePassword($password) {
        return v::stringType()->length(8, null)->regex('/[a-zA-Z]/')->regex('/\d/')->validate($password);
    }

    // Validate address (non-empty, length 10-255 characters)
    public static function validateAddress($address) {
        return v::stringType()->length(10, 255)->validate($address);
    }

    // Validate OTP (Numeric, 6 digits)
    public static function validateOTP($otp) {
        return v::numericVal()->length(6, 6)->validate($otp);
    }    
    // Validate OTP (Numeric, 6 digits)
    public static function validatePinCode($pincode) {
        return v::regex('/^[A-Za-z0-9][A-Za-z0-9\-\s]{2,9}[A-Za-z0-9]$/')->validate($pincode);
    }

    // Validate mobile number (10 digits, starts with 7, 8, or 9)
    public static function validateMobile($mobile) {
        return v::numericVal()->length(10, 10)->regex('/^[789]\d{9}$/')->validate($mobile);
    }

    // Validate search string (alphanumeric and spaces only, length between 3 and 100)
    public static function validateSearchString($search) {
        return v::alnum(' "')->length(3, 100)->validate($search);
    }

    // Validate string (only alphabet)
    public static function validateString($str){
        return v::stringVal()->length(3, 100)->validate($str);
    }

    // Validate ID (positive integer)
    public static function validateId($id) {
        return v::intVal()->positive()->validate($id);
    }

    // Validate URL (valid URL format)
    public static function validateURL($url) {
        return v::url()->validate($url);
    }
}

