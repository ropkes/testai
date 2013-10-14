<?php
require '../vendor/autoload.php';


// Set up DB
USE RedBean_Facade as R;
R::setup('mysql:host=' . getenv('DB_HOST') . ';dbname=' . getenv('DB_DB'),
    getenv('DB_USER'), getenv('DB_PASSWORD'));


// Prepare app
$app = new \Slim\Slim(array(
	'mode'		=> getenv('APP_ENV'),
	'debug'		=> getenv('APP_ENV') == 'test' || getenv('APP_ENV') == 'dev',
	));


// Define default route
$app->get('/', function () use ($app) {
    echo "Test Pivotal HoHo!! Hey!!! Yes, I am working and I am auto Deployed!<br>";
});

// Test route
require_once '../app/route/routes_db.php';


// Run app
$app->run();