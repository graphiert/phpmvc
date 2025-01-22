<?php

require '../vendor/autoload.php';
require '../core/App.php';

function createFile($filename) {
  $fp = fopen($filename, "wb");
  fwrite($fp,'');
  fclose($fp);
}

$sqlite_dbname = "../db.sqlite";

if (!file_exists($sqlite_dbname)) {
  createFile($sqlite_dbname);
}

App::initDatabase($sqlite_dbname);

if (file_get_contents($sqlite_dbname) == '') {
  require '../database/schema.php';
  echo "Database successfully migrated.".PHP_EOL;
}

