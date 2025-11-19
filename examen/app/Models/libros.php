<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class libros extends Model
{
    protected $table = 'libros';

    protected $fillable = [
        'titulo',
        'anio_publicacion',
        'genero',
        'autor_id',
    ];
}
