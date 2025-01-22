<?php

use Illuminate\Database\Eloquent\Model;

class Task extends Model {
  protected $fillable = ["user_id", "notes"];

  public function user() {
    return $this->belongsTo(User::class);
  }
}

