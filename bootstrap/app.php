<?php

// Check URL and Request Method
// For PUT, PATCH, DELETE, use POST form with _method hidden value
$url = parse_url($_SERVER["REQUEST_URI"])['path'];
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];
$method = strtoupper($method);

// composer install
require '../vendor/autoload.php';

// App Logic
require '../core/App.php';

// Database preparation
$sqlite_dbname = "../database/db.sqlite";
if(
  !file_exists($sqlite_dbname) || file_get_contents($sqlite_dbname) == ""
) {
  http_response_code(500);
  echo "Database file not found or not migrated. Exiting...";
  die();
}
App::initDatabase($sqlite_dbname);

// Router initialization
require '../core/Router.php';
require '../app/routes.php';
App::start($url, $method);

