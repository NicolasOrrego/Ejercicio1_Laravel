<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombreIndicador',
        'codigoIndicador',
        'unidadMedidaIndicador',
        'valorIndicador',
        'fechaIndicador',
        'tiempoIndicador',
        'origenIndicador'
    ];

    public $timestamps = false;
}