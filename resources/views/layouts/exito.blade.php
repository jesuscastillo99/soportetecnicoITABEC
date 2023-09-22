@extends('layouts.landinglogin')
@section('title', 'Exito')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <!-- Utiliza 'container' para centrar y 'd-flex' para establecer flexbox -->
  <div class="card text-center" style="width: 18rem;">
      <img src="{{ asset('assets/images/exito.png')}}" class="card-img-top" alt="img_exito">
      <div class="card-body">
          <h5 class="card-title">¡REGISTRO EXITOSO!</h5>
          <p class="card-text">Se ha generado una contraseña que te enviamos a través de tu correo electrónico.</p>
          <button class="fill rounded" type="button" onclick="window.location.href='{{ route('login') }}'">Inicia Sesión</button>
      </div>
  </div>
</div>
@endsection