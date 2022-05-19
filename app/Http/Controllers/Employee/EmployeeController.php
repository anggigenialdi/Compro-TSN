<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\MasterJobPosition;
use App\Models\MasterType;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use SerializesModels;

class EmployeeController extends Controller
{
    public function employeeIndex()
    {
        $dataEmployee = Employee::orderBy('id', 'desc')->get();
        $position = MasterJobPosition::orderBy('id', 'desc')->get();
        $type = MasterType::orderBy('id', 'desc')->get();

        return view('admin.employee.index', compact(['dataEmployee', 'position', 'type']));
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
            $duplicate = Employee::where('id', $request->input('id'))->first();

            if ($duplicate) {
                Toastr::warning('Position has taken','Warning');
                return back();
            } else {
                $saveData = new Employee;
                $saveData->full_name = $request->input('full_name');
                $saveData->job_position = $request->input('job_position');
                $saveData->type = $request->input('type');

                if ($request->file('profile_picture')) {
                    $file = $request->file('profile_picture');
                    $extension = $file->extension();
                    $filename = 'employee'. time() . rand(1, 100)  . $extension;
                    $file->move(public_path('employee'), $filename);
                    $saveData->profile_picture = $filename;
                }

                $saveData->profile_picture = $filename;

                $saveData->save();

                Toastr::success('Data added successfully','Success');
                return back();
            }
        } catch (\Throwable $th) {
            //return error message
            Toastr::error($th,'Error');
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function employeeUpdate(Request $request, $id)
    {
        try {
            $updateDatas = Employee::where('id', $id)->first();
            $updateDatas->full_name = $request->input('full_name');
            $updateDatas->job_position = $request->input('job_position');
            $updateDatas->type = $request->input('type');

            if (request()->hasFile('profile_picture') && request('profile_picture') != '') {
                $imagePath = public_path('employee/' . $updateDatas->profile_picture);
                if (File::exists($imagePath)) {
                    unlink($imagePath);
                }
                $file = $request->file('profile_picture');
                $extension = $file->extension();
                $filename = 'employee'. time() . rand(1, 100)  . $extension;
                $file->move(public_path('employee'), $filename);
                $updateDatas->profile_picture = $filename;
            }

            $updateDatas->save();
            Toastr::success('Data update successfully','Success');
            return back();

        } catch (\Throwable $th) {
            //return error message
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function getAllEmployee()
    {
        try {
            $dataEmployee = Employee::orderBy('id', 'desc')->get();
            
            $data = [];
            $data_employee = [];
            
            $no = 0;
            foreach ($dataEmployee as $employee) {
                $no++;
                $data['id'] = $employee->id;
                $data['full_name'] = $employee->full_name;
                $data['position'] = $employee->masterJobPosition->position;
                $data['type'] = $employee->masterType->type;
                $data['picture'] = $employee->profile_picture;
                array_push($data_employee, $data);
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
                'data'    => $data_employee
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th,
            ], 409);
        }
    }
    public function getAllEmployeeByType($id)
    {
        try {
            $dataEmployee = Employee::where('type',$id)->orderBy('id', 'desc')->get();
            
            $data = [];
            $data_employee = [];
            
            $no = 0;
            foreach ($dataEmployee as $employee) {
                $no++;
                $data['id'] = $employee->id;
                $data['full_name'] = $employee->full_name;
                $data['position'] = $employee->masterJobPosition->position;
                $data['type'] = $employee->masterType->type;
                $data['picture'] = $employee->profile_picture;
                array_push($data_employee, $data);
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
                'data'    => $data
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th,
            ], 409);
        }
    }
    public function getAllType()
    {
        try {
            $type = MasterType::orderBy('id', 'desc')->get();
        
            return response()->json([
                'success' => true,
                'message' => 'Berhasil',
                'data'    => $type
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th,
            ], 409);
        }
    }
}
