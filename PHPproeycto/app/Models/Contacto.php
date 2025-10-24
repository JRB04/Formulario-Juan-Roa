<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    // Campos permitidos para la asignación masiva (guardado)
    protected $fillable = [
        'nombre',
        'correo',
        'numero',
        'asunto',
    ];
}