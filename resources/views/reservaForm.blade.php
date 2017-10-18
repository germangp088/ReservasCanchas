<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    </head>
    <body>
        <h1>Canchas</h1>
		<form method="post" action="/reserva">
			{{ csrf_field() }}
			<input type="hidden" name="id_cancha" id="id_cancha" value="1"/>
			<input type="hidden" name="id_usuario" id="id_usuario" value="1"/>
			<input type="hidden" name="id_turno" id="id_turno" value="1"/>
			<input type="text" name="fecha" id="fecha" value="2017-08-10"/>
			<input type="text" name="senia" id="senia" value="100"/>
			<input type="text" name="codigo_reserva" id="codigo_reserva" value="1000"/>
			<input type="submit">
		</form>
    </body>
</html>
