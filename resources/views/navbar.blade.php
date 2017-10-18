<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
@include('metas')



<!-- BARRA DE NAVEGACION -->

<nav class="navbar_sin-margen" class="navbar navbar-inverse">
	<div class="container-fluid" >
	    <div class="navbar-header">
	    	 <a class="navbar-brand" href="#">ARGENTO FUTBOL</a>
	    </div>
	    <!-- BOTONES DE LA BARRA -->
	    <ul class="nav navbar-nav">
		    <li class="active"><a href="{{ route('home') }}">Home</a></li>
		    <!-- SI ES INVITADO -->
		    @if (Auth::check())
			    @if (Auth::user()->admin === '0')
			    <!-- SI ES USUARIO -->
			    <li><a href="/reservaCancha">Ver Canchas</a></li>
			    <li><a href="/reserva/{{Auth::user()->id}}">Mis Reservas</a></li>
			    <!-- SI ES ADMINISTRADOR -->
			    @else
			    <li><a href="/canchas/form">Agregar Cancha</a></li>
			    <li><a href="/canchas">Administrar Canchas</a></li>
			    <li ><a href="/reserva">Administrar Reservas</a></li>
			    @endif
		    @endif
		    @guest
				<!-- PARA TODO TIPO DE USUARIO MENOS ADMINISTRADOR -->
			    <li class="active"><a href="/contacto">Contactanos</a></li>
		    @endguest

	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	    @guest
	    	<li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	    	<li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"></span> Login</a></li>
	    @else

	    	<li><a>{{ Auth::user()->name }}</a></li>
	    	<a class="btn btn-danger navbar-btn" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
			<!--
			<button class="btn btn-danger navbar-btn">Log Out</button>
			-->
	    @endguest
	    </ul>
	</div>
</nav>
