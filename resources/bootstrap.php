<?php

// Check URL and Request Method
// For PUT, PATCH, DELETE, use POST form with _method hidden value
$url = parse_url($_SERVER["REQUEST_URI"])['path'];
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];
$method = strtoupper($method);

// composer install
require '../vendor/autoload.php';

// App Logic
require '../resources/constant.php';
require '../core/App.php';

// Database preparation
require '../resources/dbprep.php';
App::initDatabase(SQLITE_PATH);

// Router initialization
require '../core/Router.php';
require '../app/routes.php';
App::start($url, $method);

