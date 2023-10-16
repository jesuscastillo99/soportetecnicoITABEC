@extends('layouts.landingsinslider')
@section('title', 'form2')
@section('content')
<div class="section margin-top_50">
  <div class="container mb-2 bg-cremita pt-3 rounded">
    <form method="POST" action="{{ route('form2-post') }}">
      <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="titulo-form"><strong>Domicilio Familiar</strong><h2>
          </div>
        </div>
      <div class="row justify-content-center">
          <div class="col-md-4">
              <div class="form-group">
                <label for="calle">Calle:</label>
                <input type="text" class="form-control" id="calle" name="calle" maxlength="100">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="numero">Número:</label>
                <input type="text" class="form-control" id="numero" name="numero" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 10)">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="colonia">Colonia:</label>
                <input type="text" class="form-control" id="colonia" name="colonia" maxlength="100">
              </div>
            </div>
      </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="entre_calles">Entre calles:</label>
                <input type="text" class="form-control" id="entre_calles" name="entre_calles" maxlength="100">
                <p class="text-center">Y</p>
                <input type="text" class="form-control mt-1" id="entre_calles2" name="entre_calles2" maxlength="100">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="telefono_local">Telefono Local:</label>
                <input type="text" class="form-control mb-3" id="telefono_local" name="telefono_local" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                <label for="telefono_celular">Telefono Celular:</label>
                <input type="text" class="form-control" id="telefono_celular" name="telefono_celular" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="codigo_postal">Codigo Postal:</label>
                <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" value="{{ old('codigo_postal') }}" maxlength="5" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 5)">
              </div>
            </div>      
          </div>  
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="estado">Estado:</label>
                  <select class="form-control" id="estado" name="estado">
                    <option value="">Selecciona un estado</option>
                    @foreach($estados as $IdEstado => $NombreEstado)
                            <option value="{{ $IdEstado }}" {{ ($nombreEstado2 == $NombreEstado) ? 'selected' : '' }}>
                                {{ $NombreEstado }}
                            </option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="municipio">Municipio:</label>
                <select class="form-control" id="municipio" name="municipio">
                  <option value="">Selecciona un municipio</option>
                  <option value="{{ $nombreMunicipio ?: '' }}" selected>
                    {{ $nombreMunicipio ?: 'Selecciona un municipio' }}
                </option>
                </select>
                <script>
                  cargarMunicipios('estado', 'municipio');
                </script> 
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="localidad">Localidad:</label>
                <select class="form-control" id="localidad" name="localidad">
                    <option value="">Selecciona una localidad</option>
                    @isset($datosDomicilio1)
                        <option value="{{ $datosDomicilio1->idlocalidad }}" selected>{{ $nombreLocalidad }}</option>
                    @endisset
                </select>
                <script>
                  cargarLocalidades('municipio', 'localidad');
                </script> 
            </div>
            </div> 
          </div>
          <div class="row mt-4">
            <div class="col-md-12 text-right mb-3"> <!-- Botón derecho -->
              <button type="submit" class="boton btn-form">Guardar datos</button>
            </div>
          </div>
      </form>
    </div> 
</div>
<!-- end section 
  EMPIEZA SEGUNDO FORMULARIO
-->
<div class="section mt-3">
  <div class="container mb-2 bg-cremita pt-3 rounded">
    <form method="POST" action="{{ route('form2-post') }}">
      <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="titulo-form"><strong>Otro Domicilio</strong><h2>
          </div>
        </div>
      <div class="row justify-content-center">
          <div class="col-md-4">
              <div class="form-group">
                <label for="calle2">Calle:</label>
                <input type="text" class="form-control" id="calle2" name="calle2" maxlength="100">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="numero2">Número:</label>
                <input type="text" class="form-control" id="numero2" name="numero2" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 10)">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="colonia2">Colonia:</label>
                <input type="text" class="form-control" id="colonia2" name="colonia2" maxlength="100">
              </div>
            </div>
      </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="entre_calles2-1">Entre calles:</label>
                <input type="text" class="form-control" id="entre_calles2-1" name="entre_calles2-1" maxlength="100">
                <p class="text-center">Y</p>
                <input type="text" class="form-control mt-1" id="entre_calles2-2-1" name="entre_calles2-2-" maxlength="100">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="telefono_local">Telefono Local:</label>
                <input type="text" class="form-control mb-3" id="telefono_local" name="telefono_local" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                <label for="telefono_celular">Telefono Celular:</label>
                <input type="text" class="form-control" id="telefono_celular" name="telefono_celular" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="codigo_postal">Codigo Postal:</label>
                <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" value="{{ old('codigo_postal') }}" maxlength="5" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 5)">
              </div>
            </div>      
          </div>  
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="estado2">Estado:</label>
                  <select class="form-control" id="estado2" name="estado2">
                    <option value="">Selecciona un estado</option>
                    @foreach($estados as $IdEstado => $NombreEstado)
                    <option value="{{ $IdEstado }}" {{ ($nombreEstado2 == $NombreEstado) ? 'selected' : '' }}>
                        {{ $NombreEstado }}
                    </option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="municipio">Municipio:</label>
                <select class="form-control" id="municipio2" name="municipio2">
                  <option value="">Selecciona un municipio</option>
                  <option value="{{ $nombreMunicipio ?: '' }}" selected>
                    {{ $nombreMunicipio ?: 'Selecciona un municipio' }}
                </select>
                <script>
                  cargarMunicipios('estado2', 'municipio2');
                </script> 
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="localidad">Localidad:</label>
                  <select class="form-control" id="localidad2" name="localidad2">
                    <option value="">Selecciona una localidad</option>
                    @isset($datosDomicilio1)
                        <option value="{{ $datosDomicilio1->idlocalidad }}" selected>{{ $nombreLocalidad }}</option>
                    @endisset
                  </select>
                  <script>
                    cargarLocalidades('municipio2', 'localidad2');
                  </script> 
              </div>
            </div> 
          </div>
          <div class="row mt-4">
            <div class="col-md-12 text-right mb-3"> <!-- Botón derecho -->
              <button type="submit" class="boton btn-form">Guardar datos</button>
            </div>
          </div>
      </form>
    </div> 
