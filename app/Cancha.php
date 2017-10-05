<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cancha extends Model
{   
    public function tipoCancha(){
        return $this->belongsTo('App\TipoCancha', 'id_tipo_cancha');
    }
    
    public function estado(){
        return $this->belongsTo('App\EstadoCancha', 'id_estado_cancha');
    }
}
