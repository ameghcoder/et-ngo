<?php

require_once __DIR__ . '/../../vendor/autoload.php'; // Include Composer's autoloader

use Dotenv\Dotenv;

try {

    class allowdDomains
    {
        public static function check()
        {
            $dotenv = Dotenv::createImmutable(__DIR__ . "/../../"); // Load the .env file
            $dotenv->load();
                        
            $phaseType = $_ENV['APP_PHASE'];
            if ($phaseType === "development") {
                return "etngo.local";
            } elseif ($phaseType === "production") {
                return "etngo.com";
            }
        }
    }
} catch (Exception $e) {
    die();
}
