<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dissease extends Model
{
  public function Patient(){
    return $this->hasMany(Patient::class);
  }
  public function possible_intervention(){
    return $this->hasMany(possible_intervention::class);
  }
}
