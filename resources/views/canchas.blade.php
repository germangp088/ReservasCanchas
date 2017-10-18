@extends('layouts.app')

@section('content')

@include ('navbar')

<link rel="stylesheet" href="{{ asset('css/reservar.css') }}">  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

<section id="reserva" style="">

    <div class="container">
        <div>
            <div class="titulo" style="margin-bottom: 20px;">
                <h1 style="color:#fff;">ADMINISTRACIÓN DE CANCHAS</h1>
                <div class="titleline-icon"></div>
                
            </div>
        </div>

        <table class="table">
            <thead>
              <tr">
                <th style="color:#fff;">Cancha</th>
                <th style="color:#fff;">Precio Día</th>
                <th style="color:#fff;">Precio Noche</th>
                <th style="color:#fff;">Estado</th>
                <th style="color:#fff;">MODIFICAR</th>
              </tr>
            </thead>
            <tbody>
                @foreach($canchas as $cancha)
                    @if ($cancha->estado()->first()->descripcion == "Cerrada")
                    <tr class="danger">
                    @else
                    <tr class="success">
                    @endif
                        <td>{{ $cancha->tipoCancha()->first()->descripcion }}</td>
                        <td>{{ $cancha->precio_dia }}</td>
                        <td>{{ $cancha->precio_noche }}</td>
                        <td>{{ $cancha->estado()->first()->descripcion }}</td>
						
                        <td> 
							@if ($cancha->estado()->first()->id != 2)
								<form method="POST" action="/estado">
									{{ csrf_field() }}
									<input type="hidden" name="id" id="id" value="{{ $cancha->id }}" />
									@if ($cancha->estado()->first()->id == 3)
										<input type="hidden" name="idEstado" id="idEstado" value="1" />
									@else
										<input type="hidden" name="idEstado" id="idEstado" value="3" />
									@endif
									<input type="submit" value="CERRAR" />
								</form>
							@else
								&nbsp;
							@endif
						</td>
						
                    </tr>
		        @endforeach
		      </tbody>
        </table>
    </div>

</section>

@include ('footer')

@endsection