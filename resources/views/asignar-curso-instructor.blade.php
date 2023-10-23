<style>
    h1 {
        font-size: 24px;
        color: #333;
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    select, button {
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
</style>
<h1>Asignar Curso a Instructor</h1>

<form action="{{ route('asignar.curso.instructor.post') }}" method="post">
    @csrf
    <input type="hidden" name="alumno_id" value="{{ $alumno->id }}">
    
    <label for="curso_id">Seleccionar Curso:</label>
    <select name="curso_id" id="curso_id">
        @foreach($cursos as $id => $curso)
            <option value="{{ $id }}">{{ $curso->nombre }}</option>
        @endforeach
    </select>

    <br>

    <label for="instructor_id">Seleccionar Instructor:</label>
    <select name="instructor_id" id="instructor_id">
        @foreach($instructores as $instructor)
            <option value="{{ $instructor->id }}">{{ $instructor->nombre }}</option>
        @endforeach
    </select>

    <button type="submit">Asignar Curso a Instructor</button>
</form>