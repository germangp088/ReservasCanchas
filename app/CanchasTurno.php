<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CanchasTurno extends Model
{
    public function cancha(){
        return $this->belongsToMany('App\Cancha', 'id_cancha');
    }
    
    public function turno(){
        return $this->belongsToMany('App\Turno', 'id_turno');
    }
}
