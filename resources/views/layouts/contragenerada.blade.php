@extends('layouts.landing')
@section('title', 'Generada')
@section('content')
<p>Tu contraseña generada es: <strong>{{ $password }}</strong></p>
    <p>Guárdala en un lugar seguro.</p>

@endsection