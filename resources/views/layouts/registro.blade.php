@extends('layouts.landing')
@section('title', 'Registro')
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
                        <h4 class="mt-5 mb-5 pb-1">Bievenido al Registro </h4>
                      </div>
                      
                      <form method="POST" action="{{ route('registro') }}">
                        @csrf
                        <p>Por favor ingresa tus datos para el registro:</p>
      
                        <div class="form-outline mb-4">
                          <input type="text" name="curp" id="inputCurp" class="form-control"
                            placeholder="ABCD1001....." />
                          <label class="form-label" for="inputCurp">Registra tu curp</label>
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="email" name="correo" id="inputCorreo" class="form-control" 
                            placeholder="correo@mail.com"/>
                          <label class="form-label" for="inputCorreo">Registra tu correo</label>
                        </div>
      
                        <div class="text-center pt-1 mb-5 pb-1">
                          <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 max-width-button" type="button">REGISTRARSE
                            </button>
                        </div>
      
                        <div class="d-flex align-items-center justify-content-center pb-4">
                          <p class="mb-0 me-2">¿Ya tienes cuenta?</p>
                          <a href="{{ route('login') }}" class="btn btn-primary">Iniciar sesión</a>
                        </div>
      
                      </form>
      
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2 text-justify">
                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                      <h4 class="mb-4">CONÓCENOS</h4>
                      <p class="small mb-0">El Instituto Tamaulipeco de Becas, Estímulos y Créditos Educativo (ITABEC) es un organismo público descentralizado con personalidad jurídica y patrimonio propio, adscrito sectorialmente a la Secretaría de Educación.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
