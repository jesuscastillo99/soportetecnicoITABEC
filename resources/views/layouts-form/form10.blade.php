@extends('layouts.landingsinslider')
@section('title', 'Mensajes')
@section('content')

<div class="section margin-top_50">

  <div class="container mb-4 bg-cremita pt-3 rounded">
    <form method="POST" action="{{ route('form10-post') }}">
      <div class="row">
        <div class="col-md-12 text-center">
          <label>Nota: El mensaje debe ser solo si tienes problemas con el sistema, cualquier otra duda envía un correo a --> itabec@tamaulipas.gob.mx</label>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="subtitulo-form">INGRESA TU MENSAJE</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="form-group">
            <textarea id="mensaje" name="mensaje" rows="5" class="form-control"></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-right mb-3">
          <!-- Botón "Guardar" -->
          <button type="submit" class="boton btn-form btn-left">Enviar</button>
        </div>
      </div>
    </form>
  </div>
  
</div>
<div class="row mt-4 pl-5 pr-5">
  <div class="col-md-6 text-left mb-3"> <!-- Botón izquierdo -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form9-formulario') }}'">Regresar</button>
  </div>
  <div class="col-md-6 text-right mb-3"> <!-- Botón derecho -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form11') }}'">Siguiente</button>
  </div>
</div> 
@endsection