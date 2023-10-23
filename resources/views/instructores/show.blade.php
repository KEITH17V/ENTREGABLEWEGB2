@extends('layout')
@section('principal')

<div class="container" style="margin-top: 20px; text-align: center;">
    <h2 style="color: white;">Detalles de Instructor</h2>
    <p style="margin-bottom: 10px;"><strong>ID:</strong> {{ $instructor->id }}</p>
    <p style="margin-bottom: 10px;"><strong>Dni:</strong> {{ $instructor->dni }}</p>
    <p style="margin-bottom: 10px;"><strong>Nombres:</strong> {{ $instructor->nombres }}</p>
    <p style="margin-bottom: 10px;"><strong>Apellidos:</strong> {{ $instructor->apellidos }}</p>
    <p style="margin-bottom: 10px;"><strong>Género:</strong> 
        <select class="form-control" style="width: 50%; margin: auto;" disabled>
            <option value="masculino" {{ $instructor->genero == 'masculino' ? 'selected' : '' }}>Masculino</option>
            <option value="femenino" {{ $instructor->genero == 'femenino' ? 'selected' : '' }}>Femenino</option>
            <option value="otro" {{ $instructor->genero == 'otro' ? 'selected' : '' }}>Otro</option>
        </select>
    </p>
    <p style="margin-bottom: 10px;"><strong>Edad:</strong> {{ $instructor->edad }}</p>
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
    <a href="{{ route('instructores.index') }}" class="custom-button">Regresar al Listado</a>
</div>

@endsection