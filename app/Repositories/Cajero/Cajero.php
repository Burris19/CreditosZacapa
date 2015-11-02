<?php

namespace App\Repositories\Cajero;

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

    public $relations = [
        'sucursal'
    ];

    public function sucursal()
    {
        return $this->hasOne('App\Repositories\Sucursales\Sucursales', 'id','idSucursal');
    }


}
