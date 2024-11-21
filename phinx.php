<?php

require_once __DIR__ . '/vendor/autoload.php'; // Include Composer's autoloader

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__); // Load the .env file
$dotenv->load();

// Now you can use getenv() or $_ENV to access environment variables
$dbHost = $_ENV['DB_HOST'];
$dbUser = $_ENV['DB_USER'];
$dbName = $_ENV['DB_NAME'];
$dbPass = $_ENV['DB_PASSWORD'];
$appPhase = $_ENV['APP_PHASE'];

return [
    'paths' => [
        'migrations' => 'db/migrations',
        'seeds' => 'db/seeds',
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => $appPhase,
        'development' => [
            'adapter' => 'mysql',
            'host' => $dbHost,
            'name' => $dbName,
            'user' => $dbUser,
            'pass' => $dbPass,
            'port' => 80,
            'charset' => 'utf8',
        ],
        'production' => [
            'adapter' => 'mysql',
            'host' => $dbHost,
            'name' => $dbName,
            'user' => $dbUser,
            'pass' => $dbPass,
            'port' => 80,
            'charset' => 'utf8',
        ],
    ],
];
