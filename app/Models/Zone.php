<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    function Event_Zone() {
        return $this->belongsTo('App\Models\Event_Zone');
        ;
    }

    function event(){
        return $this->hasMany('App\Models\Event');
        ;
    }

    

}
