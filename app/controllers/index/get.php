<?php

$name = $superglobals->query->get('name') ?? "World";

App::view('index.twig', compact('name'));

