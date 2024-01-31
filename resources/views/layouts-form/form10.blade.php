@extends('layouts.landingsinslider')
@section('title', 'Mensajes')
@section('content')

<div class="section margin-top_50">

    <div class="container mb-4 bg-cremita pt-3 rounded">
      <form method="POST" action="{{ route('form10') }}">
        <div class="row">
            <label>Nota: El mensaje debe ser solo si tienes problemas con el sistema, cualquier otra duda envía un correo a --> itabec@tamaulipas.gob.mx</label>
        </div>
        <h2 class="subtitulo-form">INGRESA TU MENSAJE</h2>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <input type="text" class="form-control" id="mensaje" name="mensaje">
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
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form9') }}'">Regresar</button>
  </div>
  <div class="col-md-6 text-right mb-3"> <!-- Botón derecho -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form11') }}'">Siguiente</button>
  </div>
</div> 
@endsection