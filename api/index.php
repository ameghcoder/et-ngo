<?php


require_once __DIR__ . "/../src/Helper/Authentication.php";
require_once __DIR__ . "/../src/Helper/JsonMessage.php";
require_once __DIR__ . "/../src/Controller/ContactController.php";

$Authenticator = new Authenticator("POST");
if($Authenticator->check()){
    $purpose = $_POST["purpose"] ?? null;
    
    if($purpose){
        if($purpose === "contact"){
            $fName = $_POST["fname"] ?? null;
            $lName = $_POST["lname"] ?? null;
            $email = $_POST["email"] ?? null;
            $number = $_POST["number"] ?? null;
            $message = $_POST["message"] ?? null;

            if(
                $fName && $lName && $email && $number && $message
            ){
                $saveData = new ContactController();
                $saveData->store([
                    "fname" => $fName,
                    "lname" => $lName,
                    "email" => $email,
                    "number" => $number,
                    "message" => $message,
                ]);

                if($saveData){
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
                    "Some data is missing or invalid",
                    "error"
                );
            }

        } else if($purpose === "volunteer"){

        } else{
            JsonResponse::send(
                "Invalid purpose",
                "error"
            );
        }
    } else{
        JsonResponse::send(
            "Purpose not defined",
            "error",
        );
    }
}