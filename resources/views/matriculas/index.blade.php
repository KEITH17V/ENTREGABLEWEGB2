<style>
        body{
            background-image: linear-gradient(300deg, #eeffff 0, #bdf2ff 25%, #84ccef 50%, #42a7d4 75%, #0087bd 100%);
        }
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeInUp 0.5s forwards 0.5s;
        }

        form {
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeInUp 0.5s forwards 1s;
        }

        label, input, button {
            font-size: 16px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <body>
        
    

<h1>MATRICULA</h1>

 

<form action="{{ route('matricula.alumno.search') }}" method="post">
    @csrf

 

    @if (isset($anioAcad))
<select name="anioAcad" style="width: 150px">
<option value="2023-I" @if($anioAcad == '2023-I') selected @endif>2023-I</option>
<option value="2023-II" @if($anioAcad == '2023-II') selected @endif>2023-II</option>
<option value="2024-I" @if($anioAcad == '2024-I') selected @endif>2024-I</option>
<option value="2024-II" @if($anioAcad == '2024-II') selected @endif>2024-II</option>
</select>
    @else
<select name="anioAcad" style="width: 150px">
<option value="2023-I" >2023-I</option>
<option value="2023-II" >2023-II</option>
<option value="2024-I" >2024-I</option>
<option value="2024-II" >2024-II</option>
</select>
    @endif

<input type="text" name="dni" id="dni" @if(isset($alumno)) value="{{$alumno->dni}}" @endif>
<button type="submit">buscar alumno</button>
</form>

 

@isset($alumno)
    @isset($anioAcad)
<div>
        Año Academico: {{ $anioAcad}}
</div>
    @endisset
<div>
        Nombres: {{ $alumno->nombres}}
</div>
<div>
        Dni: {{ $alumno->dni}}
</div>
@endisset

 

@isset($alumno)

<table border="1">
    <tr>
        <th>Año Académico</th>
        <th>Código del Curso</th>
        <th>Nombre del Curso</th>
        <th>Acciones</th>
        <th>Instructor</th>
    </tr>
    @foreach($matriculas as $matricula)
        <tr>
            <td>{{ $matricula->anioAcad }}</td>
            <td>{{ $matricula->curso->codigo }}</td>
            <td>{{ $matricula->curso->nombre }}</td>
            <td>
                <form action="{{ route('matricula.eliminar', $matricula->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
            <td>{{ $matricula->curso->instructor->nombre }}</td> <!-- Aquí se muestra el nombre del instructor -->
        </tr>
    @endforeach
</table>

<form action="{{ route('matricula.curso.index') }}" method="get">
        @csrf
<button type="submit">agregar curso</button>
</form>
<form action="{{ route('matricula.curso.index') }}" method="get">
        @csrf
        <a href="{{ route('asignar.curso.instructor', $alumno->id) }}">Asignar Curso a Instructor</a>
</form>

</body>

@endisset

 

{{-- Manejo de mensajes de error--}}
@if(session('mensaje'))
<p>{{ session('mensaje') }}</p>
@endif
@if(isset($mensaje))
<p>{{ $mensaje }}</p>
@endif