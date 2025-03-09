<?php

App::view('dashboard.twig', [
  'users' => User::all()
]);


