<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{

  protected $fillable = ['class_name', 'course_number', 'section', 'instructor'];
    public function User(){
      return $this->hasMany(User::class);
    }
}
