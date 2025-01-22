<?php

$name = $_GET['name'] ?? "World";
$users = User::latest()->get();

App::view('index.twig', compact('name', 'users'));

