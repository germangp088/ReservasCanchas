<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{   
    public function cancha(){
        return $this->belongsTo('App\Cancha', 'id_cancha');
    }
       
    public function user(){
        return $this->belongsTo('App\User', 'id_user');
    }
       
    public function turno(){
        return $this->belongsTo('App\Turno', 'id_turno');
    }
}