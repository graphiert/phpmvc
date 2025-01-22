<?php

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('users', function ($table) {
  $table->increments('id');
  $table->string('email')->unique();
  $table->timestamps();
});

Capsule::schema()->create('tasks', function($table) {
  $table->increments('id');
  $table->foreignId('user_id')->constrained();
  $table->string('notes');
  $table->timestamps();
});

