<?php
use Symfony\Component\HttpFoundation\Response;

new Response(
  App::view('404.twig'),
  Response::HTTP_NOT_FOUND,
  ['content-type' => 'text/html']
)->prepare($_request)->send();

