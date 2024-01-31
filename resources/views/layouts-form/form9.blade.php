@extends('layouts.landingsinslider')
@section('title', 'Encuesta de Trabajo')
@section('content')

<div class="section margin-top_50">


    <div class="container mb-4 bg-cremita pt-3 rounded" id="container_trabajo_estudiante">

      <form method="POST" action="{{ route('form9') }}">
        <div class="col-md-12 text-center">
            <h2 class="titulo-form"><strong>Trabajo del Estudiante</strong><h2>
        </div>
         <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="nom_org_estudiante">Nombre de la Organización:</label>
                  <input type="text" class="form-control" id="nom_org_estudiante" name="nom_org_estudiante">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="puesto_estudiante">Puesto:</label>
                  <input type="text" class="form-control" id="puesto_estudiante" name="puesto_estudiante">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="sueldo_estudiante">Sueldo:</label>
                  <input type="text" class="form-control" id="sueldo_estudiante" name="sueldo_estudiante">
                </div>
              </div>
        </div>
        <h2 class="subtitulo-form"> Domicilio de la Organización </h2>
        <div class="row border-form" >
            <div class="col-md-4">
                <div class="form-group">
                  <label for="calle_p_estudiante">Calle Principal:</label>
                  <input type="text" class="form-control" id="calle_p_estudiante" name="callep_cestudiante">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="calles_estudiante">Entre Calles:</label>
                  <input type="text" class="form-control" id="calles_estudiante" name="calles_estudiante">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="numero_estudiante">Número:</label>
                  <input type="text" class="form-control" id="numero_estudiante" name="numero_estudiante">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="colonia_estudiante">Colonia:</label>
                  <input type="text" class="form-control" id="colonia_estudiante" name="colonia_estudiante">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="pais_estudiante">País:</label>
                  <input type="text" class="form-control" id="pais_estudiante" name="pais_estudiante">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="estado_estudiante">Estado:</label>
                  <input type="text" class="form-control" id="estado_estudiante" name="estado_estudiante">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="municipio_estudiante">Municipio:</label>
                  <input type="text" class="form-control" id="municipio_estudiante" name="municipio_estudiante">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="localidad_estudiante">Localidad:</label>
                  <input type="text" class="form-control" id="localidad_estudiante" name="localidad_estudiante">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="telefono_estudiante">Teléfono Local:</label>
                  <input type="text" class="form-control" id="telefono_estudiante" name="telefono_estudiante">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="codigoP_estudiante">Código Postal:</label>
                  <input type="text" class="form-control" id="codigoP_estudiante" name="codigoP_estudiante">
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


    <div class="container mb-4 bg-cremita pt-3 rounded" id="container_trabajo_conyugue">

      <form method="POST" action="{{ route('form9') }}">
        <div class="col-md-12 text-center">
            <h2 class="titulo-form"><strong>Trabajo del Cónyugue</strong><h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="nom_org_conyugue">Nombre de la Organización:</label>
                  <input type="text" class="form-control" id="nom_org_conyugue" name="nom_org_conyugue">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="puesto_conyugue">Puesto:</label>
                  <input type="text" class="form-control" id="puesto_conyugue" name="puesto_conyugue">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="sueldo_conyugue">Sueldo:</label>
                  <input type="text" class="form-control" id="sueldo_conyugue" name="sueldo_conyugue">
                </div>
              </div>
        </div>
        <h2 class="subtitulo-form">Domicilio de la Organización</h2>
        <div class="row border-form" >
            <div class="col-md-4">
                <div class="form-group">
                  <label for="calle_p_conyugue">Calle Principal:</label>
                  <input type="text" class="form-control" id="calle_p_conyugue" name="callep_conyugue">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="calles_conyugue">Entre Calles:</label>
                  <input type="text" class="form-control" id="calles_conyugue" name="calles_conyugue">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="numero_conyugue">Número:</label>
                  <input type="text" class="form-control" id="numero_conyugue" name="numero_conyugue">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="colonia_conyugue">Colonia:</label>
                  <input type="text" class="form-control" id="colonia_conyugue" name="colonia_conyugue">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="pais_conyugue">País:</label>
                  <input type="text" class="form-control" id="pais_conyugue" name="pais_conyugue">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="estado_conyugue">Estado:</label>
                  <input type="text" class="form-control" id="estado_conyugue" name="estado_conyugue">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="municipio_conyugue">Municipio:</label>
                  <input type="text" class="form-control" id="municipio_conyugue" name="municipio_conyugue">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="localidad_conyugue">Localidad:</label>
                  <input type="text" class="form-control" id="localidad_conyugue" name="localidad_conyugue">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="telefono_conyugue">Teléfono Local:</label>
                  <input type="text" class="form-control" id="telefono_conyugue" name="telefono_conyugue">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="codigoP_conyugue">Código Postal:</label>
                  <input type="text" class="form-control" id="codigoP_conyugue" name="codigoP_conyugue">
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

      <form method="POST" action="{{ route('form9') }}">
        <div class="col-md-12 text-center">
            <h2 class="titulo-form"><strong>Trabajo del Padre</strong><h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="nom_org_padre">Nombre de la Organización:</label>
                  <input type="text" class="form-control" id="nom_org_padre" name="nom_org_padre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="puesto_padre">Puesto:</label>
                  <input type="text" class="form-control" id="puesto_padre" name="puesto_padre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="sueldo_padre">Sueldo:</label>
                  <input type="text" class="form-control" id="sueldo_padre" name="sueldo_padre">
                </div>
              </div>
        </div>
        <h2 class="subtitulo-form"> Domicilio de la Organización </h2>
        <div class="row border-form" >
            <div class="col-md-4">
                <div class="form-group">
                  <label for="calle_p_padre">Calle Principal:</label>
                  <input type="text" class="form-control" id="calle_p_padre" name="callep_padre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="calles_padre">Entre Calles:</label>
                  <input type="text" class="form-control" id="calles_padre" name="calles_padre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="numero_padre">Número:</label>
                  <input type="text" class="form-control" id="numero_padre" name="numero_padre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="colonia_padre">Colonia:</label>
                  <input type="text" class="form-control" id="colonia_padre" name="colonia_padre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="pais_padre">País:</label>
                  <input type="text" class="form-control" id="pais_padre" name="pais_padre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="estado_padre">Estado:</label>
                  <input type="text" class="form-control" id="estado_padre" name="estado_padre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="municipio_padre">Municipio:</label>
                  <input type="text" class="form-control" id="municipio_padre" name="municipio_padre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="localidad_padre">Localidad:</label>
                  <input type="text" class="form-control" id="localidad_padre" name="localidad_padre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="telefono_padre">Teléfono Local:</label>
                  <input type="text" class="form-control" id="telefono_padre" name="telefono_padre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="codigoP_padre">Código Postal:</label>
                  <input type="text" class="form-control" id="codigoP_padre" name="codigoP_padre">
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

      <form method="POST" action="{{ route('form9') }}">
        <div class="col-md-12 text-center">
            <h2 class="titulo-form"><strong>Trabajo de la Madre</strong><h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="nom_org_madre">Nombre de la Organización:</label>
                  <input type="text" class="form-control" id="nom_org_madre" name="nom_org_madre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="puesto_madre">Puesto:</label>
                  <input type="text" class="form-control" id="puesto_madre" name="puesto_madre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="sueldo_madre">Sueldo:</label>
                  <input type="text" class="form-control" id="sueldo_madre" name="sueldo_madre">
                </div>
              </div>
        </div>
        <h2 class="subtitulo-form"> Domicilio de la Organización </h2>
        <div class="row border-form" >
            <div class="col-md-4">
                <div class="form-group">
                  <label for="calle_p_madre">Calle Principal:</label>
                  <input type="text" class="form-control" id="calle_p_madre" name="callep_madre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="calles_madre">Entre Calles:</label>
                  <input type="text" class="form-control" id="calles_madre" name="calles_madre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="numero_madre">Número:</label>
                  <input type="text" class="form-control" id="numero_madre" name="numero_madre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="colonia_madre">Colonia:</label>
                  <input type="text" class="form-control" id="colonia_madre" name="colonia_madre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="pais_madre">País:</label>
                  <input type="text" class="form-control" id="pais_madre" name="pais_madre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="estado_madre">Estado:</label>
                  <input type="text" class="form-control" id="estado_madre" name="estado_madre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="municipio_madre">Municipio:</label>
                  <input type="text" class="form-control" id="municipio_madre" name="municipio_madre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="localidad_madre">Localidad:</label>
                  <input type="text" class="form-control" id="localidad_madre" name="localidad_madre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="telefono_madre">Teléfono Local:</label>
                  <input type="text" class="form-control" id="telefono_madre" name="telefono_madre">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="codigoP_madre">Código Postal:</label>
                  <input type="text" class="form-control" id="codigoP_madre" name="codigoP_madre">
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


    <div class="container mb-4 bg-cremita pt-3 rounded" id="container_trabajo_aval1">

        <form method="POST" action="{{ route('form9') }}">
            <div class="col-md-12 text-center">
                <h2 class="titulo-form"><strong>Trabajo del AVAL 1</strong><h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="nom_org_aval1">Nombre de la Organización:</label>
                      <input type="text" class="form-control" id="nom_org_aval1" name="nom_org_aval1">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="puesto_aval1">Puesto:</label>
                      <input type="text" class="form-control" id="puesto_aval1" name="puesto_aval1">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="sueldo_aval1">Sueldo:</label>
                      <input type="text" class="form-control" id="sueldo_aval1" name="sueldo_aval1">
                    </div>
                  </div>
            </div>
            <h2 class="subtitulo-form"> Domicilio de la Organización </h2>
            <div class="row border-form" >
                <div class="col-md-4">
                    <div class="form-group">
                      <label for="calle_p_aval1">Calle Principal:</label>
                      <input type="text" class="form-control" id="calle_p_aval1" name="callep_aval1">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="calles_aval1">Entre Calles:</label>
                      <input type="text" class="form-control" id="calles_aval1" name="calles_aval1">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="numero_aval1">Número:</label>
                      <input type="text" class="form-control" id="numero_aval1" name="numero_aval1">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="colonia_aval1">Colonia:</label>
                      <input type="text" class="form-control" id="colonia_aval1" name="colonia_aval1">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="pais_aval1">País:</label>
                      <input type="text" class="form-control" id="pais_aval1" name="pais_aval1">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="estado_aval1">Estado:</label>
                      <input type="text" class="form-control" id="estado_aval1" name="estado_aval1">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="municipio_aval1">Municipio:</label>
                      <input type="text" class="form-control" id="municipio_aval1" name="municipio_aval1">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="localidad_aval1">Localidad:</label>
                      <input type="text" class="form-control" id="localidad_aval1" name="localidad_aval1">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="telefono_aval1">Teléfono Local:</label>
                      <input type="text" class="form-control" id="telefono_aval1" name="telefono_aval1">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="codigoP_aval1">Código Postal:</label>
                      <input type="text" class="form-control" id="codigoP_aval1" name="codigoP_aval1">
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
    

    <div class="container mb-4 bg-cremita pt-3 rounded" id="container_trabajo_aval2">

      <form method="POST" action="{{ route('form9') }}">
        <div class="col-md-12 text-center">
            <h2 class="titulo-form"><strong>Trabajo del AVAL 2</strong><h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="nom_org_aval2">Nombre de la Organización:</label>
                  <input type="text" class="form-control" id="nom_org_aval2" name="nom_org_aval2">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="puesto_aval2">Puesto:</label>
                  <input type="text" class="form-control" id="puesto_aval2" name="puesto_aval2">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="sueldo_aval2">Sueldo:</label>
                  <input type="text" class="form-control" id="sueldo_aval2" name="sueldo_aval2">
                </div>
              </div>
        </div>
        <h2 class="subtitulo-form"> Domicilio de la Organización </h2>
        <div class="row border-form" >
            <div class="col-md-4">
                <div class="form-group">
                  <label for="calle_p_aval2">Calle Principal:</label>
                  <input type="text" class="form-control" id="calle_p_aval2" name="callep_aval2">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="calles_aval2">Entre Calles:</label>
                  <input type="text" class="form-control" id="calles_aval2" name="calles_aval2">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="numero_aval2">Número:</label>
                  <input type="text" class="form-control" id="numero_aval2" name="numero_aval2">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="colonia_aval2">Colonia:</label>
                  <input type="text" class="form-control" id="colonia_aval2" name="colonia_aval2">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="pais_aval2">País:</label>
                  <input type="text" class="form-control" id="pais_aval2" name="pais_aval2">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="estado_aval2">Estado:</label>
                  <input type="text" class="form-control" id="estado_aval2" name="estado_aval2">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="municipio_aval2">Municipio:</label>
                  <input type="text" class="form-control" id="municipio_aval2" name="municipio_aval2">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="localidad_aval2">Localidad:</label>
                  <input type="text" class="form-control" id="localidad_aval2" name="localidad_aval2">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="telefono_aval2">Teléfono Local:</label>
                  <input type="text" class="form-control" id="telefono_aval2" name="telefono_aval2">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="codigoP_aval2">Código Postal:</label>
                  <input type="text" class="form-control" id="codigoP_aval2" name="codigoP_aval2-">
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
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form8') }}'">Regresar</button>
  </div>
  <div class="col-md-6 text-right mb-3"> <!-- Botón derecho -->
    <button type="button" class="boton btn-lg btn-form" onclick="window.location.href='{{ route('form10') }}'">Siguiente</button>
  </div>
</div> 
@endsection