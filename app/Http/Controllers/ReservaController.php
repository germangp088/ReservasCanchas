<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CanchaController;
use App\Http\Controllers\TurnosController;
use App\Reserva;
use App\CanchasTurno;
use Cache;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(!\Auth::user()){
            return redirect()->action('HomeController@index');
        }

        if(\Auth::user()->admin){
         $reservas = Reserva::all();
         return view('reserva', array('reservas' => $reservas));
        }
        else{
            return redirect()->action('HomeController@index');
        }
    }
	
	 public function form()
    {
		return view('reservaForm');
    }

    public function getAll()
        {
            $reservas = Reserva::all();
            return $reservas;
        }

    public function getAllByDate($fecha)
        {
            $reservas = Reserva::all()->where ('fecha' == $fecha);
            return $reservas;
        }

    public function senia($id_cancha, $id_turno, $fecha)
    {        
        return view('seniaForm', [
                    'id_cancha'=>$id_cancha,
                    'id_turno'=>$id_turno,
                    'fecha' => $fecha,
                ]);

    }

    public function verCodigo()
    {
        return view('reservaCodigo');
    }

    public function canchas()
    {
        $canchas = new CanchaController();
        $turnos = new TurnosController();
        
        $arrayCanchas = $canchas->getAll()->where('id_estado_cancha', 1)->get();
        $arrayTurnos = $turnos->getAll();
        $canchasTurno = CanchasTurno::all();

        return view('reservaCancha', array ('canchas'=>$arrayCanchas), array('turnos' => $arrayTurnos),array ('canchasTurno'=>$canchasTurno));
        /*
        return view('reservaCancha', [
                    'canchas'=>$arrayCanchas,
                    'turnos'=>$arrayTurnos,
                    'CanchasTurnos' => $canchasTurno,
                ]);

        */
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
            'id_turno' => 'required|exists:turnos,id',
            'fecha' => 'required|date',
            'senia' => 'required|numeric|min:0'
        ]);
        
        echo "Id_turno->".$req->id_turno;   

		$reserva = new Reserva ();
		
		$reserva->id_cancha = $req->id_cancha;
		$reserva->id_user= \Auth::user()->id;
		$reserva->id_turno = $req->id_turno;
		$reserva->fecha = $req->fecha;//date("Y-m-d,");
		$reserva->senia = $req->senia;
		$reserva->codigo_reserva = rand ( 1000, 8000 );
		
        $reserva->save();
        /*
        CanchasTurno::where(['id_cancha' => $reserva->id_cancha, 'id_turno' => $reserva->id_turno])->update(['reservada' => 1]);
        */
        /* REDIRECCION A CODIGO DE RESERVA */
        return view('reservaCodigo',['codigo' => $reserva->codigo_reserva]);
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
    public function show()
    {        
        Cache::forget ('myValue');

        $id = \Auth::user()->id;
        $reservas = Reserva::with(['cancha', 'user', 'turno'])->where('id_user', $id)->get();
        return view('reservaUser',['reservas' => $reservas]);
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
		$rules = array(
			'id' => 'required|exists:reservas,id',
        );        
		
		$validatorArray = array(
			'id' => $id
			);
		
        $validator = Validator::make($validatorArray, $rules);

        if (!$validator->fails()) {
			$reserva = Reserva::all()->where('id', $id)->first();
            echo $reserva;
			CanchasTurno::where(['id_cancha' => $reserva->id_cancha, 'id_turno' => $reserva->id_turno])->update(['reservada' => 0]);
			$reserva->delete();
        }
        if(\Auth::user()->admin)
        {
            return redirect()->action('ReservaController@index');
        }
        else
        {
            return redirect()->action('ReservaController@show', array('id' => \Auth::user()->id));
        }

        
    }

    public function getReservasNode(Request $request)
    {
      if(!isset($request->horaDesde)){
         $hora_ini = '0';
      }else{
         $hora_ini = $request->horaDesde;
      }
      if(!isset($request->horaHasta)){
          $hora_fin = intval('23');
      }else{
          $hora_fin = intval($request->horaHasta) ;
      }
      if(!isset($request->fechaDesde)){
        $fecha_ini = date('Y-m-d');
      }else{
        $fecha_ini = $request->fechaDesde;
      }
      if(!isset($request->fechaHasta)){
         $fecha = Reserva::where('reservas.estado','Disponible')->first()->max('fecha');
         $fecha_fin = $fecha;
      }else{
         $fecha_fin = $request->fechaHasta;
      }
      if (isset($request->tipoCancha)){
                $tipo = $request->tipoCancha;
                $reservas = DB::table('reservas')
                      ->join('canchas', 'cancha_id', '=', 'canchas.id')
                      ->select( 'canchas.nombre as Nombre', 
                                'canchas.tamanio as Tamanio', 
                                'canchas.latitud as Latitud', 
                                'canchas.longitud as Longitud',
                                'canchas.precio_dia as Precio_Dia', 
                                'canchas.precio_noche as Precio_Noche',
                                'reservas.fecha as Fecha',
                                'reservas.horario as Horario',
                                'reservas.id as Link'                              
                        )
                      ->whereBetween('reservas.horario', [$hora_ini, $hora_fin])
                      ->whereBetween('reservas.fecha', [$fecha_ini, $fecha_fin])
                      ->where('reservas.estado','Disponible')
                      ->where('canchas.tamanio', 'cancha_'.$tipo)
                      ->orderBy('reservas.id')
                      ->get();
      }else{
                echo $hora_ini;
                echo $hora_fin;
                echo $fecha_ini;
                echo $fecha_fin;
                $reservas = DB::table('reservas')
                      ->join('canchas', 'cancha_id', '=', 'canchas.id')
                      ->select( 'canchas.nombre as Nombre', 
                                'canchas.tamanio as Tamanio', 
                                'canchas.latitud as Latitud', 
                                'canchas.longitud as Longitud',
                                'canchas.precio_dia as Precio_Dia', 
                                'canchas.precio_noche as Precio_Noche',
                                'reservas.fecha as Fecha',
                                'reservas.horario as Horario',
                                'reservas.id as Link'      
                        )
                      ->whereBetween('reservas.horario', [$hora_ini, $hora_fin])
                      ->whereBetween('reservas.fecha', [$fecha_ini, $fecha_fin])
                      ->where('reservas.estado','Disponible')
                      ->get();
      }
    return $reservas;
    }
}
