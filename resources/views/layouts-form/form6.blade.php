@extends('layouts.landingsinslider')
@section('title', 'AVAL')
@section('content')

<div class="section margin-top_50">

    {{-- PRIMER CONTAINER | INFO GENERAL AVAL--}}
    <div class="container mb-4 bg-cremita pt-3 rounded">
      <form method="POST" action="{{ route('form6') }}">

      {{-- PRIMER CONTAINER | INFO GENERAL AVAL | ROW 1 DEL FORMULARIO --}}
       
            <div class="col-md-12 text-center">
                <h2 class="titulo-form"><strong>INFORMACIÓN GENERAL DEL AVAL</strong><h2>
              </div>
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
                  <label for="sexol">Sexo:</label>
                  <select class="form-control" id="sexo" name="sexo">
                    <option value="">Seleccione:</option>
                    <option value="1">Masculino</option>
                    <option value="0">Femenino</option>
                  </select>
                </div>
              </div>
        

        {{-- PRIMER CONTAINER | INFO GENERAL AVAL | ROW 2 DEL FORMULARIO --}}
        
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
          {{-- PRIMER CONTAINER | INFO GENERAL AVAL | ROW 3 DEL FORMULARIO --}}

          <h2 class="subtitulo-form">DOMICILIO</h2>
          <div class="row border-form">
            <div class="col-md-4">
              <div class="form-group">
                <label for="estado">Estado:</label>
                <select class="form-control" id="estado" name="estado">
                  <option value="seleccione">Seleccione:</option>
                  <option value="prueba1">Prueba1</option>
                  <option value="prueba2">Prueba2</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="municipio">Municipio:</label>
                <select class="form-control" id="municipio" name="municipio">
                  <option value="seleccione">Seleccione:</option>
                  <option value="prueba1">Prueba1</option>
                  <option value="prueba2">Prueba2</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="localidad">Localidad:</label>
                <select class="form-control" id="localidad" name="localidad">
                  <option value="seleccione">Seleccione:</option>
                  <option value="prueba1">Prueba1</option>
                  <option value="prueba2">Prueba2</option>
                </select>
              </div>
            </div>
          

          {{-- PRIMER CONTAINER | INFO GENERAL AVAL | ROW 4 DEL FORMULARIO --}}
          
            <div class="col-md-4">
                <div class="form-group">
                  <label for="calle">Calle:</label>
                  <input type="text" class="form-control" id="calle" name="calle">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="numero">Número:</label>
                  <input type="text" class="form-control" id="numero" name="numero">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="colonia">Colonia:</label>
                  <input type="text" class="form-control" id="colonia" name="colonia">
                </div>
            </div>
        

        {{-- PRIMER CONTAINER | INFO GENERAL AVAL | ROW 5 DEL FORMULARIO --}}
        
            <div class="col-md-4">
                <div class="form-group">
                  <label for="entre_calle1">Entre que calles se encuentra:</label>
                  <input type="text" class="form-control" id="entre_calle1" name="entre_calle1">
                  <label for="y">y</label>
                  <input type="text" class="form-control" id="entre_calle2" name="entre_calle2">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="cod_postal">Código Postal:</label>
                  <input type="text" class="form-control" id="cod_postal" name="cod_postal">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="telefono">Télefono:</label>
                  <input type="text" class="form-control" id="telefono" name="telefono">
                </div>
            </div>
        

        {{-- PRIMER CONTAINER | INFO GENERAL AVAL | ROW 6 DEL FORMULARIO --}}
        
            <div class="col-md-4">
                <div class="form-group">
                  <label for="celular">Celular:</label>
                  <input type="text" class="form-control" id="celular" name="celular">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="relacion_acred">Relación con el Acréditado:</label>
                  <select class="form-control" id="relacion_acred" name="relacion_acred">
                    <option value="">Seleccione:</option>
                    <option value="1">Padre</option>
                    <option value="2">Madre</option>
                    <option value="3">Familiar</option>
                    <option value="4">Otro</option>
                    <option value="5">Conyugue</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="casa_propia">Tiene Casa Propia:</label>
                  <select class="form-control" id="casa_propia" name="casa_propia">
                    <option value="1">Si</option>
                    <option value="0">No</option>
                  </select>
                </div>
              </div>
       

        {{-- PRIMER CONTAINER | INFO GENERAL AVAL | ROW 7 DEL FORMULARIO --}}
        
            <div class="col-md-4">
                <div class="form-group">
                  <label for="trabaja">¿Trabaja?</label>
                  <select class="form-control" id="trabaja" name="trabaja">
                    <option value="1">Si</option>
                    <option value="0">No</option>
                  </select>
                </div>
              </div>
        </div>
        
        {{-- PRIMER CONTAINER | INFO GENERAL AVAL | ROW 8 DEL FORMULARIO --}}
        <h2 class="subtitulo-form">LUGAR DONDE NACIÓ</h2>

        {{-- PRIMER CONTAINER | INFO GENERAL AVAL | ROW 9 DEL FORMULARIO --}}
        <div class="row border-form">
            <div class="col-md-4">
              <div class="form-group">
                <label for="estado_nac">Estado donde nació:</label>
                <select class="form-control" id="estado_nac" name="estado_nac">
                  <option value="seleccione">Seleccione:</option>
                  <option value="prueba1">Prueba1</option>
                  <option value="prueba2">Prueba2</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="municipio_nac">Municipio donde nació:</label>
                <select class="form-control" id="municipio_nac" name="municipio_nac">
                  <option value="seleccione">Seleccione:</option>
                  <option value="prueba1">Prueba1</option>
                  <option value="prueba2">Prueba2</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="localidad_nac">Localidad donde nació:</label>
                <select class="form-control" id="localidad_nac" name="localidad_nac">
                  <option value="seleccione">Seleccione:</option>
                  <option value="prueba1">Prueba1</option>
                  <option value="prueba2">Prueba2</option>
                </select>
              </div>
            </div>
          </div>

          {{-- PRIMER CONTAINER | INFO GENERAL AVAL | ROW 10 DEL FORMULARIO --}}
          <div class="row">
            <div class="col-md-12 text-right mb-3">
              <!-- Botón "Guardar" -->
              <button type="submit" class="boton btn-form">Guardar datos</button>
            </div>
          </div>
      </form>
    </div>

    {{-- SEGUNDO CONTAINER | TRABAJO AVAL --}}
    <div class="container mb-4 bg-cremita pt-3 rounded">
      <form method="POST" action="{{ route('form6') }}">
        <div class="col-md-12 text-center">
          <h2 class="titulo-form"><strong>TRABAJO DEL AVAL</strong><h2>
        </div>

      {{-- SEGUNDO CONTAINER | TRABAJO AVAL | ROW 11 DEL FORMULARIO --}}
              <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="nombre_org_trabajo">Nombre de la Organización donde Trabaja:</label>
                  <input type="text" class="form-control" id="nombre_org_trabajo" name="nombre_org_trabajo">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="cargo">Cargo que Desempeña:</label>
                  <input type="text" class="form-control" id="cargo" name="cargo">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="desc_actividad">Describa la Actividad que Desempeña:</label>
                  <input type="text" class="form-control" id="desc_actividad" name="desc_actividad">
                </div>
            </div>
        </div>

        {{-- SEGUNDO CONTAINER | TRABAJO AVAL | ROW 12 DEL FORMULARIO --}}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="ing_mensual">Ingreso Mensual:</label>
                  <input type="text" class="form-control" id="ing_mensual" name="ing_mensual">
                </div>
            </div>
        </div>

        <h2 class="subtitulo-form">DOMICILIO DEL TRABAJO</h2>

        {{-- SEGUNDO CONTAINER | TRABAJO AVAL | ROW 13 DEL FORMULARIO --}}
        <div class="row border-form">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="calle_trabajo">Calle:</label>
                  <input type="text" class="form-control" id="calle_trabajo" name="calle_trabajo">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="numero_trabajo">Número:</label>
                  <input type="text" class="form-control" id="numero_trabajo" name="numero_trabajo">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="colonia_trabajo">Colonia:</label>
                  <input type="text" class="form-control" id="colonia_trabajo" name="colonia_trabajo">
                </div>
            </div>
        

        {{-- SEGUNDO CONTAINER | TRABAJO AVAL | ROW 15 DEL FORMULARIO --}}
        
            <div class="col-md-4">
                <div class="form-group">
                  <label for="calle_trabajo">Entre que calles se encuentra:</label>
                  <input type="text" class="form-control" id="calle1_trabajo" name="calle1_trabajo">
                  <label for="y">y</label>
                  <input type="text" class="form-control" id="calle2_trabajo" name="calle2_trabajo">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="telefono_trabajo">Télefono Local:</label>
                  <input type="text" class="form-control" id="telefono_trabajo" name="telefono_trabajo">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="cod_postal_trabajo">Código Postal:</label>
                  <input type="text" class="form-control" id="cod_postal_trabajo" name="cod_postal_trabajo">
                </div>
            </div>
       

        {{-- SEGUNDO CONTAINER | TRABAJO AVAL | ROW 16 DEL FORMULARIO --}}
        
            <div class="col-md-4">
              <div class="form-group">
                <label for="estado_trabajo">Estado:</label>
                <select class="form-control" id="estado_trabajo" name="estado_trabajo">
                  <option value="seleccione">Seleccione:</option>
                  <option value="prueba1">Prueba1</option>
                  <option value="prueba2">Prueba2</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="municipio_trabajo">Municipio:</label>
                <select class="form-control" id="municipio_trabajo" name="municipio_trabajo">
                  <option value="seleccione">Seleccione:</option>
                  <option value="prueba1">Prueba1</option>
                  <option value="prueba2">Prueba2</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="localidad_trabajo">Localidad:</label>
                <select class="form-control" id="localidad_trabajo" name="localidad_trabajo">
                  <option value="seleccione">Seleccione:</option>
                  <option value="prueba1">Prueba1</option>
                  <option value="prueba2">Prueba2</option>
                </select>
              </div>
            </div>
          </div>

          {{-- SEGUNDO CONTAINER | TRABAJO AVAL | ROW 17 DEL FORMULARIO --}}
        <div class="row">
            <div class="col-md-12 text-right mb-3">
              <!-- Botón "Guardar" -->
              <button type="submit" class="boton btn-form">Guardar datos</button>
            </div>
          </div>
      </form>
    </div>
</div>

<div class="row mt-4 pl-5 pr-5">
  <div class="col-md-6 text-left mb-3"> <!-- Botón izquierdo -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form5-formulario') }}'">Regresar</button>
  </div>
  <div class="col-md-6 text-right mb-3"> <!-- Botón derecho -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form7') }}'">Siguiente</button>
  </div>
</div> 

@endsection