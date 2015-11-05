<?php

namespace App\Repositories\Host;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    protected $table = 'host';
    protected $fillable = [
        'nombre',
        'direccion'
    ];


}
