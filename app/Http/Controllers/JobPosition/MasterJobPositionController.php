<?php

namespace App\Http\Controllers\JobPosition;

use App\Http\Controllers\Controller;
use App\Models\MasterJobPosition;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class MasterJobPositionController extends Controller
{
    public function index()
    {
        $dataJobPosition = MasterJobPosition::orderBy('id','desc')->get();

        return view('admin.position.index',compact(['dataJobPosition']));
    }

    public function create(Request $request)
    {
        try {
            //Cek Duplicate data
            $duplicate = MasterJobPosition::where('position', $request->input('position'))->first();

            if ($duplicate) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Duplikat',
                ], 425);
            } else {

                $saveData = new MasterJobPosition;
                $saveData->position = $request->input('position');
                $saveData->category = $request->input('category');
                $saveData->uuid = Uuid::uuid4()->getHex();
                $saveData->save();

                return redirect('/api/v1/job-positions');

            }
        } catch (\Throwable $th) {
            //return error message
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }
}
