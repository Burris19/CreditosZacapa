<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Transaccion\TransaccionRepo;
class TransaccionesController extends Controller
{

    protected $module = 'transacciones';
    protected $repo = null;

    public function __construct(TransaccionRepo $transaccionRepo)
    {
        $this->repo = $transaccionRepo;
    }


    public function index()
    {
        $data = $this->repo->getWithRelations();
        return view('admin/transacciones/list',compact('data'));
    }

}
