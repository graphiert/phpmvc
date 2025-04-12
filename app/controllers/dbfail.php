<?php

http_response_code(500);
if(!$superglobals->query->get("showError")) {
  App::view('dbfail.twig');
} else {
  echo $ex;
}
