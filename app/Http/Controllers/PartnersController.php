<?php

namespace App\Http\Controllers;

use App\Models\Partners;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PartnersController extends Controller
{
    public function indexPartners(Request $request)
    {
        $dataPartners = Partners::orderBy('id', 'desc')->get();

        return view('admin.partners.index', compact(['dataPartners']));
    }

    public function createPartners(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'name'  => 'required|string',
            // 'product_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            //Cek Duplicate data
            $duplicate = Partners::where('name', $request->input('name'))->first();

            if ($duplicate) {
                Toastr::warning('Duplicate Comppany Name', 'Warning');
                return back();
            } else {

                $saveData = new Partners;
                $saveData->name = $request->input('name');

                if ($request->file('picture')) {
                    $file = $request->file('picture');
                    $filename = time() . rand(1, 100) . $file->extension();
                    $file->move(public_path('partners'), $filename);
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


    public function updatePartners(Request $request, $id)
    {
        try {
            $updateDatas = Partners::where('id', $id)->first();
            $updateDatas->name = $request->input('name');

            if (request()->hasFile('picture') && request('picture') != '') {
                $imagePath = public_path('partners/' . $updateDatas->picture);
                if (File::exists($imagePath)) {
                    unlink($imagePath);
                }
                $file = $request->file('picture');
                $extension = $file->extension();
                $filename =  time() . rand(1, 100)  . $extension;
                $file->move(public_path('partners'), $filename);
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
