<?php

namespace App\Repositories\Cajeros;

use Illuminate\Database\Eloquent\Model;

class Cajero extends Model
{
    protected $table = 'cajeros';

    protected $fillable = [
        'code',
        'nombre',
        'direccion',
        'fecha',
        'idSucursal'
    ];


}
