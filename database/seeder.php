<?php

$user = User::create(["email" => "soeharto@example.com"]);
$user->task()->create(["notes" => "Kelas"]);
$user->task()->create(["notes" => "ini duaaa"]);

