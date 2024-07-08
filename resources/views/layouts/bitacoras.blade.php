@extends('layouts.landingsinslider')
@section('title', 'Bitacoras')
@section('content')
<div class="container">
    <h1 class="my-4">Registros de Bitácoras</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Número</th>
                <th>Fecha Solicitud</th>
                <th>Técnico</th>
                <th>Responsable</th>
                <th>Archivo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bitacoras as $bitacora)
            <tr>
                <td>{{ $bitacora->numero }}</td>
                <td>{{ $bitacora->fechasolicitud }}</td>
                <td>
                    @if($bitacora->idtecnico == 1)
                        JESUS CASTILLO
                    @elseif($bitacora->idtecnico == 2)
                        LEONARDO CORONADO
                    @else
                        Otro nombre o lógica aquí
                    @endif
                </td>
                <td>{{ $bitacora->responsable }}</td>
                <td>
                    @if($bitacora->archivo)
                        <a href="{{ asset('storage/' . $bitacora->archivo) }}" target="_blank">Ver Archivo</a>
                    @else
                        No hay archivo
                    @endif
                </td> 
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        @if ($currentPage > 1)
            <a class="btn btn-primary mx-1" href="{{ route('bitacoras', ['page' => $currentPage - 1]) }}">Regresar</a>
        @endif

        @if ($currentPage < $totalPages)
            <a class="btn btn-primary mx-1" href="{{ route('bitacoras', ['page' => $currentPage + 1]) }}">Siguiente</a>
        @endif

        <div class="full">
            <a class="hvr-radial-out button-theme mb-4" href="{{ route('bitacoras.create') }}">+Nuevo registro</a>
        </div>
    </div>
    
</div>
@endsection