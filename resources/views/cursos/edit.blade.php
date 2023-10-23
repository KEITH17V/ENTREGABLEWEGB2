@extends('layout')
@section('principal')

<div class="container" style="margin-top: 20px;">
        <h2 style="text-align: center; color: white;">Editar Curso</h2>
        <form method="POST" action="{{ route('cursos.update', $curso->id) }}" style="margin-top: 20px;">
            @csrf
            @method('PUT') <!-- Utiliza PUT para la actualización -->
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="codigo" style="font-weight: bold;">Codigo</label>
                <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $curso->codigo }}" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="nombre" style="font-weight: bold;">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $curso->nombre }}" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="ciclo" style="font-weight: bold;">Ciclo</label>
                <input type="text" class="form-control" id="ciclo" name="ciclo" value="{{ $curso->ciclo }}" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
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
    <a href="{{ route('cursos.index') }}" class="custom-button">Regresar al Listado</a>
</div>

@endsection