<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\MasterJobPosition;
use App\Models\MasterType;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function employeeIndex()
    {
        $dataEmployee = Employee::orderBy('id','desc')->get();
        $position = MasterJobPosition::orderBy('id','desc')->get();
        $type = MasterType::orderBy('id','desc')->get();

        return view('admin.employee.index',compact(['dataEmployee', 'position', 'type']));
    }

    public function employeeCreate(Request $request)
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
                $saveData->type = $request->input('type');

                if ($request->file('profile_picture')) {
                    $file = $request->file('profile_picture');
                    $filename = date('YmdHi') . $file->getClientOriginalName();
                    $file->move(public_path('employee'), $filename);
                    $data['profile_picture'] = $filename;
                }

                $saveData->profile_picture = $filename;

                $saveData->save();

                return back()->with(session()->flash('success', 'Data Berhasil Diinput'));

            }
        } catch (\Throwable $th) {
            //return error message
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function employeeUpdate(Request $request, $id)
    {
        try {

            $updateDatas = Employee::where('id', $id);

            $updateDatas->update([
                'full_name' => request('full_name'),
                'job_position' => request('job_position'),
                'type' => request('type'),
            ]);


            return back()->with(session()->flash('success', 'Update data berhasil'));
        } catch (\Throwable $th) {
            //return error message
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }
}
