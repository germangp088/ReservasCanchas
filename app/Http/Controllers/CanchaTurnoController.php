<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CanchasTurno;
use App\Turno;

class CanchaTurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$reservas = CanchasTurno::all()->where('reservada', 0);

		$turnos = Turno::all();
		
        $canchas = new CanchaController();
        $arrayCanchas = $canchas->getAll()->where('id_estado_cancha', 1);

		foreach ($reservas as $reserva) {
			foreach ($turnos as $turno) {
				if($reserva->id_turno == $turno->id)
				{
					$reserva->hora = $turno->hora;
					if($turno->noche != 1)
					{
						foreach ($arrayCanchas as $cancha) {
							if($cancha->id == $reserva->id_cancha)
							{
								$reserva->precio = $cancha->precio_dia;
							}
						}
					}
					else{
						foreach ($arrayCanchas as $cancha) {
							if($cancha->id == $reserva->id_cancha)
							{
								$reserva->precio = $cancha->precio_noche;
							}
						}
					}
				}
			}
		}
		
		return view('reservaCancha', array ('reservas'=>$reservas), array ('canchas'=>$arrayCanchas));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idCancha, $idTurno)
    {
        $req->validate([
            'id_cancha' => 'required|exists:canchas,id',
            'id_turno' => 'required|exists:turnos,id',
            'reservada' => 'required|numeric|min:0'
        ]);
        $CTnew = new CanchasTurno ();
        
        $CTnew->id_cancha = $req->$idCancha;
        $CTnew->id_turno = $req->$idTurno;
        
        $CTnew->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
	
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
