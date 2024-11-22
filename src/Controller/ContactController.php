<?php

namespace App\Controller;

use App\Helpers\JsonResponse;
use App\Helpers\Sanitizer;
use App\Helpers\Validate;
use App\Services\SessionManagement;
use App\Models\Contact;

require_once __DIR__ . "/../Models/Contact.php";

class ContactController{
    public function contactUs(){
        // First verify request
        SessionManagement::VerifyToken("csrf_token");

        if(
            !$_POST["fname"] && 
            !$_POST["lname"] && 
            !$_POST["email"] &&
            !$_POST["number"] &&
            !$_POST["message"] &&
            !$_POST["country_code"]
        ){ 
            JsonResponse::send(
                "Data is type or invalide",
                "error"
            );
        }

        // sanitize data 
        $data = [
            "fname" => Sanitizer::sanitizeFullName($_POST["fname"]),
            "lname" => Sanitizer::sanitizeFullName($_POST["lname"]),
            "email" => Sanitizer::sanitizeEmail($_POST["email"]),
            "number" => Sanitizer::sanitizeMobile($_POST["number"]),
            "message" => Sanitizer::sanitizeString($_POST["message"]),
            "country" => $_POST["country_code"]
        ];

        // now validate data
        if(
            Validate::validateFullName($data["fname"]) &&
            Validate::validateFullName($data["lname"]) &&
            Validate::validateEmail($data["email"]) &&
            Validate::validateMobile($data["number"]) &&
            Validate::validateString($data["message"])
        ){
            $data["number"] = $data["country"] . $data["number"];
            
            $response = Contact::saveContactForm($data);

            if($response){
                JsonResponse::send(
                    "Thank you for reaching out to us. We have received your message.",
                    "success"
                );
            } else{
                JsonResponse::send(
                    "Something went wrong, Try again",
                    "error"
                );
            }
        } else{
            JsonResponse::send(
                "Invalid Data, Try again",
                "error"
            );
        }
    }

    public function volunteerForm(){
        // First verify request
        SessionManagement::VerifyToken("csrf_token");

        if(
            !$_POST["name"] && 
            !$_POST["email"] &&
            !$_POST["mobile_number"] &&
            !$_POST["education"] &&
            !$_POST["occupation"] &&
            !$_POST["designation"] &&
            !$_POST["pincode"] &&
            !$_POST["city"] &&
            !$_POST["state"] &&
            !$_POST["country"] &&
            !$_POST["atp"] &&
            !$_POST["message"]
        ){ 
            JsonResponse::send(
                "Data is type or invalide",
                "error"
            );
        }

        // sanitize data 
        $data = [
            "fullName" => Sanitizer::sanitizeFullName($_POST["name"]),
            "email" => Sanitizer::sanitizeEmail($_POST["email"]),
            "number" => Sanitizer::sanitizeNumber($_POST["mobile_number"]),
            "education" => Sanitizer::sanitizeString($_POST["education"]),
            "occupation" => Sanitizer::sanitizeString($_POST["occupation"]),
            "designation" => Sanitizer::sanitizeString($_POST["designation"]),
            "pincode" => $_POST["pincode"],
            "city" => Sanitizer::sanitizeString($_POST["city"]),
            "state" => Sanitizer::sanitizeString($_POST["state"]),
            "country" => Sanitizer::sanitizeString($_POST["country"]),
            "atp" => Sanitizer::sanitizeString($_POST["atp"]),
            "message" => Sanitizer::sanitizeString($_POST["message"]),
        ];

        // now validate data
        if(
            Validate::validateFullName($data["fullName"]) &&
            Validate::validateEmail($data["email"]) &&
            Validate::validateMobile($data["number"]) &&
            Validate::validateString($data["education"]) &&
            Validate::validateString($data["occupation"]) &&
            Validate::validateString($data["designation"]) &&
            Validate::validatePinCode($data["pincode"]) &&
            Validate::validateString($data["city"]) &&
            Validate::validateString($data["state"]) &&
            Validate::validateString($data["country"]) &&
            Validate::validateString($data["atp"]) &&
            Validate::validateString($data["message"])
        ){
            $response = Contact::saveVolunteerForm($data);
            if($response){
                JsonResponse::send(
                    "Thank you for reaching out to us. We have received your message.",
                    "success"
                );
            } else{
                JsonResponse::send(
                    "Something went wrong, Try again",
                    "error"
                );
            }
        } else{
            $msg = "";
            switch (false) {
                case Validate::validateFullName($data["fullName"]):
                    $msg = "Full Name have";
                    break;
                    
                case Validate::validateEmail($data["email"]):
                    $msg = "Email have";
                    break;

                case Validate::validateMobile($data["number"]):
                    $msg = "Number have";
                    break;

                case Validate::validateString($data["education"]):
                    $msg = "Education have";
                    break;

                case Validate::validateString($data["occupation"]):
                    $msg = "Occupation have";
                    break;

                case Validate::validateString($data["designation"]):
                    $msg = "Designation have";
                    break;
                case Validate::validatePinCode($data["pincode"]) :
                    $msg = "Pincode have";
                    break;
                case Validate::validateString($data["city"]) :
                    $msg = "City have";
                    break;
                case Validate::validateString($data["state"]) :
                    $msg = "State have";
                    break;
                case Validate::validateString($data["country"]) :
                    $msg = "Country have";
                    break;
                case Validate::validateString($data["atp"]) :
                    $msg = "ATP have";
                    break;
                case Validate::validateString($data["message"]):
                    $msg = "Message have";
                    break;
            }

            JsonResponse::send(
                "$msg invalid data and value is " . $data['pincode'] . ", Try again",
                "error"
            );
        }
    }
}