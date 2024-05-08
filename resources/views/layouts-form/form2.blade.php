@extends('layouts.landingsinslider')
@section('title', 'form2')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="section margin-top_50">
  
  <div class="container mb-2 bg-cremita pt-3 rounded">
    <form method="POST" action="{{ route('form2-post') }}" autocomplete="off">
      @csrf
      <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="titulo-form"><strong>Domicilio Familiar</strong><h2>
          </div>
        </div>
      <div class="row justify-content-center">
          <div class="col-md-4">
              <div class="form-group">
                <label for="calle">Calle:</label>
                <input type="text" class="form-control uppercase-input" id="calle" name="calle" maxlength="100" value="{{ old('calle', $datosDomicilio1->calle ?? '') }}">
                @error('calle')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="numero">Número:</label>
                <input type="text" class="form-control uppercase-input" id="numero" name="numero" maxlength="50" value="{{ old('numero', $datosDomicilio1->numero ?? '') }}">
                @error('numero')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="colonia">Colonia:</label>
                <input type="text" class="form-control uppercase-input" id="colonia" name="colonia" maxlength="100" value="{{ old('colonia', $datosDomicilio1->colonia ?? '') }}">
                @error('colonia')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
      </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="entre_calles">Entre calles:</label>
                <input type="text" class="form-control uppercase-input" id="entre_calles" name="entre_calles" maxlength="100" value="{{ old('entre_calles', $datosDomicilio1->calle2 ?? '') }}">
                @error('entre_calles')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                <p class="text-center">Y</p>
                <input type="text" class="form-control uppercase-input mt-1" id="entre_calles2" name="entre_calles2" maxlength="100" value="{{ old('entre_calles2', $datosDomicilio1->calle3 ?? '') }}">
                @error('entre_calles2')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="telefono_local">Telefono Local:</label>
                <input type="text" class="form-control uppercase-input mb-3" id="telefono_local" name="telefono_local" maxlength="10" value="{{ old('telefono_local', $datosDomicilio1->telefono ?? '') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                @error('telefono_local')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="telefono_celular">Telefono Celular:</label>
                <input type="text" class="form-control uppercase-input" id="telefono_celular" name="telefono_celular" maxlength="10" value="{{ old('telefono_celular', $datosDomicilio1->celular ?? '') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                @error('telefono_celular')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="codigo_postal">Codigo Postal:</label>
                <input type="text" class="form-control uppercase-input" id="codigo_postal" name="codigo_postal" value="{{ old('codigo_postal', $datosDomicilio1->cp ?? '') }}" maxlength="5" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 5)">
                @error('codigo_postal')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
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
                  @error('estado')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
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
                @error('municipio')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
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
                @error('localidad')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                <script>
                  cargarLocalidades('municipio', 'localidad');
                </script> 
                 
             @if (session('error'))
             <div class="alert alert-error">
                 {{ session('error') }}
             </div>
         @endif
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
    <form method="POST" action="{{ route('form2-post2') }}">
      @csrf
      <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="titulo-form"><strong>Otro Domicilio</strong><h2>
          </div>
        </div>
      <div class="row justify-content-center">
          <div class="col-md-4">
              <div class="form-group">
                <label for="calle2">Calle:</label>
                <input type="text" class="form-control uppercase-input" id="calle2" name="calle2" maxlength="100" value="{{ old('calle2', $datosDomicilio2->calle ?? '') }}">
                @error('calle2')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="numero2">Número:</label>
                <input type="text" class="form-control uppercase-input" id="numero2" name="numero2" maxlength="50" value="{{ old('numero2', $datosDomicilio2->numero ?? '') }}">
                @error('numero2')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="colonia2">Colonia:</label>
                <input type="text" class="form-control uppercase-input" id="colonia2" name="colonia2" maxlength="100" value="{{ old('colonia2', $datosDomicilio2->colonia ?? '') }}">
                @error('colonia2')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
      </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="entre_calles3">Entre calles:</label>
                <input type="text" class="form-control uppercase-input" id="entre_calles3" name="entre_calles3" maxlength="100" value="{{ old('entre_calles3', $datosDomicilio2->calle2 ?? '') }}">
                @error('entre_calles3')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                <p class="text-center">Y</p>
                <input type="text" class="form-control uppercase-input mt-1" id="entre_calles4" name="entre_calles4" maxlength="100" value="{{ old('entre_calles4', $datosDomicilio2->calle3 ?? '') }}">
                @error('entre_calles4')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="telefono_local2">Telefono Local:</label>
                <input type="text" class="form-control mb-3" id="telefono_local2" name="telefono_local2" value="{{ old('telefono_local2', $datosDomicilio2->telefono ?? '') }}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                @error('telefono_local2')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="telefono_celular2">Telefono Celular:</label>
                <input type="text" class="form-control" id="telefono_celular2" name="telefono_celular2" value="{{ old('telefono_celular2', $datosDomicilio2->celular ?? '') }}" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                @error('telefono_celular2')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="codigo_postal2">Codigo Postal:</label>
                <input type="text" class="form-control" id="codigo_postal2" name="codigo_postal2" value="{{ old('codigo_postal2', $datosDomicilio2->cp ?? '') }}" maxlength="5" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 5)">
                @error('codigo_postal2')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
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
                    <option value="{{ $IdEstado }}" {{ ($nombreEstado22 == $NombreEstado) ? 'selected' : '' }}>
                        {{ $NombreEstado }}
                    </option>
                    @endforeach
                  </select>
                  @error('estado2')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="municipio2">Municipio:</label>
                <select class="form-control" id="municipio2" name="municipio2">
                  <option value="">Selecciona un municipio</option>
                  <option value="{{ $nombreMunicipio2 ?: '' }}" selected>
                    {{ $nombreMunicipio2 ?: 'Selecciona un municipio' }}
                </select>
                  @error('municipio2')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                <script>
                  cargarMunicipios('estado2', 'municipio2');
                </script> 
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="localidad2">Localidad:</label>
                  <select class="form-control" id="localidad2" name="localidad2">
                    <option value="">Selecciona una localidad</option>
                    @isset($datosDomicilio2)
                        <option value="{{ $datosDomicilio2->idlocalidad }}" selected>{{ $nombreLocalidad2 }}</option>
                    @endisset
                  </select>
                  @error('localidad2')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <script>
                    cargarLocalidades('municipio2', 'localidad2');
                  </script> 
                  
                  @if (session('error2'))
                    <div class="alert alert-error">
                        {{ session('error2') }}
                    </div>
                  @endif
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
    <form method="POST" action="{{ route('form2-post3') }}">
      @csrf
      <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="titulo-form"><strong>Domicilio Foráneo (si vive en otra ciudad)</strong><h2>
          </div>
        </div>
      <div class="row justify-content-center">
          <div class="col-md-4">
              <div class="form-group">
                <label for="calle3">Calle:</label>
                <input type="text" class="form-control uppercase-input" id="calle3" name="calle3" maxlength="100" value="{{ old('calle3', $datosDomicilio3->calle ?? '') }}">
                @error('calle3')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="numero3">Número:</label>
                <input type="text" class="form-control uppercase-input" id="numero3" name="numero3" maxlength="50" value="{{ old('numero3', $datosDomicilio3->numero ?? '') }}">
                @error('numero3')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="colonia3">Colonia:</label>
                <input type="text" class="form-control uppercase-input" id="colonia3" name="colonia3" maxlength="100" value="{{ old('colonia3', $datosDomicilio3->colonia ?? '') }}">
                @error('colonia3')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
      </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="entre_calles5">Entre calles:</label>
                <input type="text" class="form-control uppercase-input" id="entre_calles5" name="entre_calles5" maxlength="100" value="{{ old('entre_calles5', $datosDomicilio3->calle2 ?? '') }}">
                @error('entre_calles5')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                <p class="text-center">Y</p>
                <input type="text" class="form-control uppercase-input mt-1" id="entre_calles6" name="entre_calles6" maxlength="100" value="{{ old('entre_calles6', $datosDomicilio3->calle3 ?? '') }}">
                @error('entre_calles6')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="telefono_local3">Telefono Local:</label>
                <input type="text" class="form-control mb-3" id="telefono_local3" name="telefono_local3" maxlength="10" value="{{ old('telefono_local3', $datosDomicilio3->telefono ?? '') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                @error('telefono_local3')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="telefono_celular">Telefono Celular:</label>
                <input type="text" class="form-control" id="telefono_celular3" name="telefono_celular3" maxlength="10" value="{{ old('telefono_celular3', $datosDomicilio3->celular ?? '') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                @error('telefono_celular3')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="codigo_postal3">Codigo Postal:</label>
                <input type="text" class="form-control" id="codigo_postal3" name="codigo_postal3" value="{{ old('codigo_postal3', $datosDomicilio3->cp ?? '') }}" maxlength="5" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 5)">
                @error('codigo_postal3')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
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
                    <option value="{{ $IdEstado }}" {{ ($nombreEstado23 == $NombreEstado) ? 'selected' : '' }}>
                        {{ $NombreEstado }}
                    </option>
                    @endforeach
                  </select>
                  @error('estado3')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="municipio3">Municipio:</label>
                <select class="form-control" id="municipio3" name="municipio3">
                  <option value="">Selecciona un municipio</option>
                  <option value="{{ $nombreMunicipio3 ?: '' }}" selected>
                    {{ $nombreMunicipio3 ?: 'Selecciona un municipio' }}
                </select>
                @error('municipio3')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
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
                    @isset($datosDomicilio3)
                        <option value="{{ $datosDomicilio3->idlocalidad }}" selected>{{ $nombreLocalidad3 }}</option>
                    @endisset
                  </select>
                  @error('localidad3')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <script>
                    cargarLocalidades('municipio3', 'localidad3');
                  </script>
                 
                  @if (session('error3'))
                    <div class="alert alert-error">
                        {{ session('error3') }}
                    </div>
                  @endif 
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
        <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form3-formulario') }}'">Siguiente</button>
      </div>
</div>
<script>
  document.querySelectorAll('.uppercase-input').forEach(function(input) {
      input.addEventListener('input', function() {
          this.value = this.value.toUpperCase();
      });
  });
</script>



@include('sweetalert::alert')


<!-- end section -->
@endsection