</div>
<!-- end section 
  EMPIEZA TERCER FORMULARIO 
-->
<div class="section mt-3">
  <div class="container mb-2 bg-cremita pt-3 rounded">
    <form method="POST" action="{{ route('form2-post') }}">
      <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="titulo-form"><strong>Domicilio Familiar</strong><h2>
          </div>
        </div>
      <div class="row justify-content-center">
          <div class="col-md-4">
              <div class="form-group">
                <label for="calle">Calle:</label>
                <input type="text" class="form-control" id="calle" name="calle" maxlength="100">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="numero">Número:</label>
                <input type="text" class="form-control" id="numero" name="numero" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 10)">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="colonia">Colonia:</label>
                <input type="text" class="form-control" id="colonia" name="colonia" maxlength="100">
              </div>
            </div>
      </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="entre_calles">Entre calles:</label>
                <input type="text" class="form-control" id="entre_calles" name="entre_calles" maxlength="100">
                <p class="text-center">Y</p>
                <input type="text" class="form-control mt-1" id="entre_calles2" name="entre_calles2" maxlength="100">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="telefono_local">Telefono Local:</label>
                <input type="text" class="form-control mb-3" id="telefono_local" name="telefono_local" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                <label for="telefono_celular">Telefono Celular:</label>
                <input type="text" class="form-control" id="telefono_celular" name="telefono_celular" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="codigo_postal">Codigo Postal:</label>
                <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" value="{{ old('codigo_postal') }}" maxlength="5" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 5)">
              </div>
            </div>      
          </div>  
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="estado3">Estado:</label>
                  <select class="form-control" id="estado3" name="estado3">
                    <option value="">Selecciona un estado</option>
                    @foreach($estados as $IdEstado => $NombreEstado)
                    <option value="{{ $IdEstado }}" {{ ($nombreEstado2 == $NombreEstado) ? 'selected' : '' }}>
                        {{ $NombreEstado }}
                    </option>
                    @endforeach
                  </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="municipio3">Municipio:</label>
                <select class="form-control" id="municipio3" name="municipio3">
                  <option value="">Selecciona un municipio</option>
                  <option value="{{ $nombreMunicipio ?: '' }}" selected>
                    {{ $nombreMunicipio ?: 'Selecciona un municipio' }}
                </select>
                <script>
                  cargarMunicipios('estado3', 'municipio3');
                </script> 
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="localidad3">Localidad:</label>
                  <select class="form-control" id="localidad3" name="localidad3">
                    <option value="">Selecciona una localidad</option>
                    @isset($datosDomicilio1)
                        <option value="{{ $datosDomicilio1->idlocalidad }}" selected>{{ $nombreLocalidad }}</option>
                    @endisset
                  </select>
                  <script>
                    cargarLocalidades('municipio3', 'localidad3');
                  </script> 
              </div>
            </div> 
          </div>
          <div class="row mt-4">
            <div class="col-md-12 text-right mb-3"> <!-- Botón derecho -->
              <button type="submit" class="boton btn-form">Guardar datos</button>
            </div>
          </div>
      </form>
    </div> 
    <div class="row mt-4 pl-5 pr-5">
      <div class="col-md-6 text-left mb-3"> <!-- Botón izquierdo -->
        <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form1-formulario') }}'">Regresar</button>
      </div>
      <div class="col-md-6 text-right mb-3"> <!-- Botón derecho -->
        <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form2-formulario') }}'">Siguiente</button>
      </div>
</div>
<!-- end section -->
@endsection