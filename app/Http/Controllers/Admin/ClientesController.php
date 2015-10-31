<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Clientes\ClienteRepo;

class ClientesController extends CRUDController
{

    protected $module='clientes';

    function __construct(ClienteRepo $clientesRepo)
    {
        $this->repo=$clientesRepo;
    }

}
