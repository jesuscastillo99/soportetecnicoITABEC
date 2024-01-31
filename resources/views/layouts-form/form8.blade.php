@extends('layouts.landingsinslider')
@section('title', 'Referencias')
@section('content')

<div class="section margin-top_50">

     {{-- PRIMER CONTAINER | REFERENCIA 1--}}
    <div class="container mb-4 bg-cremita pt-3 rounded">
      <form method="POST" action="{{ route('form8') }}">

        <div class="col-md-12 text-center">
                <h2 class="titulo-form"><strong>REFERENCIA 1</strong><h2>
              </div>
         {{-- PRIMER CONTAINER | REFERENCIA 1 | ROW 1 DEL FORMULARIO --}}
              <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="curp">CURP:</label>
                      <input type="text" class="form-control" id="curp" name="curp" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="fecha_nac">Fecha de Nacimiento:</label>
                      <input type="text" class="form-control" id="fecha_nac" name="fecha_nac" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="sexo">Sexo:</label>
                      <input type="text" class="form-control" id="sexo" name="sexo" readonly>
                    </div>
                  </div>
                </div>

            <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="apellido_pa">Apellido Paterno:</label>
                    <input type="text" class="form-control" id="apellido_pa" name="apellido_pa" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="apellido_ma">Apellido Materno:</label>
                    <input type="text" class="form-control" id="apellido_ma" name="apellido_ma" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" readonly>
                  </div>
                </div>
              </div>

              <h2 class="subtitulo-form">DOMICILIO</h2>
              <div class="row border-form">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="estado">Estado:</label>
                    <input type="text" class="form-control" id="estado" name="estado" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="municipio">Municipio:</label>
                    <input type="text" class="form-control" id="municipio" name="municipio" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="localidad">Localidad:</label>
                    <input type="text" class="form-control" id="localidad" name="localidad" readonly>
                  </div>
                </div>
              

               {{-- PRIMER CONTAINER | REFERENCIA 1 | ROW 4 DEL FORMULARIO --}}
               
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="calle_dom">Calle del Domicilio:</label>
                    <input type="text" class="form-control" id="calle_dom" name="calle_dom" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="numero_dom">Número del Domicilio:</label>
                    <input type="text" class="form-control" id="numero_dom" name="numero_dom" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="colonia_dom">Colonia del Domicilio:</label>
                    <input type="text" class="form-control" id="colonia_dom" name="colonia_dom" readonly>
                  </div>
                </div>
              

              {{-- PRIMER CONTAINER | REFERENCIA 1 | ROW 5 DEL FORMULARIO --}}
             
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="calles">Entre qué calles se encuentra:</label>
                    <input type="text" class="form-control" id="calles" name="calles" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="codigo_postal">Código Postal:</label>
                    <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="telefono">Télefono:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="celular">Celular:</label>
                      <input type="text" class="form-control" id="celular" name="celular" readonly>
                    </div>
                  </div>
              </div>

              {{-- PRIMER CONTAINER | REFERENCIA 1 | ROW 6 DEL FORMULARIO --}}
              <h2 class="subtitulo-form">LUGAR DONDE NACIÓ</h2>
            <div class="row border-form">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="estado_nac">Estado donde nació:</label>
                      <input type="text" class="form-control" id="estado_nac" name="estado_nac" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="municipio_nac">Municipio donde nació:</label>
                      <input type="text" class="form-control" id="municipio_nac" name="municipio_nac" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="localidad_nac">Localidad donde nació:</label>
                      <input type="text" class="form-control" id="localidad_nac" name="localidad_nac" readonly>
                    </div>
                  </div>
            </div>

            {{-- PRIMER CONTAINER | REFERENCIA 1 | ROW 7 DEL FORMULARIO --}}
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                      <label for="nota">Nota: El Domicilio debe ser del estado de tamaulipas y distinto al domicilio familiar del alumno.</label>
                    </div>
                  </div>
               <div class="col-md-4 text-right mb-3">
                <!-- Botón "Guardar" -->
                <button type="submit" class="boton btn-form">Guardar datos</button>
              </div>
            </div>
      </form>
    </div>

        {{-- SEGUNDO CONTAINER | REFERENCIA 2 --}}
    <div class="container mb-4 bg-cremita pt-3 rounded">
      <form method="POST" action="{{ route('form8') }}">
        <div class="col-md-12 text-center">
          <h2 class="titulo-form"><strong>REFERENCIA 2</strong><h2>
       </div>
            {{-- SEGUNDO CONTAINER | REFERENCIA 2 | ROW 8 DEL FORMULARIO --}}
           <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="curp">CURP:</label>
                      <input type="text" class="form-control" id="curp" name="curp" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="fecha_nac">Fecha de Nacimiento:</label>
                      <input type="text" class="form-control" id="fecha_nac" name="fecha_nac" readonly>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="sexo">Sexo:</label>
                      <input type="text" class="form-control" id="sexo" name="sexo" readonly>
                    </div>
                  </div>
           </div>

           {{-- SEGUNDO CONTAINER | REFERENCIA 2 | ROW 9 DEL FORMULARIO --}}
           <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="apellido_pa">Apellido Paterno:</label>
                <input type="text" class="form-control" id="apellido_pa" name="apellido_pa" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="apellido_ma">Apellido Materno:</label>
                <input type="text" class="form-control" id="apellido_ma" name="apellido_ma" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" readonly>
              </div>
            </div>
          </div>

          {{-- SEGUNDO CONTAINER | REFERENCIA 2 | ROW 10 DEL FORMULARIO --}}
          <h2 class="subtitulo-form">DOMICILIO</h2>
         <div class="row border">
            <div class="col-md-4">
              <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" class="form-control" id="estado" name="estado" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="municipio">Municipio:</label>
                <input type="text" class="form-control" id="municipio" name="municipio" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="localidad">Localidad:</label>
                <input type="text" class="form-control" id="localidad" name="localidad" readonly>
              </div>
            </div>
          

          {{-- SEGUNDO CONTAINER | REFERENCIA 2 | ROW 11 DEL FORMULARIO --}}
            <div class="col-md-4">
              <div class="form-group">
                <label for="calle_dom">Calle del Domicilio:</label>
                <input type="text" class="form-control" id="calle_dom" name="calle_dom" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="numero_dom">Número del Domicilio:</label>
                <input type="text" class="form-control" id="numero_dom" name="numero_dom" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="colonia_dom">Colonia del Domicilio:</label>
                <input type="text" class="form-control" id="colonia_dom" name="colonia_dom" readonly>
              </div>
            </div>
          

          {{-- SEGUNDO CONTAINER | REFERENCIA 2 | ROW 12 DEL FORMULARIO --}}
            <div class="col-md-4">
              <div class="form-group">
                <label for="calles">Entre qué calles se encuentra:</label>
                <input type="text" class="form-control" id="calles" name="calles" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="codigo_postal">Código Postal:</label>
                <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="telefono">Télefono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" readonly>
              </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="celular">Celular:</label>
                  <input type="text" class="form-control" id="celular" name="celular" readonly>
                </div>
              </div>
          </div>

          {{-- SEGUNDO CONTAINER | REFERENCIA 2 | ROW 13 DEL FORMULARIO --}}
          <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="titulo-form"><strong>Lugar donde nació</strong><h2>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="estado_nac">Estado donde nació:</label>
                  <input type="text" class="form-control" id="estado_nac" name="estado_nac" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="municipio_nac">Municipio donde nació:</label>
                  <input type="text" class="form-control" id="municipio_nac" name="municipio_nac" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="localidad_nac">Localidad donde nació:</label>
                  <input type="text" class="form-control" id="localidad_nac" name="localidad_nac" readonly>
                </div>
              </div>
        </div>

        {{-- SEGUNDO CONTAINER | REFERENCIA 2 | ROW 14 DEL FORMULARIO --}}
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                  <label for="nota">Nota: El Domicilio debe ser del estado de tamaulipas y distinto al domicilio familiar del alumno.</label>
                </div>
              </div>
           <div class="col-md-4 text-right mb-3">
            <!-- Botón "Guardar" -->
            <button type="submit" class="boton btn-form">Guardar datos</button>
          </div>
        </div>
      </form>
    </div>
    
</div>

<div class="row mt-4 pl-5 pr-5">
  <div class="col-md-6 text-left mb-3"> <!-- Botón izquierdo -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form7') }}'">Regresar</button>
  </div>
  <div class="col-md-6 text-right mb-3"> <!-- Botón derecho -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form9') }}'">Siguiente</button>
  </div>
</div> 

@endsection