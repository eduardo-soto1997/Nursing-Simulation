<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class possible_intervention extends Model
{
  protected $fillable = ['intervention'];
  public function Dissease(){
    return $this->hasMany(Dissease::class);
  }

  public function Scores(){
    return $this->hasMany(Scores::class);
  }
}
