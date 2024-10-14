@extends('layouts.landing')
@section('title', 'Inicio')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert')
 <!-- LOADER -->
 <div id="preloader">
    <div class="loader">
        <img src="{{ asset('assets/images/loader.gif')}}" alt="gif_image" />
    </div>
</div>

 <!-- section -->
 <div class="section margin-top_50">
    <div class="container">
        <div class="row">
            <div class="col-md-6 layout_padding_2">
                <div class="full">
                    <div class="heading_main text_align_left">
                       <h2>Bienvenido al <span>SISTEMA DE REGISTRO DE SOPORTE TÉCNICO</span></h2>
                       
                       
                    </div>
                    <div class="full">
                      <p>Con este sistema se podrán almacenar, editar y eliminar, los diferentes registros realizados por los ingenieros 
                        Jesús Alberto Castillo Estrada y Leonardo Alfonso Coronado Pérez en todo el instituto
                        de ITABEC.</p>
                    </div>
                    <div class="full">
                       <a class="hvr-radial-out button-theme" href="{{ route('bitacoras.create') }}">Agregar registro</a>
                    </div>
                </div>

                

            </div>
            <div class="col-md-6">
                <div class="full">
                    <img src="{{ asset('assets/images/chicos_itabec.jpg')}}" class="img-responsive" alt="chicos_itabecimg" />
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->

<section class="centrar-seccion">

   
</section>

@endsection