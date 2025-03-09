<?php

User::create([
  "email" => $superglobals->request->get("email")
]);

App::view('dashboard.twig', [
  'users' => User::all()
]);
