<?php


// Authentication APIs
$router->map('POST', '/api/contactform', 'ContactController@contactUs');        // List all users
$router->map('POST', '/api/volunteerform', 'ContactController@volunteerForm');        // List all users
