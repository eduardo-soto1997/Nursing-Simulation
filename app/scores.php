<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\patient;
use App\possible_intervention;
class scores extends Model
{
    public function Patient(){
      return $this->belongsTo(Patient::class);
    }
}
