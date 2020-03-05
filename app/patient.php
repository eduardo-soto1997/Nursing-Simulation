<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function Dissease(){
      return $this->belongsTo(Dissease::class);

    }
}
