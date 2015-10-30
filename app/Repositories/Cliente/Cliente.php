<?php

namespace App\Repositories\Cliente;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'codigo',
        'dpi',
        'nit',
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'edad'
    ];


}
