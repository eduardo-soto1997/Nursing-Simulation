<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Dissease;
use App\medication;

class Patient extends Model
{
    public function Dissease(){
      return $this->belongsTo(Dissease::class);

    }
}
