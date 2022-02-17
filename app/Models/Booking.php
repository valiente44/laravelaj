<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    function Event() {
        return $this->belongsTo('App\Models\Event');
        ;
    }

    function user() {
        return $this->belongsTo('App\Models\User');
        ;
    }

}
