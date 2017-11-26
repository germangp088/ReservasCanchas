<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CanchasTurno;
use App\Turno;
use Cache;

class CanchaTurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(/*$fecha*/)
    {
        if(!\Auth::user()){
            return redirect()->action('HomeController@index');
        }

        $fechaFiltro = date("Y-m-j");
        $fechaMin = date("Y-m-j",strtotime("$fechaFiltro -0 day") );
        $fechaMax = date("Y-m-j",strtotime("$fechaFiltro +7 day") );

        //validar si es nulo cargarlo con new date.
        $reserasControlador = new ReservaController ();
        $resrvasPrevias = $reserasControlador->getAll()->where ('fecha', $fechaFiltro);
        //echo $resrvasPrevias;

        /* Levanta todas las canchas sin reserva - uso unico de informacion */
		$canchaTurno = CanchasTurno::all();//->where('reservada', 0);

		$turnos = Turno::all();
		
        $canchas = new CanchaController();
        /*filtro unicamente para listar canchas abiertas*/
        $arrayCanchas = $canchas->getAll()->where('id_estado_cancha', 1);
        foreach ($canchaTurno as $ct) {
            foreach ($resrvasPrevias as $rp) {
                if ( $ct->id_cancha == $rp->id_cancha ){
                    if ( $ct->id_turno == $rp->id_turno ){
                        unset ($canchaTurno[$ct->id-1]);
                    }
                }
            }
        }
        
        /*recorro todas las canchas turno*/
		foreach ($canchaTurno as $ct) { /*se recorren todas las reseravas*/
            /*recorro turnos para sacar precio*/
			foreach ($turnos as $turno) {
				if( ($ct->id_turno == $turno->id))
				{
					$ct->hora = $turno->hora;
					if($turno->noche != 1)
					{
						foreach ($arrayCanchas as $cancha) {
							if($cancha->id == $ct->id_cancha)
							{
								$ct->precio = $cancha->precio_dia;
							}
						}
					}
					else{
						foreach ($arrayCanchas as $cancha) {
							if($cancha->id == $ct->id_cancha)
							{
								$ct->precio = $cancha->precio_noche;
							}
						}
					}
				}
			}
		}
		
		return view('reservaCancha', [
                    'reservas'=>$canchaTurno,
                    'canchas'=>$arrayCanchas,
                    'fechaFiltro' => $fechaFiltro,
                    'fechaMax' => $fechaMax,
                    'fechaMin' => $fechaMin
                ]);
    }

    public function indexFecha(Request $request)
    {   
        $fechaFiltro = $request->fecha_reserva;
        $hoy = date("Y-m-j");
        $fechaMin = date("Y-m-j",strtotime("$hoy -0 day") );
        $fechaMax = date ("Y-m-d",strtotime("$hoy +7 day") );


        //validar si es nulo cargarlo con new date.
        $reserasControlador = new ReservaController ();
        $resrvasPrevias = $reserasControlador->getAll()->where ('fecha', $fechaFiltro);
        //echo $resrvasPrevias;

        /* Levanta todas las canchas sin reserva - uso unico de informacion */
        $canchaTurno = CanchasTurno::all();//->where('reservada', 0);

        $turnos = Turno::all();
        
        $canchas = new CanchaController();
        /*filtro unicamente para listar canchas abiertas*/
        $arrayCanchas = $canchas->getAll()->where('id_estado_cancha', 1);
        foreach ($canchaTurno as $ct) {
            foreach ($resrvasPrevias as $rp) {
                if ( $ct->id_cancha == $rp->id_cancha ){
                    if ( $ct->id_turno == $rp->id_turno ){
                        unset ($canchaTurno[$ct->id-1]);
                        //echo ("'$ct->id') Cancha '$ct->id_cancha' en turno '$ct->id_turno' eliminada -- ");
                    }
                }
            }
        }
        
        /*recorro todas las canchas turno*/
        foreach ($canchaTurno as $ct) { /*se recorren todas las reseravas*/
            /*recorro turnos para sacar precio*/
            foreach ($turnos as $turno) {
                if( ($ct->id_turno == $turno->id))
                {
                    $ct->hora = $turno->hora;
                    if($turno->noche != 1)
                    {
                        foreach ($arrayCanchas as $cancha) {
                            if($cancha->id == $ct->id_cancha)
                            {
                                $ct->precio = $cancha->precio_dia;
                            }
                        }
                    }
                    else{
                        foreach ($arrayCanchas as $cancha) {
                            if($cancha->id == $ct->id_cancha)
                            {
                                $ct->precio = $cancha->precio_noche;
                            }
                        }
                    }
                }
            }
        }
        
        return view('reservaCancha', [
                    'reservas'=>$canchaTurno,
                    'canchas'=>$arrayCanchas,
                    'fechaFiltro' => $fechaFiltro,
                    'fechaMax' => $fechaMax,
                    'fechaMin' => $fechaMin
                ]);
        
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

?>