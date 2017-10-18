@extends('layouts.app')

@section('content')

@include ('navbar')

<link rel="stylesheet" href="{{ asset('css/reservar.css') }}">  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<section id="reserva" style="">

<div class="container">
	<div>
        <div class="titulo" style="margin-bottom: 20px;">
            <h1 style="color:#fff;">RESERVA DE CANCHAS</h1>
            <div class="titleline-icon"></div>
        </div>
    </div>

  <div class="panel-group" id="accordion">

  	@foreach ($canchas as $cancha)

	    <div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
				  	<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $cancha->id }}">{{ $cancha->first()->tipoCancha()->first()->id }}</a>
				</h4>
			</div>

    		<div id="collapse{{ $cancha->id }}" class="panel-collapse collapse in">
        		<div class="panel-body">
				
        			<table class="table">
			            <thead>
			              <tr>
			                <th style="color:black;">Turno</th>
			                <th style="color:black;">Precio</th>
			                <th style="color:black;">HACER RESERVA</th>
			              </tr>
			            </thead>
			            <tbody>
			                @foreach($turnos as $turno)
			                    <tr class="success">
			                        <td>{{ $turno->hora }}</td>
			                        @if ($turno->noche != 1)
			                        	<td>{{ $cancha->precio_dia }}</td>
			                        @else
			                        	<td>{{ $cancha->precio_noche }}</td>
			                        @endif
			                        <td> <a href="">ELIMINAR</a> </td>
			                    </tr>
					        @endforeach
					      </tbody>
			        </table>

				</div>
			</div>
		</div>

	@endforeach
    <!--
	<div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">

        	<table class="table">
			    <thead>
			      <tr>
			        <th>Turno</th>
			        <th>Hora</th>
			        <th>Precio</th>
			        <th>Estado</th>
			        <th>RESERSVAR</th>
			      </tr>
			    </thead>
			    <tbody> 
			      <tr class="success">
			        <td>Dia</td>
			        <td>16:00</td>
			        <td>1000</td>
			        <td>Libre</td>
			        <td> <a href="">RESERSVAR</a> </td>
			      </tr>
			      <tr class="danger">
			        <td>Dia</td>
			        <td>17:00</td>
			        <td>1000</td>
			        <td>Reservada</td>
			        <td></td>
			      </tr>
			      <tr class="success">
			        <td>Dia</td>
			        <td>18:00</td>
			        <td>1000</td>
			        <td>Libre</td>
			        <td> <a href="">RESERSVAR</a> </td>
			      </tr>
			      <tr class="active">
			        <td>Nohe</td>
			        <td>19:00</td>
			        <td>1200</td>
			        <td>Cerrada</td>
			        <td></td>
			      </tr>
			    </tbody>
			  </table>

        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Cancha 2 - Futbol 7</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
        	
			<table class="table">
			    <thead>
			      <tr>
			        <th>Turno</th>
			        <th>Hora</th>
			        <th>Precio</th>
			        <th>Estado</th>
			        <th>RESERSVAR</th>
			      </tr>
			    </thead>
			    <tbody> 
			      <tr class="success">
			        <td>Dia</td>
			        <td>16:00</td>
			        <td>1000</td>
			        <td>Libre</td>
			        <td> <a href="">RESERSVAR</a> </td>
			      </tr>
			      <tr class="danger">
			        <td>Dia</td>
			        <td>17:00</td>
			        <td>1000</td>
			        <td>Reservada</td>
			        <td></td>
			      </tr>
			      <tr class="success">
			        <td>Dia</td>
			        <td>18:00</td>
			        <td>1000</td>
			        <td>Libre</td>
			        <td> <a href="">RESERSVAR</a> </td>
			      </tr>
			      <tr class="active">
			        <td>Nohe</td>
			        <td>19:00</td>
			        <td>1200</td>
			        <td>Cerrada</td>
			        <td></td>
			      </tr>
			    </tbody>
			  </table>

        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Cancha 3 - Futbol 5</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">

        	<table class="table">
			    <thead>
			      <tr>
			        <th>Turno</th>
			        <th>Hora</th>
			        <th>Precio</th>
			        <th>Estado</th>
			        <th>RESERSVAR</th>
			      </tr>
			    </thead>
			    <tbody> 
			      <tr class="success">
			        <td>Dia</td>
			        <td>16:00</td>
			        <td>1000</td>
			        <td>Libre</td>
			        <td> <a href="">RESERSVAR</a> </td>
			      </tr>
			      <tr class="danger">
			        <td>Dia</td>
			        <td>17:00</td>
			        <td>1000</td>
			        <td>Reservada</td>
			        <td></td>
			      </tr>
			      <tr class="success">
			        <td>Dia</td>
			        <td>18:00</td>
			        <td>1000</td>
			        <td>Libre</td>
			        <td> <a href="">RESERSVAR</a> </td>
			      </tr>
			      <tr class="active">
			        <td>Nohe</td>
			        <td>19:00</td>
			        <td>1200</td>
			        <td>Cerrada</td>
			        <td></td>
			      </tr>
			    </tbody>
			  </table>

        </div>
      </div>
    </div>
  </div> 
  -->
</div>

</section>

{{ $canchas }}

{{ $turnos }}

@include ('footer')

@endsection