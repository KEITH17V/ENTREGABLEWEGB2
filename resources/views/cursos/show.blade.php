@extends('layout')
@section('principal')

<div class="container" style="margin-top: 20px;">
        <h2 style="text-align: center; color: white;">Detalles de Curso</h2>
        <p style="text-align: center;"><strong>ID:</strong> {{ $curso->id }}</p>
        <p style="text-align: center;"><strong>Codigo:</strong> {{ $curso->codigo }}</p>
        <p style="text-align: center;"><strong>Nombre:</strong> {{ $curso->nombre }}</p>
        <p style="text-align: center;"><strong>Ciclo:</strong> {{ $curso->ciclo }}</p>
</div>
<div class="form-group" style="margin-top: 20px; text-align: center;">
    <style>
        .custom-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .custom-button:hover {
            background-color: #45a049;
        }
    </style>
    <a href="{{ route('cursos.index') }}" class="custom-button">Regresar al Listado</a>
</div>

@endsection