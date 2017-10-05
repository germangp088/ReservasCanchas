<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{   
    public function cancha(){
        return $this->belongsTo('App\Cancha', 'id_cancha');
    }
       
    public function usuario(){
        return $this->belongsTo('App\Usuario', 'id_usuario');
    }
       
    public function turno(){
        return $this->belongsTo('App\Turno', 'id_turno');
    }
}