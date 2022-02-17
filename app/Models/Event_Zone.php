<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_Zone extends Model
{
    use HasFactory;
  

    function Events() {
        return $this->hasMany('App\Models\Events');
        ;
    }




}
