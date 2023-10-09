@extends('layouts.landingsinslider')
@section('title', 'Formulario')
@section('content')

<div class="section margin-top_50">
    <div class="container mb-4 bg-cremita pt-3 rounded">
      <form method="POST" action="{{ route('form1-post') }}">
        <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="titulo-form"><strong>Datos Personales</strong><h2>
            </div>
          </div>
      
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="curp">CURP:</label>
                  <input type="text" class="form-control" id="curp" name="curp" value="{{ $datosPersona->curp }}" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="fecha_nac">Fecha de Nacimiento:</label>
                  <input type="text" class="form-control" id="fecha_nac" name="fecha_nac" value="{{ $datosPersona->fn }}" readonly>
                </div>
              </div>
              <div class="col-md-4">
                {{-- campo vacio --}}
              </div>
            </div>

          
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="apellido_pa">Apellido Paterno:</label>
                  <input type="text" class="form-control" id="apellido_pa" name="apellido_pa" value="{{ $datosPersona->paterno }}" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="apellido_ma">Apellido Materno:</label>
                  <input type="text" class="form-control" id="apellido_ma" name="apellido_ma" value="{{ $datosPersona->materno }}" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="nombre">Nombre:</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $datosPersona->nombre }}" readonly>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="sexo">Sexo:</label>
                      <select class="form-control" id="sexo" name="sexo">
                        <option value="3">Seleccione:</option>
                        <option value="1">Masculino</option>
                        <option value="0">Femenino</option>
                      </select>
                    </div>
                  </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="correo_elec">Correo Electrónico (Obligatorio):</label>
                  <input type="email" class="form-control" id="correo_elec" name="correo_elec">
                </div>
              </div>
              <div class="col-md-4">
               {{-- Campo vacio --}}
              </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="titulo-form"><strong>Lugar de Nacimiento</strong><h2>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="estado_nac">Estado donde nació:</label>
                      <select class="form-control" id="estado" name="estado">
                        <option value="">Selecciona un estado</option>
                        @foreach($estados as $IdEstado => $NombreEstado)
                            <option value="{{ $IdEstado }}">{{ $NombreEstado }}</option>
                        @endforeach
                    </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="municipio_nac">Municipio donde nació:</label>
                      <select class="form-control" id="municipio" name="municipio">
                        <option value="">Selecciona un municipio</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="localidad_nac">Localidad donde nació:</label>
                      <select class="form-control" id="localidad" name="localidad">
                        <option value="">Selecciona una localidad</option>
                      </select>
                    </div>
                  </div>
            </div>

              <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="estado_civil">Estado Civil:</label>
                      <select class="form-control" id="estado_civil" name="estado_civil">
                        <option value="seleccione">Seleccione:</option>
                        <option value="1">Soltero(a)</option>
                        <option value="0">Casado(a)</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="trabjas_p">¿Trabajas?</label>
                      <select class="form-control" id="trabajas_p" name="trabajas_p">
                        <option value="seleccione">Seleccione:</option>
                        <option value="1">Si</option>
                        <option value="0">No</option>
                      </select>
                    </div>
                  </div>
              </div>
      </form>
      <div class="row mt-4">
        <div class="col-md-6 text-left mb-3"> <!-- Botón izquierdo -->
          <button type="submit" class="boton btn-form" onclick="window.location.href='{{ route('form0') }}'">Regresar</button>
        </div>
        <div class="col-md-6 text-right mb-3"> <!-- Botón derecho -->
          <button type="submit" class="boton btn-form" onclick="window.location.href='{{ route('form2') }}'">Continuar</button>
        </div>
      </div>
    </div>
</div>

@endsection