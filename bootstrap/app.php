<?php

// Check URL and Request Method
// For PUT, PATCH, DELETE, use POST form with _method hidden value
$url = parse_url($_SERVER["REQUEST_URI"])['path'];
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

// composer install
require '../vendor/autoload.php';

// App Logic
require '../core/App.php';

// Database preparation
if(
  !file_exists("../db.sqlite") || file_get_contents("../db.sqlite") == ""
) {
  http_response_code(500);
  echo "Database file not found or not migrated. Exiting...";
  die();
}
App::initDatabase("../db.sqlite");

// Router initialization
require '../core/Router.php';
require '../bootstrap/routes.php';
App::start($url, $method);

