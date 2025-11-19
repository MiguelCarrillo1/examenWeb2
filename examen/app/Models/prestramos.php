<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prestramos extends Model
{
    //
    protected $table = 'prestramos';
    protected $fillable = [
        'nombre',
        'fecha_prestamo',
        'fecha_devolucion',
        'libro_id',
    ];
}


