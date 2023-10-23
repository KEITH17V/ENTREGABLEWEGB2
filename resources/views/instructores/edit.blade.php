@extends('layout')
@section('principal')

<div class="container" style="margin-top: 20px;">
    <h2 style="text-align: center; color: white;">Editar Instructor</h2>
    <form method="POST" action="{{ route('instructores.update', $instructor->id) }}" style="margin-top: 20px;">
        @csrf
        @method('PUT') <!-- Utiliza PUT para la actualización -->
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="dni" style="font-weight: bold;">Dni</label>
            <input type="text" class="form-control" id="dni" name="dni" value="{{ $instructor->dni }}" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="nombres" style="font-weight: bold;">Nombres</label>
            <input type="text" class="form-control" id="nombres" name="nombres" value="{{ $instructor->nombres }}" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="apellidos" style="font-weight: bold;">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $instructor->apellidos }}" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="genero" style="font-weight: bold;">Género</label>
            <select class="form-control" id="genero" name="genero" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
                <option value="masculino" {{ $instructor->genero == 'masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="femenino" {{ $instructor->genero == 'femenino' ? 'selected' : '' }}>Femenino</option>
                <option value="otro" {{ $instructor->genero == 'otro' ? 'selected' : '' }}>Otro</option>
            </select>
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="edad" style="font-weight: bold;">Edad</label>
            <input type="text" class="form-control" id="edad" name="edad" value="{{ $instructor->edad }}" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
        </div>
        <button type="submit" class="btn btn-primary" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">Guardar cambios</button>
    </form>
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