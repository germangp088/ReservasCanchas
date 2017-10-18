@extends('layouts.app')

@section('footer')

<link href="{{ asset('css/footer.css') }}" rel="stylesheet">

<footer class="footer-distributed">

    <div class="footer-left">

        <div>
          <i class="fa fa-map-marker"></i>
          <p><span>Av. Corrientes 2028</span> Ciudad Autonoma de Buenos Aires</p>
        </div>

        <div>
          <i class="fa fa-phone"></i>
          <p>+5411 5032-0076</p>
        </div>

      </div>

      <div class="footer-center">

        <h3><span>Futbol</span>ARGENTO</h3>

        <div class="footer-icons">
          <img src="{{ asset ('images/Logo.jpeg') }}" style="width:25%;" style="height:25%;" class ="icons-navbar">
        </div>
      </div>
      

      <div class="footer-right">

        <p class="footer-company-about">
          <span>ArgentoFutbol Company &copy; 2017</span>
          Calidad Asegurada. Canchas Tipo 5, 7 y 11, en pasto natural y sintético y canchas cubiertas.
        </p>

      </div>

      <div class="row">

        <div class="col-sm-15">

          <ul class="mendi-social-networks">

            <li class="facebook">
            <a href="" title="">
              <i class="fa fa-facebook"> </i>
              <p>JOIN US ON FACEBOOK</p>
              <span class="followers">268K Followers</span>
            </a>
            </li>
            <li class="twitter">
              <a href="" title="">
                <i class="fa fa-twitter"> </i>
                <p>FOLLOW US ON TWITTER</p>
                <span class="followers">268K Followers</span>
              </a>
            </li>

            <li class="googleplus">
              <a href="" title="">
                <i class="fa fa-google-plus"> </i>
                <p>ADD TO OUR CIRCLE</p>
                <span class="followers">268K Followers</span>
              </a>
            </li>

            <li class="linkedin">
              <a href="" title="">
                <i class="fa fa-linkedin"> </i>
                <p>CONNECT TO OUR NETWORK</p>
                <span class="followers">268K Followers</span>
              </a>
            </li>

          </ul>

        </div>

      </div>

    </footer>

@endsection
