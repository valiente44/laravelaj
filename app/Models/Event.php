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
    function opinions() {
        return $this->hasMany('App\Models\Opinion');
        ;
    }

    function categoria(){
        return $this->belongsTo('App\Models\Events');
    }

  
    function zone() {
        return $this->belongsTo('App\Models\Zone');
        ;
    }

    public function scopeName($events,$name,$categoria){
        if($name && $categoria ){
            $events = Event::where('name', 'LIKE',"%$name%", 'AND', 'category_id', "=", "$categoria")
            ->orWhere('name', 'LIKE',"%$name%")
            ->orWhere('category_id', "=", "$categoria")
            ->get();

            return $events;
        }

        if($name){
            $events = Event::where('name', 'LIKE',"%$name%")->get();
            return $events;
        }

        if($categoria){
            $events = Event::where('category_id', '=' , $categoria)->get();
            return $events;
        }
    }




}
