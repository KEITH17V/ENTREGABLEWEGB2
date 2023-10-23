<?php

namespace App\Http\Controllers;

 

use Illuminate\Http\Request;

use App\Models\Alumno;

use App\Models\Curso;

use App\Models\Matricula;
use App\Models\Instructor;

use Illuminate\Database\QueryException;

 

class MatriculaController extends Controller

{

 

public function index(Request $request)

 

    {

 

        //if(!session('usuario_autenticado')){

 

        //    return redirect()->route('login.index')->with('mensaje', 'Acceso No Autorizado');

 

        //}

 

 

 

        $dni = $request->input('dni');

 

        $anioAcad = $request->input('anioAcad');

 

 

 

        if($dni && $anioAcad){

 

 

 

            $alumno = Alumno::where('dni',$dni)->first();

 

            if(!$alumno){

 

                return view('matriculas.index',['mensaje'=>'Alumno no encontrado !!!']);

 

            }

 

 

 

            $matriculas = $alumno->matriculas->where('anioAcad', $anioAcad);

 

           

 

            session(['matricula_idAlumno' => $alumno->id]);

 

            session(['matricula_anioAcad' => $anioAcad]);

 

            session(['matricula_dni' => $dni]);

 

 

 

            return view('matriculas.index',['alumno'=>$alumno,'matriculas'=>$matriculas,'anioAcad'=>$anioAcad]);

 

        }

 

        else{

 

            return view('matriculas.index');

 

        }

 

       

 

       

 

    }

 

    public function search(Request $request)

 

    {

 

        //if(!session('usuario_autenticado')){

 

        //    return redirect()->route('login.index')->with('mensaje', 'Acceso No Autorizado');

 

        //}

 

       

 

        $dni=$request->input("dni");

 

        $anioAcad=$request->input("anioAcad");

 

       

 

        return redirect()->route('matricula.index',['dni' => $dni,'anioAcad'=>$anioAcad]);

 

    }

 

    public function cursoIndex(Request $request)

 

    {

 

        //if(!session('usuario_autenticado')){

 

        //    return redirect()->route('login.index')->with('mensaje', 'Acceso No Autorizado');

 

        //}

 

       

 

        $codigo = $request->input('codigo');

 

 

 

        if($codigo){

 

 

 

            $curso = Curso::where('codigo',$codigo)->first();

 

            if(!$curso){

 

                return view('matriculas.cursoIndex',['mensaje' => 'curso no encontrado!!!']);    

 

            }

 

           

 

            session(['matricula_idCurso' => $curso->id]);

 

 

 

            return view('matriculas.cursoIndex',['curso' => $curso]);

 

        }

 

        else{

 

            return view('matriculas.cursoIndex');

 

        }

 

    }

 

    public function cursoSearch(Request $request)

 

    {

 

        //if(!session('usuario_autenticado')){

 

        //    return redirect()->route('login.index')->with('mensaje', 'Acceso No Autorizado');

 

        //}

 

       

 

        $codigo=$request->input("codigo");

 

 

 

        return redirect()->route('matricula.curso.index',['codigo' => $codigo]);

 

 

 

    }

 

    public function cursoMatricular(Request $request)

 

    {

 

        //if(!session('usuario_autenticado')){

 

        //    return redirect()->route('login.index')->with('mensaje', 'Acceso No Autorizado');

 

        //}

 

       

 

        $idCurso = session('matricula_idCurso');

 

        $idAlumno = session('matricula_idAlumno');

 

        $anioAcad = session('matricula_anioAcad');

 

        $dni = session('matricula_dni');

 

 

 

        $matricula=new Matricula();

 

        $matricula->idAlumno=$idAlumno;

 

        $matricula->idCurso=$idCurso;

 

        $matricula->anioAcad=$anioAcad;

 

       

 

        try{

 

 

 

            $matricula->save();

 

 

 

        }catch(QueryException $e){

 

 

 

            return redirect()->route('matricula.index',['dni' => $dni,'anioAcad' => $anioAcad])->with('mensaje', 'Error no se puede crear la matricula !!!');

 

 

 

        }finally {

 

            session()->forget('matricula_idCurso');

 

            session()->forget('matricula_idAlumno');

 

            session()->forget('matricula_anioAcad');

 

            session()->forget('matricula_dni');

 

        }

 

       

 

        return redirect()->route('matricula.index',['dni' => $dni,'anioAcad' => $anioAcad]);

 

    }

 

    public function eliminar($id)

 

{

 

    $matricula = Matricula::find($id);

 

    if ($matricula) {

 

        $matricula->delete();

 

        return redirect()->back()->with('mensaje', 'Matrícula eliminada exitosamente');

 

    } else {

 

        return redirect()->back()->with('mensaje', 'Matrícula no encontrada');

 

    }

 

}

 

public function mostrarFormularioAsignacion()

{

    // Obtener el alumno y sus matrículas

    $alumno = Alumno::find($alumno_id);

    $matriculas = Matricula::where('alumno_id', $alumno->id)->get();

 

    // Obtener los cursos disponibles para asignar

    $cursosDisponibles = Curso::whereNotIn('id', $matriculas->pluck('curso_id'))->get();

 

    return view('matricula.index', compact('alumno', 'matriculas', 'cursosDisponibles'));

}
public function mostrarFormularioAsignarCursoInstructor($alumno_id) {
    $alumno = Alumno::find($alumno_id);
    $cursos = $alumno->matriculas->pluck('curso', 'curso.id');
    $instructores = Instructor::all(); // Esto obtiene todos los instructores, asegúrate de obtener solo los que desees mostrar.

    return view('asignar-curso-instructor', compact('alumno', 'cursos', 'instructores'));
}

public function asignarCursoInstructor(Request $request) {
    $alumno_id = $request->input('alumno_id');
    $curso_id = $request->input('curso_id');
    $instructor_id = $request->input('instructor_id');

    $alumno = Alumno::find($alumno_id);
    $curso = Curso::find($curso_id);
    $instructor = Instructor::find($instructor_id);

    // Asignar el curso al instructor
    $curso->instructor()->associate($instructor);
    $curso->save();

    return redirect()->route('matricula.index')->with('mensaje', 'Curso asignado exitosamente.');
}
public function agregarInstructorCurso()
{
    // Crear un nuevo instructor
    $instructor = new Instructor();
    $instructor->nombre = 'Cesar';
    // Agregar más propiedades según sea necesario
    $instructor->save();

    // Crear un nuevo curso
    $curso = new Curso();
    $curso->nombre = 'Programacion';
    // Agregar más propiedades según sea necesario
    $curso->save();

    return redirect()->back()->with('mensaje', 'Instructor y curso creados exitosamente');
}
}