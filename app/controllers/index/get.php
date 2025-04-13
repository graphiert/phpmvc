<?php
use Symfony\Component\HttpFoundation\Response;

$name = $_request->query->get('name') ?? "World";

new Response(
  App::view('index.twig', compact('name')),
  Response::HTTP_OK,
  ['content-type' => 'text/html']
)->prepare($_request)->send();


