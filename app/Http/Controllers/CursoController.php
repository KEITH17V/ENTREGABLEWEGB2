<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Database\QueryException;

class CursoController extends Controller
{
    
    public function index()
    {
        if(!session('usuario_autenticado')){
            return redirect()->route('login')->with('mensaje', 'Acceso No Autorizado');
        }
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }
    public function show($id)
    {   
        if(!session('usuario_autenticado')){
            return redirect()->route('login')->with('mensaje', 'Acceso No Autorizado');
        }
        $curso = Curso::findOrFail($id);
        return view('cursos.show', compact('curso'));
    }
    public function create()
    {
        if(!session('usuario_autenticado')){
            return redirect()->route('login')->with('mensaje', 'Acceso No Autorizado');
        }
        return view('cursos.create');
    }
    public function store(Request $request)
    {
        if(!session('usuario_autenticado')){
            return redirect()->route('login')->with('mensaje', 'Acceso No Autorizado');
        }
        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'ciclo' => 'required',
            
        ]);
        try{
            Curso::create($request->all());

            return redirect()->route('cursos.index');

        }catch(QueryException $e){
            $errorCode = $e->getCode();
           
            if ($errorCode === '23000') {

                //return "El registro tiene un campo duplicado <br>".$e->getMessage();
                return "El registro tiene un campo duplicado";
            }
            else if ($errorCode === '22001') {

                //return "El registro tiene un campo duplicado <br>".$e->getMessage();
                return "El registro tiene un campo mas grande de lo esperado";
            }
            else{
                throw $e;
            }
        }
    }
    public function edit($id)
    {
        if(!session('usuario_autenticado')){
            return redirect()->route('login')->with('mensaje', 'Acceso No Autorizado');
        }
        $curso = Curso::findOrFail($id);
        return view('cursos.edit', compact('curso'));
    }
    public function update(Request $request, $id)
    {
        if(!session('usuario_autenticado')){
            return redirect()->route('login')->with('mensaje', 'Acceso No Autorizado');
        }

        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'ciclo' => 'required',
            
        ]);
    
        $curso = Curso::findOrFail($id);
        
        try{
            $curso->update([
                'codigo' => $request->codigo,
                'nombre' => $request->nombre,
                'ciclo' => $request->ciclo,
                
            ]);
        }catch(QueryException $e){
        $errorCode = $e->getCode();
        
        if ($errorCode === '23000') {

            //return "El registro tiene un campo duplicado <br>".$e->getMessage();
            return "El registro tiene un campo duplicado";
        }
        else if ($errorCode === '22001') {

            //return "El registro tiene un campo duplicado <br>".$e->getMessage();
            return "El registro tiene un campo mas grande de lo esperado";
        }
        else{
            throw $e;
        }
    }

        return redirect()->route('cursos.index');
    }
    public function destroy($id)
    {
        if(!session('usuario_autenticado')){
            return redirect()->route('login')->with('mensaje', 'Acceso No Autorizado');
        }

        $curso = Curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('cursos.index');
    }
}

