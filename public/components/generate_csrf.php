<?php

function csrfTokenGenerator()
{
    $_gen_ran = bin2hex(random_bytes(25));
    return hash('sha256', $_gen_ran, false);
}

if (session_status() === PHP_SESSION_DISABLED) {
    session_start();
}
$_SESSION["auth_code"] = csrfTokenGenerator();
$_csrf_token = $_SESSION["auth_code"];
echo '<meta name="csrf-token" content="' . $_csrf_token . '">';