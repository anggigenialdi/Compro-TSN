<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $dataEmployee = Employee::orderBy('id','desc')->get();

        return view('admin.employee.index',compact(['dataEmployee']));
    }

    public function create(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'full_name'  => 'required|string',
            'job_position' => 'required|string',
            // 'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            //Cek Duplicate data
            $duplicate = Employee::where('job_position', $request->input('job_position'))->first();

            if ($duplicate) {
                return response()->json([
                    'success' => false,
                    'message' => 'Posisi pekerjaan sudah diisi',
                ], 425);
            } else {

                $saveData = new Employee;
                $saveData->full_name = $request->input('full_name');
                $saveData->job_position = $request->input('job_position');

                if ($request->file('profile_picture')) {
                    $file = $request->file('profile_picture');
                    $filename = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('employee'), $filename);
                    $data['profile_picture'] = $filename;
                }

                $saveData->profile_picture = $filename;

                $saveData->save();

                // return response()->json([
                //     'success' => true,
                //     'message' => 'Input Data Berhasil',
                //     'data'    => $saveData,
                // ], 201);
                return redirect('employee.create')->with( session()->flash('success', 'Berhasil') );

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
