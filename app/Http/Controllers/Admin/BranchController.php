<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BranchController extends CRUDController
{
    protected $module = 'branch';

    function __construct(CityRepo $cityRepo)
    {
        $this->repo = $cityRepo;
    }

    public function getCities($id)
    {
        $data = $this->repo->getModel()->where('id_department',$id)->get();
        return $data->lists('description','id');
    }
}
