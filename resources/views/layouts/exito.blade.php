@extends('layouts.landing')
@section('title', 'Inicio')
@section('content')
<h1>TE REGISTRASTE</h1>
<a href="{{ route('registro') }}">Regresar a inicio</a>
<section class="vh-100">
<div class="container py-5 h-100">
<div class="row d-flex align-items-center justify-content-center h-100">
  <div class="col-md-8 col-lg-7 col-xl-6 align-items-center justify-content-center">
    <img src="images/logo-itabec.png"
      class="img-fluid" alt="Phone image">
  </div>
</div>
</div>
</section>

@endsection