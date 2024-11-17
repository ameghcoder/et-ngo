<?php
use App\Config\Database;
use App\Models\Assets;

require __DIR__ . '/../../vendor/autoload.php';

// $icons = Assets::Icons();
$images = Assets::Images();

// Header Content (Like Navigation Links for Mega Menu)

// Define the path of Twig Template
$templateLoader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../Views');
$twig = new \Twig\Environment($templateLoader);

$navigationData = [];

// Add some more global variable values like static icons and image
$navigationData["aboutUs"] = $images['about-us']['src'];
$navigationData["contactUs"] = $images['contact-us']['src'];
$navigationData["heroSection"] = $images['contact-us']['src'];
$navigationData["inspiringYoungMinds01"] = $images['inspiring-young-minds-01']['src'];
$navigationData["inspiringYoungMinds02"] = $images['inspiring-young-minds-02']['src'];
$navigationData["inspiringYoungMinds03"] = $images['inspiring-young-minds-03']['src'];
$navigationData["inspiringYoungMinds04"] = $images['inspiring-young-minds-04']['src'];
$navigationData["ourMission"] = $images["our-mission"]["src"];
$navigationData["whatWeDo2"] = $images["what-we-do-2"]["src"];
$navigationData["whatWeDo3"] = $images["what-we-do-3"]["src"];


// Set Navigation links as a global variable in Twig
// Add each global variable from the array
foreach($navigationData as $key => $value){
    $twig->addGlobal($key, $value);
}

// init db
// function getDbConnection(){
//     return Database::connect();
// }

// Make some variable global
global $twig, $icons, $images;