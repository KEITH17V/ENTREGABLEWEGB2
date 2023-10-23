<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use Illuminate\Database\QueryException;

class InstructorController extends Controller
{
    public function index()
    {
        if(!session('usuario_autenticado')){
            return redirect()->route('login')->with('mensaje', 'Acceso No Autorizado');
        }

        $instructores = Instructor::all();
        return view('instructores.index', compact('instructores'));
    }

    public function show($id)
    {   
        if(!session('usuario_autenticado')){
            return redirect()->route('login')->with('mensaje', 'Acceso No Autorizado');
        }
        $instructor = Instructor::findOrFail($id);
        return view('instructores.show', compact('instructor'));
    }

    public function create()
    {
        if(!session('usuario_autenticado')){
            return redirect()->route('login')->with('mensaje', 'Acceso No Autorizado');
        }
        return view('instructores.create');
    }

    public function store(Request $request)
    {
        if(!session('usuario_autenticado')){
            return redirect()->route('login')->with('mensaje', 'Acceso No Autorizado');
        }
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'dni' => 'required',
            'genero' => 'required',
            'edad' => 'required',
        ]);
        try{
            $requestData = $request->all();
            $requestData['genero'] = strtolower($request->genero); // Ajuste del género a minúsculas
            Instructor::create($requestData);

            return redirect()->route('instructores.index');

        }catch(QueryException $e){
            $errorCode = $e->getCode();
           
            if ($errorCode === '23000') {
                return "El registro tiene un campo duplicado";
            }
            else if ($errorCode === '22001') {
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
        $instructor = Instructor::findOrFail($id);
        return view('instructores.edit', compact('instructor'));
    }

    public function update(Request $request, $id)
    {
        if(!session('usuario_autenticado')){
            return redirect()->route('login')->with('mensaje', 'Acceso No Autorizado');
        }
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'dni' => 'required',
            'genero' => 'required',
            'edad' => 'required',
        ]);

        $instructor = Instructor::findOrFail($id);
        
        try{
            $requestData = $request->all();
            $requestData['genero'] = strtolower($request->genero); // Ajuste del género a minúsculas
            $instructor->update($requestData);
        }catch(QueryException $e){
            $errorCode = $e->getCode();
            
            if ($errorCode === '23000') {
                return "El registro tiene un campo duplicado";
            }
            else if ($errorCode === '22001') {
                return "El registro tiene un campo mas grande de lo esperado";
            }
            else{
                throw $e;
            }
        }

        return redirect()->route('instructores.index');
    }

    public function destroy($id)
    {
        if(!session('usuario_autenticado')){
            return redirect()->route('login')->with('mensaje', 'Acceso No Autorizado');
        }
        $instructor = Instructor::findOrFail($id);
        $instructor->delete();

        return redirect()->route('instructores.index');
    }
    
}