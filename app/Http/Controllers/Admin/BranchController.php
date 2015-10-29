<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Branch\BranchRepo;

class BranchController extends CRUDController
{
    protected $module = 'branch';

    protected $repo = null;

    function __construct(BranchRepo $branchRepo)
    {
        $this->repo = $branchRepo;
    }

}
