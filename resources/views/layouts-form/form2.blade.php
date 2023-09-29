@extends('layouts.landingsinslider')
@section('title', 'form2')
@section('content')
<div class="section margin-top_50">
    <div class="container mb-2 bg-cremita pt-3 rounded">
        <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="titulo-form"><strong>Domicilio Familiar</strong><h2>
            </div>
          </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="calle">Calle:</label>
                  <input type="text" class="form-control" id="calle" name="calle">
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
                  <input type="text" class="form-control" id="colonia" name="colonia">
                </div>
              </div>
        </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="entre_calles">Entre calles:</label>
                  <input type="text" class="form-control" id="entre_calles" name="entre_calles">
                  <p class="text-center">Y</p>
                  <input type="text" class="form-control mt-1" id="entre_calles2" name="entre_calles2">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="telefono_local">Telefono Local:</label>
                  <input type="text" class="form-control" id="telefono_local" name="telefono_local" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="codigo_postal">Codigo Postal:</label>
                  <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" maxlength="5" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 5)">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="telefono_celular">Telefono Celular:</label>
                  <input type="text" class="form-control" id="telefono_celular" name="telefono_celular" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="llega_correo">¿Llega correo?</label>
                  <select class="form-control" id="llega_correo" name="llega_correo">
                    <option value="si">Sí</option>
                    <option value="no">No</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="pais">País:</label>
                  <input type="text" class="form-control" id="pais" name="pais" value="México" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="estado">Estado:</label>
                  <input type="text" class="form-control" id="estado" name="estado" value="San Luis Potosí" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="municipio">Municipio:</label>
                  <input type="text" class="form-control" id="municipio" name="municipio" value="Cd. Valles" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="localidad">Localidad:</label>
                  <input type="text" class="form-control" id="localidad" name="localidad" value="Cd. Valles" readonly>
                </div>
              </div> 
            </div>
            <div class="row">
                <div class="col-md-12 text-right mb-3">
                  <button type="submit" class="boton btn-form">Guardar datos</button>
                </div>
            </div>
        </div> 
    </div>
</div>
<!-- end section -->
<div class="section mt-3">
    <div class="container mb-2 bg-cremita pt-3 rounded">
        <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="titulo-form"><strong>Otro Domicilio</strong><h2>
            </div>
          </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="calle">Calle:</label>
                  <input type="text" class="form-control" id="calle" name="calle">
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
                  <input type="text" class="form-control" id="colonia" name="colonia">
                </div>
              </div>
        </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="entre_calles">Entre calles:</label>
                  <input type="text" class="form-control" id="entre_calles" name="entre_calles">
                  <p class="text-center">Y</p>
                  <input type="text" class="form-control mt-1" id="entre_calles2" name="entre_calles2">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="telefono_local">Telefono Local:</label>
                  <input type="text" class="form-control" id="telefono_local" name="telefono_local" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="codigo_postal">Codigo Postal:</label>
                  <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" maxlength="5" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 5)">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="telefono_celular">Telefono Celular:</label>
                  <input type="text" class="form-control" id="telefono_celular" name="telefono_celular" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="llega_correo">¿Llega correo?</label>
                  <select class="form-control" id="llega_correo" name="llega_correo">
                    <option value="si">Sí</option>
                    <option value="no">No</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="pais">País:</label>
                  <input type="text" class="form-control" id="pais" name="pais" value="México" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="estado">Estado:</label>
                  <input type="text" class="form-control" id="estado" name="estado" value="San Luis Potosí" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="municipio">Municipio:</label>
                  <input type="text" class="form-control" id="municipio" name="municipio" value="Cd. Valles" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="localidad">Localidad:</label>
                  <input type="text" class="form-control" id="localidad" name="localidad" value="Cd. Valles" readonly>
                </div>
              </div> 
            </div>
            <div class="row">
                <div class="col-md-12 text-right mb-3">
                  <button type="submit" class="boton btn-form">Guardar datos</button>
                </div>
            </div>
        </div> 
    </div>
</div>
<!-- end section -->
<div class="section mt-3">
    <div class="container mb-2 bg-cremita pt-3 rounded">
        <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="titulo-form"><strong>Domicilio Foráneo (si vives en otra ciudad)</strong><h2>
            </div>
          </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="calle">Calle:</label>
                  <input type="text" class="form-control" id="calle" name="calle">
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
                  <input type="text" class="form-control" id="colonia" name="colonia">
                </div>
              </div>
        </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="entre_calles">Entre calles:</label>
                  <input type="text" class="form-control" id="entre_calles" name="entre_calles">
                  <p class="text-center">Y</p>
                  <input type="text" class="form-control mt-1" id="entre_calles2" name="entre_calles2">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="telefono_local">Telefono Local:</label>
                  <input type="text" class="form-control" id="telefono_local" name="telefono_local" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="codigo_postal">Codigo Postal:</label>
                  <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" maxlength="5" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 5)">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="telefono_celular">Telefono Celular:</label>
                  <input type="text" class="form-control" id="telefono_celular" name="telefono_celular" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '').substring(0, 15)">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="llega_correo">¿Llega correo?</label>
                  <select class="form-control" id="llega_correo" name="llega_correo">
                    <option value="si">Sí</option>
                    <option value="no">No</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="pais">País:</label>
                  <input type="text" class="form-control" id="pais" name="pais" value="México" readonly>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="estado">Estado:</label>
                  <input type="text" class="form-control" id="estado" name="estado" value="San Luis Potosí" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="municipio">Municipio:</label>
                  <input type="text" class="form-control" id="municipio" name="municipio" value="Cd. Valles" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="localidad">Localidad:</label>
                  <input type="text" class="form-control" id="localidad" name="localidad" value="Cd. Valles" readonly>
                </div>
              </div> 
            </div>
            <div class="row">
                <div class="col-md-12 text-right mb-3">
                  <button type="submit" class="boton btn-form">Guardar datos</button>
                </div>
            </div>
        </div> 
    </div>
</div>
<!-- end section -->
@endsection