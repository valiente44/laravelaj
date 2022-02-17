<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['name','img','fecha_inicio','fecha_final','hora_inicio','hora_fin','description','price','capacity','category_id','zone_id'];

    function Event_zones() {
        return $this->belongsTo('App\Models\Event_Zone');
        ;
    }

    function Booking() {
        return $this->hasMany('App\Models\Booking');
        ;
    }

    function categoria(){
        return $this->belongsTo('App\Models\Events');
    }

    //improvisado
    function zone() {
        return $this->belongsTo('App\Models\Zone');
        ;
    }

}
