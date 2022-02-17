<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    function User() {
        return $this->belongsTo('App\Models\User');
        ;
    }

    function Event() {
        return $this->hasMany('App\Models\Event');
        ;
    }

}
