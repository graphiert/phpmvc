<?php

// composer install
require '../vendor/autoload.php';

// App Logic
require '../resources/constant.php';
require '../core/App.php';
require '../core/File.php';

// Database preparation
File::createIfNotExists(SQLITE_PATH);
App::initDatabase(SQLITE_PATH);

// Router initialization
require '../core/Router.php';
require '../app/routes.php';

// Run app
App::start(
  // Check URL and Request Method
  parse_url($_SERVER["REQUEST_URI"])['path'],

  // For PUT, PATCH, DELETE, use POST form with _method hidden value
  strtoupper($_POST["_method"] ?? $_SERVER["REQUEST_METHOD"])
);

