<?php

require '../vendor/autoload.php';
require '../core/App.php';

$sqlite_dbname = "../db.sqlite";
App::initDatabase($sqlite_dbname);

require '../database/seeder.php';

echo "Database successfully seeded.".PHP_EOL;

