@extends('layout')

@section('principal')
    <h2>Reporte de Cursos por Alumno</h2>

    <form action="{{ route('reportes.cursos_alumno') }}" method="get">
        @csrf
        <label for="nombres">Nombres del Alumno:</label>
        <input type="text" name="nombres" id="nombres">

        <label for="apellidos">Apellidos del Alumno:</label>
        <input type="text" name="apellidos" id="apellidos">

        <label for="dni">DNI del Alumno:</label>
        <input type="text" name="dni" id="dni">

        <button type="submit">Buscar</button>
    </form>

    <table border="1">
        <tr>
            <th>Código del Curso</th>
            <th>Nombre del Curso</th>
        </tr>
        @foreach($cursos as $curso)
            <tr>
                <td>{{ $curso->codigo }}</td>
                <td>{{ $curso->nombre }}</td>
            </tr>
        @endforeach
    </table>
@endsection