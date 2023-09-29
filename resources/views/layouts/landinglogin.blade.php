<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="images/png" href="{{ asset('assets/images/escudotam_2023.ico')}}">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" media="all" href="{{ asset('assets/styles.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css')}}" />
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="{{ asset('assets/pogo-slider.min.css')}}" />
    <!-- Site CSS -->
    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/responsive.css')}}" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/custom.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/style.css')}}" />
</head>

<body>
@yield('content')
</body>

<!-- ALL JS FILES -->
<script src="{{ asset('assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('assets/js/popper.min.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/js/form.js')}}"></script>
<!-- ALL PLUGINS -->
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js')}}"></script> 
<script src="{{ asset('assets/js/jquery.pogo-slider.min.js')}}"></script>
<script src="{{ asset('assets/js/slider-index.js')}}"></script>
<script src="{{ asset('assets/js/smoothscroll.js')}}"></script>
<script src="{{ asset('assets/js/isotope.min.js')}}"></script>
<script src="{{ asset('assets/js/images-loded.min.js')}}"></script>
<script src="{{ asset('assets/js/custom.js')}}"></script>
<script>
/* counter js */
</html>