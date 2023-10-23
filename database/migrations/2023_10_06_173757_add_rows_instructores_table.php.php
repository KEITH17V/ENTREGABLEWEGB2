<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('instructores')->insert([
            'dni'=>'40633367',
            'nombres' => 'Alan',
            'apellidos' => 'Garcia',
            'genero' => 'MASCULINO',
            'edad' => 30,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('instructores')
        ->where('dni', '40633367')
        ->where('nombres', 'Alan')
        ->where('apellidos', 'Garcia')
        ->where('genero', 'MASCULINO')
        ->where('edad', 30)
        ->delete();
    }
};
