@extends('layouts.landingsinslider')
@section('title', 'Encuesta de Trabajo')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert')
<div class="section margin-top_50">

    <div class="container mb-4 bg-cremita pt-3 rounded" id="container_trabajo_estudiante">

      <form method="POST" action="{{ route('form9-post') }}">
        @csrf
        <div class="col-md-12 text-center">
            <h2 class="titulo-form"><strong>Trabajo del Estudiante</strong><h2>
        </div>
         <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="nomorgest">Nombre de la Organización:</label>
                  <input type="text" class="form-control uppercase-input" maxlength="50" id="nomorgest" name="nomorgest" value="{{ old('nomorgest', $nomorgest ?? '') }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="pueest">Puesto:</label>
                  <input type="text" class="form-control uppercase-input" maxlength="50" id="pueest" name="pueest" value="{{ old('pueest', $pueest ?? '') }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="sueest">Sueldo:</label>
                  <input type="text" class="form-control" id="sueest" maxlength="10" name="sueest" value="{{ old('sueest', $sueest ?? '') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)" required>
                </div>
              </div>
        </div>
        <h2 class="subtitulo-form"> Domicilio de la Organización </h2>
        <div class="row border-form" >
            <div class="col-md-4">
                <div class="form-group">
                  <label for="callest">Calle Principal:</label>
                  <input type="text" class="form-control uppercase-input" maxlength="50" id="callest" name="callest" value="{{ old('callest', $callest ?? '') }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="calle2est">Entre calles:</label>
                  <input type="text" class="form-control uppercase-input" maxlength="50" id="calle2est" name="calle2est" maxlength="100" value="{{ old('calle2est', $calle2est ?? '') }}" required>
                  <p class="text-center">Y</p>
                  <input type="text" class="form-control mt-1 uppercase-input" maxlength="50" id="calle3est" name="calle3est" maxlength="100" value="{{ old('calle3est', $calle3est ?? '') }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="numest">Número:</label>
                  <input type="text" class="form-control" id="numest" maxlength="20" name="numest" value="{{ old('numest', $numest ?? '') }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="colest">Colonia:</label>
                  <input type="text" class="form-control uppercase-input" maxlength="50" id="colest" name="colest" value="{{ old('colest', $colest ?? '') }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="paisest">País:</label>
                  <input type="text" class="form-control uppercase-input" maxlength="20" id="paisest" name="paisest" value="{{ old('paisest', $paisest ?? '') }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="estado">Estado:</label>
                  <select class="form-control" id="estado" name="estado" required>
                    <option value="">Selecciona un estado</option>
                    @foreach($estados as $IdEstado => $NombreEstado)
                            <option value="{{ $IdEstado }}" {{ ($nombreEstado == $NombreEstado) ? 'selected' : '' }}>
                                {{ $NombreEstado }}
                            </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="municipio">Municipio:</label>
                  <select class="form-control" id="municipio" name="municipio" required>
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
                  <select class="form-control" id="localidad" name="localidad" required>
                    <option value="">Selecciona una localidad</option>
                    @isset($idlocalidadest)
                    <option value="{{ $idlocalidadest }}" selected>{{ $nombreLocalidad }}</option>
                    @endisset
                  </select>
                <script>
                  cargarLocalidades('municipio', 'localidad');
                </script> 
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="telest">Teléfono Local:</label>
                  <input type="text" class="form-control" id="telest" maxlength="10" name="telest" value="{{ old('telest', $telest ?? '') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="cpest">Código Postal:</label>
                  <input type="text" class="form-control" id="cpest" maxlength="6" name="cpest" value="{{ old('cpest', $cpest ?? '') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)" required>
                </div>
              </div>
             
        </div>
        <div class="row">
          <div class="col-md-12 text-right mb-3">
            <!-- Botón "Guardar" -->
            <button type="submit" class="boton btn-form">Guardar datos</button>
          </div>
        </div>
      </form>
    </div>


    

    <div class="container mb-4 bg-cremita pt-3 rounded" id="container_trabajo_padre">

      <form method="POST" action="{{ route('form9-post2') }}">
        @csrf
        <div class="col-md-12 text-center">
            <h2 class="titulo-form"><strong>Trabajo del Padre</strong><h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="nomorgpa">Nombre de la Organización:</label>
                  <input type="text" class="form-control uppercase-input" maxlength="50" id="nomorgpa" name="nomorgpa" value="{{ old('nomorgpa', $nomorgpa ?? '') }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="puepa">Puesto:</label>
                  <input type="text" class="form-control uppercase-input" maxlength="50" id="puepa" name="puepa" value="{{ old('puepa', $puepa ?? '') }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="suepa">Sueldo:</label>
                  <input type="text" class="form-control" id="suepa" maxlength="10" name="suepa" value="{{ old('suepa', $suepa ?? '') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)" required>
                </div>
              </div>
        </div>
        <h2 class="subtitulo-form"> Domicilio de la Organización </h2>
        <div class="row border-form" >
            <div class="col-md-4">
                <div class="form-group">
                  <label for="callpa">Calle Principal:</label>
                  <input type="text" class="form-control uppercase-input" maxlength="50" id="callpa" name="callpa" value="{{ old('callpa', $callpa ?? '') }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="calle2pa">Entre calles:</label>
                  <input type="text" class="form-control uppercase-input" maxlength="50" id="calle2pa" name="calle2pa" maxlength="100" value="{{ old('calle2pa', $calle2pa ?? '') }}" required>
                  <p class="text-center">Y</p>
                  <input type="text" class="form-control mt-1 uppercase-input" maxlength="50" id="calle3pa" name="calle3pa" maxlength="100" value="{{ old('calle3pa', $calle3pa ?? '') }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="numpa">Número:</label>
                  <input type="text" class="form-control" id="numpa" maxlength="20" name="numpa" value="{{ old('numpa', $numpa ?? '') }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="colest">Colonia:</label>
                  <input type="text" class="form-control uppercase-input" maxlength="50" id="colpa" name="colpa" value="{{ old('colpa', $colpa ?? '') }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="paispa">País:</label>
                  <input type="text" class="form-control uppercase-input" maxlength="20" id="paispa" name="paispa" value="{{ old('paispa', $paispa ?? '') }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="estado2">Estado:</label>
                  <select class="form-control" id="estado2" name="estado2" required>
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
                  <label for="municipio2">Municipio:</label>
                  <select class="form-control" id="municipio2" name="municipio2" required>
                    <option value="">Selecciona un municipio</option>
                    <option value="{{ $nombreMunicipio2 ?: '' }}" selected>
                      {{ $nombreMunicipio2 ?: 'Selecciona un municipio' }}
                  </option>
                  </select>
                  <script>
                    cargarMunicipios('estado2', 'municipio2');
                  </script> 
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="localidad2">Localidad:</label>
                  <select class="form-control" id="localidad2" name="localidad2" required>
                    <option value="">Selecciona una localidad</option>
                    @isset($idlocalidadpadre)
                    <option value="{{ $idlocalidadpadre }}" selected>{{ $nombreLocalidad2 }}</option>
                    @endisset
                  </select>
                  <script>
                    cargarLocalidades('municipio2', 'localidad2');
                  </script> 
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="telpa">Teléfono Local:</label>
                  <input type="text" class="form-control" id="telpa" maxlength="10" name="telpa" value="{{ old('telpa', $telpa ?? '') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="cppa">Código Postal:</label>
                  <input type="text" class="form-control" id="cppa" maxlength="6" name="cppa" value="{{ old('cppa', $cppa ?? '') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)" required>
                </div>
              </div>
             
        </div>
        <div class="row">
          <div class="col-md-12 text-right mb-3">
            <!-- Botón "Guardar" -->
            <button type="submit" class="boton btn-form">Guardar datos</button>
          </div>
        </div>
      </form>
    </div>


    <div class="container mb-4 bg-cremita pt-3 rounded" id="container_trabajo_madre">

      <form method="POST" action="{{ route('form9-post3') }}">
        @csrf
        <div class="col-md-12 text-center">
            <h2 class="titulo-form"><strong>Trabajo de la Madre</strong><h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="nomorgma">Nombre de la Organización:</label>
                  <input type="text" class="form-control uppercase-input" maxlength="50" id="nomorgma" name="nomorgma" value="{{ old('nomorgma', $nomorgma ?? '') }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="puema">Puesto:</label>
                  <input type="text" class="form-control uppercase-input" maxlength="50" id="puema" name="puema" value="{{ old('puema', $puema ?? '') }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="suema">Sueldo:</label>
                  <input type="text" class="form-control" id="suema" maxlength="10" name="suema" value="{{ old('suema', $suema ?? '') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)" required>
                </div>
              </div>
        </div>
        <h2 class="subtitulo-form"> Domicilio de la Organización </h2>
        <div class="row border-form" >
            <div class="col-md-4">
                <div class="form-group">
                  <label for="callma">Calle Principal:</label>
                  <input type="text" class="form-control uppercase-input" maxlength="50" id="callma" name="callma" value="{{ old('callma', $callma ?? '') }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="calle2ma">Entre calles:</label>
                  <input type="text" class="form-control uppercase-input" maxlength="50" id="calle2ma" name="calle2ma" maxlength="100" value="{{ old('calle2ma', $calle2ma ?? '') }}" required>
                  <p class="text-center">Y</p>
                  <input type="text" class="form-control mt-1 uppercase-input" maxlength="50" id="calle3ma" name="calle3ma" maxlength="100" value="{{ old('calle3ma', $calle3ma ?? '') }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="numma">Número:</label>
                  <input type="text" class="form-control" id="numma" name="numma" maxlength="25" value="{{ old('numma', $numma ?? '') }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="colma">Colonia:</label>
                  <input type="text" class="form-control uppercase-input" id="colma" maxlength="50" name="colma" value="{{ old('colma', $colma ?? '') }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="paisma">País:</label>
                  <input type="text" class="form-control uppercase-input" maxlength="15" id="paisma" name="paisma" value="{{ old('paisma', $paisma ?? '') }}" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="estado3">Estado:</label>
                  <select class="form-control" id="estado3" name="estado3" required>
                    <option value="">Selecciona un estado</option>
                    @foreach($estados as $IdEstado => $NombreEstado)
                            <option value="{{ $IdEstado }}" {{ ($nombreEstado3 == $NombreEstado) ? 'selected' : '' }}>
                                {{ $NombreEstado }}
                            </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="municipio3">Municipio:</label>
                  <select class="form-control" id="municipio3" name="municipio3" required>
                    <option value="">Selecciona un municipio</option>
                    <option value="{{ $nombreMunicipio3 ?: '' }}" selected>
                      {{ $nombreMunicipio3 ?: 'Selecciona un municipio' }}
                  </option>
                  </select>
                  <script>
                    cargarMunicipios('estado3', 'municipio3');
                  </script> 
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="localidad3">Localidad:</label>
                  <select class="form-control" id="localidad3" name="localidad3" required>
                    <option value="">Selecciona una localidad</option>
                    @isset($idlocalidadmadre)
                    <option value="{{ $idlocalidadmadre }}" selected>{{ $nombreLocalidad3 }}</option>
                    @endisset
                  </select>
                <script>
                  cargarLocalidades('municipio3', 'localidad3');
                </script> 
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="telma">Teléfono Local:</label>
                  <input type="text" class="form-control" id="telma" maxlength="10" name="telma" value="{{ old('telma', $telma ?? '') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="cpma">Código Postal:</label>
                  <input type="text" class="form-control" id="cpma" maxlength="6" name="cpma" value="{{ old('cpma', $cpma ?? '') }}" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)" required>
                </div>
              </div>
             
        </div>
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
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form8-formulario') }}'">Regresar</button>
  </div>
  <div class="col-md-6 text-right mb-3"> <!-- Botón derecho -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form10-formulario') }}'">Siguiente</button>
  </div>
</div> 
<script src="{{ asset('assets/js/eventosForm3.js')}}"></script>
<script>
  document.querySelectorAll('.uppercase-input').forEach(function(input) {
      input.addEventListener('input', function() {
          this.value = this.value.toUpperCase();
      });
  });
</script>

<script>
  vartienepapa= {{$vivecon ?? null}}
  console.log(vartienepapa);
  tieneTrabajo(vartienepapa);
</script>

@endsection