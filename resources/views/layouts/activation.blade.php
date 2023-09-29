@extends('layouts.landinglogin')
@section('title', 'Exito')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <!-- Utiliza 'container' para centrar y 'd-flex' para establecer flexbox -->
  <div class="card text-center" style="width: 18rem;">
      <img src="{{ asset('assets/images/exito.png')}}" class="card-img-top" alt="img_exito">
      <p>Haga clic en el siguiente enlace para activar su cuenta:</p>
       <a href="{{ $activation_link }}">Activar cuenta</a>
  </div>
</div>
@endsection