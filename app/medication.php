<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medication extends Model
{

  protected $fillable = ['medication', 'dosage','date_time_taken','reason','patient_id'];
  public function patient(){
    return $this->hasMany(patient::class);
  }
}
