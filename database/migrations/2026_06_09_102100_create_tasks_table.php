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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Crea un 'id' INTEGER PRIMARY KEY AUTOINCREMENT
            
            // Relación OneToMany estricta con la tabla 'users'
            // foreignIdFor busca automáticamente el ID del modelo User.
            // constrained() activa la restricción de clave foránea
            // cascadeOnDelete() es opcional, pero si se borra un usuario, borra sus tareas.
            $table->foreignIdFor(\App\Models\User::class)
                  ->constrained()
                  ->cascadeOnDelete();
            
            $table->string('title'); // TEXT en SQLite
            $table->text('description')->nullable(); // TEXT que acepta nulos si se desea
            $table->boolean('completed')->default(false); // campo BOOLEAN (0 o 1 en SQLite)
            
            $table->timestamps(); // añade created_at y updated_at automáticamente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};