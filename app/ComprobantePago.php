<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComprobantePago extends Model
{
    public function reserva(){
        return $this->belongsTo('App\Reserva', 'id_reserva');
    }
}
