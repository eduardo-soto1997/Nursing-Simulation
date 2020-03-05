<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class possible_intervention extends Model
{
  public function Dissease(){
    return $this->hasMany(Dissease::class);
  }
}
