<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Cliente\ClienteRepo;

class ClientesController extends CRUDController
{

    protected $module='clientes';

    function __construct(ClienteRepo $clienteRepo)
    {
        $this->repo=$clienteRepo;
    }

}
