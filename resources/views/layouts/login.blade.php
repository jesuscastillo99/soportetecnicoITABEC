<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/styles.css')}}">
</head>
<body>
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
                      
                      <form>
                        <p>Por favor inicia sesión con tus datos:</p>
      
                        <div class="form-outline mb-4">
                          <input type="email" id="form2Example11" class="form-control"
                            placeholder="CURP..." />
                          <label class="form-label" for="form2Example11">CURP</label>
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="password" id="form2Example22" class="form-control" 
                            placeholder="********"/>
                          <label class="form-label" for="form2Example22">CONTRASEÑA</label>
                        </div>
      
                        <div class="text-center pt-1 mb-5 pb-1">
                          <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 max-width-button" type="button">Acceso
                            </button>
                          <a class="text-muted" href="#!">¿Has olvidado tu contraseña?</a>
                        </div>
      
                        <div class="d-flex align-items-center justify-content-center pb-4">
                          <p class="mb-0 me-2">¿No tienes cuenta?</p>
                          <button type="button" class="btn btn-outline-danger">Crear nueva</button>
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
</body>
</html>