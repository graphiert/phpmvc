<?php

use Illuminate\Database\Eloquent\Model;

class User extends Model {
  protected $fillable = ["email"];

  public function task() {
    return $this->hasMany(Task::class);
  }
}

