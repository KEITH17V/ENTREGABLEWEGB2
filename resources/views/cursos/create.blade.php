@extends('layout')
@section('principal')

<<div class="container cursos" style="margin-top: 20px;">
        <h2 style="text-align: center; color: white;">Crear Curso</h2>
        <form method="POST" action="{{ route('cursos.store') }}" style="margin-top: 20px;">
            @csrf
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="codigo" style="font-weight: bold;">Codigo</label>
                <input type="text" class="form-control" id="codigo" name="codigo" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="nombre" style="font-weight: bold;">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="ciclo" style="font-weight: bold;">Ciclo</label>
                <input type="text" class="form-control" id="ciclo" name="ciclo" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
            </div>
            <button type="submit" class="btn btn-primary" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;">Guardar</button>
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