<?php

$name = $request->query->get('name') ?? "World";
$users = User::latest()->get();

App::view('index.twig', compact('name', 'users'));

