<?php

namespace App\Repositories\Sucursales;

use Illuminate\Database\Eloquent\Model;

class Sucursales extends Model
{
    protected $table = 'sucursales';

    protected $fillable = [
        'idBranch',
        'nombre',
        'direccion',
        'telefono'
    ];

    public $relations = [
        'branch',
        'cajero'
    ];

    public function branch()
    {
        return $this->hasOne('App\Repositories\Host\Host', 'id','idHost');
    }

    public function cajero()
    {
        return $this->hasMany('App\Repositories\Cajeros\Cajero','idSucursal','id');
    }
}
