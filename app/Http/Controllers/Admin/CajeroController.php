<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Cajero\CajeroRepo;
use App\Repositories\Sucursales\SucursalRepo;

class CajeroController extends CRUDController
{
    protected $module='cajeros';
    protected $sucursalRepo=null;

    public  function __construct(CajeroRepo $cajeroRepo,
                                 SucursalRepo  $sucursalRepo)
    {
        $this->repo=$cajeroRepo;
        $this->sucursalRepo=$sucursalRepo;
    }

    public function index()
    {
        $data=$this->repo->getWithRelations();
        $sucursal = $this->sucursalRepo->lists('nombre','id');
        return view($this->root . '/' . $this->module  .'/list',compact('data','sucursal'));
    }


}
