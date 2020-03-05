<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Dissease;

class Patient extends Model
{
    public function Dissease(){
      return $this->belongsTo(Dissease::class);

    }
}
