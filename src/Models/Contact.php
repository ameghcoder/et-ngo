<?php

use PDO;
require_once __DIR__ . "/../Helper/Connection.php";

class Contact{
    public static function save($data){
        $conn = Database::connect();

        $query = "INSERT INTO contactus(firstName, lastName, phoneNumber, emailAddress, message) VALUES (:fname, :lname, :number, :email, :msg)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":fname", $data["fname"], PDO::PARAM_STR);
        $stmt->bindParam(":lname", $data["lname"], PDO::PARAM_STR);
        $stmt->bindParam(":number", $data["number"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
        $stmt->bindParam(":msg", $data["message"], PDO::PARAM_STR);

        return $stmt->execute();
    }
}