<?php


use App\Services\SessionManagement;
use Respect\Validation\Validator as v;

// Use of Global Variables from Init.php
global $twig, $icons, $images;


function addCSRFToken($twig){
    // CSRF Token
    $CSRF = new SessionManagement();
    // Generate and add token to session
    $CSRF->AddCSRF();  // Store the token in the session
    
    // Get the token value from the session to use in the meta tag
    $tokenValue = $CSRF->GetTokenValue();
    $twig->addGlobal("csrfToken", $tokenValue);  // Set csrfToken in header
}


// About us page
$router->map('GET', '/', function() use ($twig){
    echo $twig->render('about_us.twig');
});

// Contact us page
$router->map('GET', '/contact-us', function() use ($twig){
    addCSRFToken($twig);
    echo $twig->render('contact_us.twig');
});


// What we do page
$router->map('GET', '/what-we-do', function() use ($twig){
    echo $twig->render('whatwedo.twig');
});

// Volunteer with ET
$router->map('GET', '/volunteer-with-us', function() use ($twig){
    addCSRFToken($twig);
    echo $twig->render('volunteerform.twig');
});