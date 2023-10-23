<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    protected $table = 'instructores'; // Nombre de la tabla en la base de datos
    protected $fillable = ['id','dni','nombres', 'apellidos','genero','edad'];

    public function matriculas()
    {
        return $this->hasMany(Matricula::class,'idInstructor');
    }
     // Mutador para convertir el género a minúsculas antes de guardarlo en la base de datos
     public function setGeneroAttribute($value)
     {
         $this->attributes['genero'] = strtolower($value);
     }
 
     // Accesor para obtener el género en mayúsculas al acceder al valor
     public function getGeneroAttribute($value)
     {
         return ucfirst($value);
     }
    
}
