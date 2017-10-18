<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $reservas = Reserva::all();
         return view('reserva', array('reservas' => $reservas));
    }
	
	 public function form()
    {
		return view('reservaForm');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {		
	   $req->validate([
			'id_cancha' => 'required|exists:canchas,id',
			'id_usuario' => 'required|exists:usuario,id',
			'id_turno' => 'required|exists:turnos,id',
			'fecha' => 'required|date',
			'senia' => 'required|numeric|min:0',
			'codigo_reserva' => 'required'
		]);
		$reserva = new Reserva ();
		
		$reserva->id_cancha = $req->id_cancha;
		$reserva->id_usuario = $req->id_usuario;
		$reserva->id_turno = $req->id_turno;
		$reserva->fecha = $req->fecha;
		$reserva->senia = $req->senia;
		$reserva->codigo_reserva = $req->codigo_reserva;
		
        $reserva->save();
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reserva = Reserva::find($id);
        $cancha = $reserva->cancha;
        return view('canchas',[$cancha => $cancha]);
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
		$req->validate([
			'id_cancha' => 'required|exists:canchas,id',
			'id_usuario' => 'required|exists:usuario,id',
			'id_turno' => 'required|exists:turnos,id',
			'fecha' => 'required|date',
			'senia' => 'required|numeric|min:0',
			'codigo_reserva' => 'required'
		]);
		$reserva = new Reserva ();
		
		$reserva->id_cancha = $req->id_cancha;
		$reserva->id_usuario = $req->id_usuario;
		$reserva->id_turno = $req->id_turno;
		$reserva->fecha = $req->fecha;
		$reserva->senia = $req->senia;
		$reserva->codigo_reserva = $req->codigo_reserva;
		
        $reserva->where($id)->update();
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
