<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\Fillable;

// hardening: Evita la inyección de campos no autorizados (Mass Assignment)
#[Fillable(['user_id', 'title', 'description', 'completed'])]
class Task extends Model
{
    use HasFactory;

    /**
     * Relación: Una Tarea pertenece a un Usuario 
     * Esto lo usará TaskPolicy para verificar el propietario.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}