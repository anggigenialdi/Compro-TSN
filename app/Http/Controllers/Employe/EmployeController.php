<?php

namespace App\Http\Controllers\Employe;

use App\Http\Controllers\Controller;
use App\Models\Employe;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function create()
    {

        return view('employe.create');
    }
    public function store(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'full_name'  => 'required|string',
            'job_position' => 'required|string',
            // 'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            //Cek Duplicate data
            $duplicate = Employe::where('job_position', $request->input('job_position'))->first();

            if ($duplicate) {
                return response()->json([
                    'success' => false,
                    'message' => 'Posisi pekerjaan sudah diisi',
                ], 425);
            } else {

                $saveData = new Employe;
                $saveData->full_name = $request->input('full_name');
                $saveData->job_position = $request->input('job_position');

                if ($request->file('profile_picture')) {
                    $file = $request->file('profile_picture');
                    $filename = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('employe'), $filename);
                    $data['profile_picture'] = $filename;
                }

                $saveData->profile_picture = $filename;

                $saveData->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Input Data Berhasil',
                    'data'    => $saveData,
                ], 201);
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
