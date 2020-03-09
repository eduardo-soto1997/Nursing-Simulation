<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
  protected $fillable = ['patient_id','question','response','relevant'];
  public function patient(){
    return $this->hasMany(patient::class);
  }
}
