<?php

use Symfony\Component\HttpFoundation\Response;

new Response(
  !$_request->query->get("showError")
    ? App::view('dbfail.twig') : $ex,
  Response::HTTP_INTERNAL_SERVER_ERROR,
  ['content-type' => 'text/html']
)->prepare($_request)->send();

