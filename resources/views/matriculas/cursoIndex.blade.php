<style>
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            opacity: 0;
            transform: translateY(-20px);
            animation: fadeInUp 0.5s forwards 0.5s;
        }

        form, div {
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

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

<h1>CURSOS</h1>

<form action="{{ route('matricula.curso.search') }}" method="post">
    @csrf
    <input type="text" name="codigo" id="codigo" @if(isset($curso)) value="{{$curso->codigo}}" @endif>
    <button type="submit">Buscar Curso</button>
</form>

@isset($curso)
    <div>
        Codigo: {{ $curso->codigo}}
    </div>
    <div>
        Nombre: {{ $curso->nombre}}
    </div>
    <div>
        Ciclo: {{ $curso->ciclo}}
    </div>
@endisset

@isset($curso)

    <form action="{{ route('matricula.curso.matricular') }}" method="post">
        @csrf
        <button type="submit">Matricular</button>
    </form>

@endisset

{{-- Manejo de mensajes de error--}}
@if(session('mensaje'))
    <p>{{ session('mensaje') }}</p>
@endif
@if(isset($mensaje))
    <p>{{ $mensaje }}</p>
@endif