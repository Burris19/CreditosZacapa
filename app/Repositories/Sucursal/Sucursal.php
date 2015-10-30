<?php

namespace App\Repositories\Sucursal;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursales';

    protected $fillable = [
        'idBranch',
        'nombre',
        'direccion',
        'telefono'
    ];

    public $relations = [
        'branch'
    ];

    public function relations()
    {
        return $this->hasOne('App\Repositories\Host\Host', 'id','idHost');
    }
}
