<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CanchaController;
use App\Http\Controllers\TurnosController;
use App\Reserva;
use App\CanchasTurno;
use App\TipoCancha;
use Cache;
use DateTime;
use DatePeriod;
use DateInterval;

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
        $fechaHoy = date("Y-m-j");
        $fechaMax = date("Y-m-j",strtotime("$fechaHoy +7 day") );

        /* Verifica la hora inical */
        if(!isset($request->horaDesde)){
            $hora_ini = '12';
        }else{
            $hora_ini = $request->horaDesde;
        }
        /* Verifica la hora final */
        if(!isset($request->horaHasta)){
            $hora_fin = intval('23');
        }else{
            $hora_fin = intval($request->horaHasta) ;
        }
        /* Verifica el d�a inicial */
        if(!isset($request->fechaDesde)){
            $fecha_ini = date('Y-m-d');
        }else{
            $fecha_ini = $request->fechaDesde;
        }
        /* Verifica el d�a final */
        if(!isset($request->fechaHasta)){
            $fecha_fin = $fechaMax;
        }else{
            $fecha_fin = $request->fechaHasta;
        }
        /* Verifica el tama�o de cancha */
        if (!isset($request->tipoCancha)) {
            $tipoCancha = 5;
        } else {
            $tipoCancha = $request->tipoCancha;
        }

        /* Obtiene datos de la base */
        $link = url("http://localhost:8000/Login/FutbolYa?id=");
        /*llamar a la funcion*/
        $reservas = $this->demoReservaNode($tipoCancha, $fecha_ini, $fecha_fin, $hora_ini, $hora_fin);

        foreach ($reservas as $name => $reserva) {
            $reserva ->Web = 'Argento Futbol';
            $reserva ->Link = stripslashes($link.$reserva->Link);
        }
        return $reservas; 
    }

    public function reservasNode(){
        $id = Cache::get('id'); 
        $reservas = DB::table('reservas')
                  ->join('canchas', 'cancha_id', '=', 'canchas.id')
                  ->select('reservas.*','canchas.nombre','canchas.precio_dia', 'canchas.precio_noche','canchas.tamanio')
                  ->where('reservas.id',$id)
                  //->orderBy('reservas.fecha','asc',',','reservas.horario','asc')
                  ->get();
        Cache::flush(); 
        return view('ReservaNode', array('reservas' => $reservas));
    }
    public function loginNode(Request $request){
      $id = $request->id;
      Cache::put('id',$id, 2000);
      
      return view('LoginNode');
    }

    public function demoReservaNode ($tamanio_cancha, $fecha_ini,$fecha_fin, $hora_ini, $hora_fin){
        /* generar array con rango de fechas */
        $arrayFechas = array();
        $countFechas = $fecha_ini;
        while ( $countFechas <= $fecha_fin )
        {
            $nuevaFecha = array('fecha' => $countFechas );
            array_push($arrayFechas, $nuevaFecha);
            $countFechas = date("Y-m-j",strtotime("$countFechas +1 day") );
        }
        $arrayFechas = json_encode($arrayFechas);
        //echo "<br>".$arrayFechas;
        
        /*levantar tama�o seg�n el tipo de cancha*/
        $tipoCanchas = DB::table ('tipo_canchas')->get();

        /*levanto reserva �nica*/
        foreach ($tipoCanchas as $element) {
            if ($element->tamanio == $tamanio_cancha) {
                $tipoDeCancha = array('id' => $element->id, 'tamanio'=>$element->tamanio, 'detalle'->$element->descripcion );
            }    
        }
        $tipoCanchas = json_encode($tipoDeCancha);
        //echo "<br>".$tipoCanchas;

        /*levantar todas las canchas que coincidan con el tipo_cancha*/
        $tipos = json_decode($tipoCanchas);
        $canchas = DB::table ('canchas')->where('id_tipo_cancha', $tipos->id)->get();
        //echo "<br>".$canchas;

        /*levantar todos los turnos dentro del limite de las horas*/
        $turnos = DB::table('turnos')->whereBetween('hora', [$hora_ini, $hora_fin])->get();
        //echo "<br>".$turnos;

        /*levantar todas las reservas dentro del limite de las fechas*/
        $reservas = DB::table('reservas')->get();
        //echo "<br>".$reservas;

        $arrayNode = array();
        $arrayParaFiltro = array();
        $fechas = json_decode($arrayFechas);
        /*formaci�n elemento para array retorno*/
        foreach ($fechas as $f) {
            foreach ($canchas as $c) {
                foreach ($turnos as $t) {
                    foreach ($reservas as $r) {
                        if ($f->fecha == $r->fecha and $c->id == $r->id_cancha and $t->id == $r->id_turno){
                            $archivoExistente = true;
                        } else {
                            $archivoExistente = false;
                        }
                    }
                    if ($archivoExistente == false) {
                        $elemntoNode = array(
                            'Web' => "Argento Futbol",
                            'Nombre' => $c->nombre,
                            'Tamanio' => $tipos->detalle,
                            'Latitud' => $c->latitud,
                            'Longitud' => $c->longitud,
                            'Precio_Dia' => $c->precio_dia,
                            'Precio_Noche' => $c->precio_noche,
                            'Fecha' => $f->fecha,
                            'Horario' => $t->hora,
                            'Link' => $c->id );
                        array_push($arrayNode, $elemntoNode);
                    }
                }
            }
        }
        $arrayNode = json_encode($arrayNode);
        echo "<br>".$arrayNode;
        return $arrayNode;
    }

}
