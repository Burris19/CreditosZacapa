<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Clientes\ClienteRepo;
use App\Repositories\Creditos\CreditoRepo;
use App\Repositories\Cuotas\CuotaRepo;
use App\Repositories\Branch\BranchRepo;
use App\Repositories\Transaccion\TransaccionRepo;
use App\Repositories\MovimientoLeer\MovimientosRepo;
use Carbon\Carbon;

class ClientesController extends CRUDController
{
    protected $rules = [
        'codigo' => 'required|unique:clientes',
        'dpi' => 'required',
        'nit' => 'required',
        'nombre' => 'required',
        'apellido' => 'required',
        'fechaNacimiento' => 'required'
    ];

    protected $rulesCredito = [
        'codigo' => 'required|unique:creditos',
        'saldo' => 'required',
        'idCliente' => 'required'
    ];

    protected $module='clientes';
    protected $creditoRepo = null;
    protected $cuotaRepo = null;
    protected $transaccionRepo = null;
    protected $movimientosRepo = null;
    protected $branchRepo = null;


    function __construct(ClienteRepo $clientesRepo,
                         CreditoRepo $creditoRepo,
                         CuotaRepo $cuotaRepo,
                         TransaccionRepo $transaccionRepo,
                         MovimientosRepo $movimientosRepo, BranchRepo $branchRepo)
    {
        $this->repo=$clientesRepo;
        $this->creditoRepo = $creditoRepo;
        $this->cuotaRepo = $cuotaRepo;
        $this->transaccionRepo = $transaccionRepo;
        $this->movimientosRepo = $movimientosRepo;
        $this->branchRepo = $branchRepo;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $dataCredit['codigo'] = $data['codigo'];
        $dataCredit['saldo'] = ( $data['cuota'] * $data['noCuotas'] );
        $dataCredit['interes'] = $data['interes'];
        $dataCredit['no_cuotas'] = $data['noCuotas'];
        $validator = \Validator::make($data,$this->rules);
        $fechaPago = Carbon::now();
        $success = true;
        $message = "Registro guardado exitosamente";
        if ($validator->passes())
        {
            $client = $this->repo->create($data);
            $dataCredit['idCliente'] = $client->id;
            $validator = \Validator::make($dataCredit,$this->rulesCredito);
            if ($validator->passes())
            {
                $credit = $this->creditoRepo->create($dataCredit);

                for( $i =1; $i <= $data['noCuotas'] ; $i++)
                {
                    $dataCuota['idCredito'] = $credit->id;
                    $dataCuota['montoCuota'] = $data['cuota'];
                    $dataCuota['fechaPago'] = $fechaPago->addMonth();
                    $dataCuota['estado'] = 'Activa';
                    $dataCuota['balance'] = $data['cuota'];
                    $this->cuotaRepo->create($dataCuota);
                }

                $transaction['code'] = 'tr' + time() ;
                $transaction['tipoTransaccion'] = 'credito';
                $transaction['monto'] = ( $data['cuota'] * $data['noCuotas'] );
                $transaction['descripcion'] = 'Credito';
                $transaction['estado'] = 'registrado';
                $transaction['idCajero'] = null;
                $transaction['idCredito'] = $credit->id;
                $transaction['idTipoMoneda'] = 1;

                $trans = $this->transaccionRepo->create($transaction);

                $branch = $this->branchRepo->getAll();

                foreach($branch as $key => $value)
                {
                    $movimiento['idBranch'] = $value->id;
                    $movimiento['idCliente'] = $client->id;
                    $movimiento['idCredito'] = $credit->id;
                    $movimiento['saldo'] = $credit->saldo;
                    $movimiento['idTransaccion'] = $trans->id ;
                    $this->movimientosRepo->create($movimiento);
                }


                return compact('success','message','record','data');

            }else{
                $success=false;
                $message = $validator->messages();
                return compact('success','message','record','data');
            }


        }else{
            $success=false;
            $message = $validator->messages();
            return compact('success','message','record','data');
       }


    }

    public function show(Request $request, $id)
    {
        $credit = $this->creditoRepo->findByField('idCliente',$id);
        $data = $this->creditoRepo->findWithRelations($credit->id);
        return view($this->root . '/' . $this->module .'/showCuotas',compact('data'));

    }
}

