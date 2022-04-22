<?php

namespace App\Http\Controllers\Master\JobPosition;

use App\Http\Controllers\Controller;
use App\Models\MasterJobPosition;
use Illuminate\Http\Request;

class MasterJobPositionController extends Controller
{
    public function index()
    {
        $dataJobPosition = MasterJobPosition::orderBy('id','desc')->get();

        return view('admin.job-position.index',compact(['dataJobPosition']));
    }
}
