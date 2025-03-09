<?php

$sqlite_dbname = SQLITE_PATH;
if(
  !file_exists($sqlite_dbname) || file_get_contents($sqlite_dbname) == ""
) {
  http_response_code(500);
  require_once "../resources/dbfail.html";
  die();
}

