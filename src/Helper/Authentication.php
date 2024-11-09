<?php

try {
    require_once __DIR__ . "/AllowedDomain.php";


    class Authenticator
    {
        private $requestType;
        /**
         * @param string $requestType You have to define which request method you use to verify the csrf token and domains, for example GET | POST
         */
        public function __construct($requestType)
        {
            $this->requestType = $requestType;
        }
        /**
         * @return boolean This function get the csrf token from headers and verify it and also cross check the host or domain name with allowed domains
         */
        public function check($_get_check = false)
        {
            $_ALLWOED = allowdDomains::check();
            $_HEADERS = getallheaders();
            $_CSRF_CHECK = $_get_check ? $_SESSION['auth_code'] == $_HEADERS["X-Csrf-Token"] : true;
            if (
                $this->requestType == "GET" &&
                $_SERVER['REQUEST_METHOD'] == $this->requestType &&
                $_HEADERS['Host'] == $_ALLWOED &&
                $_CSRF_CHECK
            ) {
                return true;
            } elseif (
                $this->requestType == 'POST' &&
                $_SERVER['REQUEST_METHOD'] == $this->requestType &&
                $_HEADERS['Host'] == $_ALLWOED &&
                $_CSRF_CHECK
            ) {
                return true;
            } else {
                return false;
            }
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
