<?php

namespace App\Http\Controllers;

use App\Models\OurPrograms;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class OurProgramsController extends Controller
{
    //
    public function indexPrograms(Request $request)
    {
        $dataPrograms = OurPrograms::orderBy('id', 'desc')->get();

        return view('admin.programs.index', compact(['dataPrograms']));
    }

    public function createPrograms(Request $request)
    {
        try {
            //Cek Duplicate data
            $duplicate = OurPrograms::where('link', $request->input('link'))->first();

            if ($duplicate) {
                Toastr::warning('Duplicate Comppany Name', 'Warning');
                return back();
            } else {

                $saveData = new OurPrograms;
                $saveData->title = $request->title;
                $saveData->description = $request->description;
                $saveData->link = $request->link;


                if ($request->file('picture')) {
                    $file = $request->file('picture');
                    $filename = 'OurPrograms'. time() . rand(1, 100). $file->extension();
                    $file->move(public_path('OurPrograms'), $filename);
                    $data['picture'] = $filename;
                }
                $saveData->picture = $filename;
                // dd($saveData);

                $saveData->save();

                Toastr::success('Data added successfully', 'Success');
                return back();
            }
        } catch (\Throwable $th) {
            //return error message
            dd($th);
            return response()->json([
                'success' => false,
                'message' => $th->message,
            ], 409);
        }
    }

    public function updatePrograms(Request $request, $id)
    {
        try {
            $updateDatas = OurPrograms::where('id', $id)->first();
            $updateDatas->title = $request->title;
            $updateDatas->description = $request->description;
            $updateDatas->link = $request->link;
            
            if (request()->hasFile('picture') && request('picture') != '') {
                $imagePath = public_path('OurPrograms/' . $updateDatas->picture);
                if (File::exists($imagePath)) {
                    unlink($imagePath);
                }
                $file = $request->file('picture');
                $extension = $file->extension();
                $filename = 'OurPrograms'. time() . rand(1, 100)  . $extension;
                $file->move(public_path('OurPrograms'), $filename);
                $updateDatas->picture = $filename;
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
}
