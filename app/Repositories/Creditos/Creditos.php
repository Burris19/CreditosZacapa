<?php

namespace App\Repositories\Creditos;

use Illuminate\Database\Eloquent\Model;

class Creditos extends Model
{
    protected $table = 'creditos';

    protected $fillable = [
        'codigo',
        'saldo',
        'idCliente',
    ];


}
