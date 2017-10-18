<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@include('navbar')



<section id="reserva" style="">

		<!-- CARRUSEL DE IMAGENES DE CANCHAS -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<div class="item active">
				<img src="{{ asset('images/carrusel/futbol1.jpg') }}" alt="Noticia1">
				<div class="carousel-caption">
					<h3>RESREVAS Y CONSULTAS</h3>
					<p>Reservas y consultas por teléfono y ahroa vía web</p>
				</div>
			</div>
			<div class="item">
				<img src="{{ asset('images/carrusel/futbol4.jpg') }}" alt="Noticia2">
				<div class="carousel-caption">
					<h3>PELOTAS Y CANCHAS</h3>
					<p>Pelotas oficiales de los mundiales y canchas techadas</p>
				</div>
			</div>
			<div class="item">
				<img src="{{ asset('images/carrusel/futbol6.jpg') }}" alt="Noticia3">
				<div class="carousel-caption">
					<h3>TORNEO FUTBOL 5</h3>
					<p>Torneo masculino y femenino para mayores de 18 años</p>
				</div>
			</div>
			<div class="item">
				<img src="{{ asset('images/carrusel/futbol3.jpg') }}" alt="Noticia4">
				<div class="carousel-caption">
					<h3>ESPACIO RENOVADO</h3>
					<p>Canchas de futbol 5,7 y 11 completamente restauradas</p>
				</div>
			</div>
		</div>

		<!-- Left and right controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

	<div>
	    <div class="about_our_company" style="margin-bottom: 20px;">
	        <h1 style="color:#fff;">ÚLTIMAS NOTICIAS</h1>
	        <div class="titleline-icon"></div>
	    </div>
	</div>

	<div class="container_noticias">
		<div class="row">
		    <div class="col-sm-6">
		    	<img src="{{ asset('images/home/canchita1.jpg') }}" width="550" height="400" class="img-rounded" alt="Cinque Terre">
		    	<h3 class="texto-blanco">Campeonato pepito</h3>
		    	<P class="texto-blanco">12 equipos participaron por la copa peptio</P>
		    </div>
		    <div class="col-sm-6">
		    	<img src="{{ asset('images/home/canchita2.jpg') }}" width="550" height="400" class="img-rounded" alt="Cinque Terre">
		    	<h3 class="texto-blanco">Renovaciones</h3>
		    	<P class="texto-blanco">Cancas totalmente renovadas</P>
		    </div>
		</div>
	</div>
</section>

@include('footer')
