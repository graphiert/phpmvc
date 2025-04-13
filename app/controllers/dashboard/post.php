<?php
use Symfony\Component\HttpFoundation\Response;

User::create([
  "email" => $_request->request->get("email")
]);

App::view('dashboard.twig', [
  'users' => User::all()
]);

new Response(
  App::view('dashboard.twig', [
    'users' => User::all()
  ]),
  Response::HTTP_OK,
  ['content-type' => 'text/html']
)->prepare($_request)->send();
