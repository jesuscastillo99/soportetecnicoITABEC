@extends('layouts.landing')
@section('title', 'Login')
@section('content')
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
      
                      <div class="text-center">
                        <img src="{{ asset('assets/images/logo-itabec.png')}}"
                           alt="logo-itabec" id="img-logo">
                        <h4 class="mt-5 mb-5 pb-1">Bievenido al Sistema</h4>
                      </div>
                      
                      <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <p>Por favor inicia sesión con tus datos:</p>
      
                        <div class="form-outline mb-4">
<<<<<<< HEAD
                          <input type="email" id="form2Example11" class="form-control"
                            placeholder="CURP..." />
                          <label class="form-label" for="form2Example11">CURP</label>
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="password" id="form2Example22" class="form-control" 
                            placeholder="********"/>
                          <label class="form-label" for="form2Example22">CONTRASEÑA</label>
=======
                          <input type="text" name="curp" id="inputCurp" class="form-control"
                            placeholder="ABCD1001....." />
                          <label class="form-label" for="inputCurp">CURP</label>
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="email" name="correo" id="inputCorreo" class="form-control" 
                            placeholder="correo@mail.com"/>
                          <label class="form-label" for="inputCorreo">Contraseña</label>
>>>>>>> 995fc62695d13a1fd906cfdb6c20c3b872fe4b93
                        </div>
      
                        <div class="text-center pt-1 mb-5 pb-1">
                          <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 max-width-button" type="button">Acceso
                            </button>
                          <a class="text-muted" href="#!">¿Has olvidado tu contraseña?</a>
                        </div>
      
                        <div class="d-flex align-items-center justify-content-center pb-4">
                          <p class="mb-0 me-2">¿No tienes cuenta?</p>
<<<<<<< HEAD
                          <button type="button" class="btn btn-outline-danger">Crear nueva</button>
=======
                          <a href="{{ route('registro') }}" class="btn btn-primary">Crear cuenta</a>
>>>>>>> 995fc62695d13a1fd906cfdb6c20c3b872fe4b93
                        </div>
      
                      </form>
      
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                      <h4 class="mb-4">CONÓCENOS</h4>
                      <p class="small mb-0" class="text-center">El Instituto Tamaulipeco de Becas, Estímulos y Créditos Educativo (ITABEC) 
                        es un organismo público descentralizado con personalidad jurídica y patrimonio propio, adscrito sectorialmente a la Secretaría de Educación.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
