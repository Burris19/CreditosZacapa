<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Transaccion\TransaccionRepo;


class PdfController extends Controller
{

    protected $repo = null;

    public function __construct(TransaccionRepo $transaccionRepo)
    {
        $this->repo = $transaccionRepo;
    }

    public function transacciones (){
        $data = $this->repo->getWithRelations();
        return \PDF::loadView('pdf.reporte', compact('data'))->download('reporte_transacciones.pdf');

    }

}
