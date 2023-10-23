<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function alumnosPorCurso(Request $request)
{
    // Obtener datos de la solicitud (nombre y código del curso)
    $nombreCurso = $request->input('nombre_curso');
    $codigoCurso = $request->input('codigo_curso');

    // Consultar la base de datos para obtener los alumnos por curso
    $alumnos = Alumno::whereHas('matriculas', function ($query) use ($nombreCurso, $codigoCurso) {
        if ($nombreCurso) {
            $query->whereHas('curso', function ($subQuery) use ($nombreCurso) {
                $subQuery->where('nombre', 'like', "%$nombreCurso%");
            });
        }

        if ($codigoCurso) {
            $query->whereHas('curso', function ($subQuery) use ($codigoCurso) {
                $subQuery->where('codigo', 'like', "%$codigoCurso%");
            });
        }
    })->get();

    return view('reportes.alumnos_curso', compact('alumnos'));
}
}
