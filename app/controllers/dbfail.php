<?php

use Symfony\Component\HttpFoundation\Response;

if(!$_request->query->get("showError")) {
  new Response(
    App::view('dbfail.twig'),
    Response::HTTP_INTERNAL_SERVER_ERROR,
    ['content-type' => 'text/html']
  )->prepare($_request)->send();
} else {
  throw $ex;
}

