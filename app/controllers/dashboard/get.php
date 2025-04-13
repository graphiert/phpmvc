<?php
use Symfony\Component\HttpFoundation\Response;

new Response(
  App::view('dashboard.twig', [
    'users' => User::all()
  ]),
  Response::HTTP_OK,
  ['content-type' => 'text/html']
)->prepare($_request)->send();

