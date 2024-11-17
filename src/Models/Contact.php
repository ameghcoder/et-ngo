<?php

namespace App\Models;

use PDO;
use App\Config\Database;
use App\Services\MailService;

class Contact{

    private static function sendEmail($email, $type, $data){
        $EmailService = new MailService();
        session_write_close();

        $templateName = $type == "contact_us" ? "contact_us.html" : "volunteer.html";

        $EmailResponse = $EmailService->sendEmail(
            $_ENV['MAIL_CONTACT'], 
            $_ENV['MAIL_TO'], 
            "User Information form Empowering Tommorrow Website", 
            $templateName,
            $data
        );
        return $EmailResponse;
    }
    public static function saveContactForm($data){
        $conn = Database::connect();

        $query = "INSERT INTO contactus(firstName, lastName, phoneNumber, emailAddress, message) VALUES (:fname, :lname, :number, :email, :msg)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":fname", $data["fname"], PDO::PARAM_STR);
        $stmt->bindParam(":lname", $data["lname"], PDO::PARAM_STR);
        $stmt->bindParam(":number", $data["number"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
        $stmt->bindParam(":msg", $data["message"], PDO::PARAM_STR);

        $response = $stmt->execute();

        self::sendEmail($data["email"], "contact_us", $data);

        return $response;
    }

    public static function saveVolunteerForm($data){
        $conn = Database::connect();

        $query = "INSERT INTO volunteer(fullName, contact, education, occupation, designation, pinCode, city, state, country, availableToParticipate, message) VALUES (:name, :contact, :education, :occupation, :designation, :pincode, :city, :state, :country, :atp, :message)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":contact", $data["contact"], PDO::PARAM_STR);
        $stmt->bindParam(":education", $data["education"], PDO::PARAM_STR);
        $stmt->bindParam(":occupation", $data["occupation"], PDO::PARAM_STR);
        $stmt->bindParam(":designation", $data["designation"], PDO::PARAM_STR);
        $stmt->bindParam(":pincode", $data["pincode"], PDO::PARAM_STR);
        $stmt->bindParam(":city", $data["city"], PDO::PARAM_STR);
        $stmt->bindParam(":state", $data["state"], PDO::PARAM_STR);
        $stmt->bindParam(":country", $data["country"], PDO::PARAM_STR);
        $stmt->bindParam(":atp", $data["atp"], PDO::PARAM_STR);
        $stmt->bindParam(":message", $data["message"], PDO::PARAM_STR);

        $response = $stmt->execute();

        self::sendEmail($data["email"], "volunteer", $data);

        return $response;
    }
}