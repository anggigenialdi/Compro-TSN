<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\MasterCategory;
use App\Models\MasterJobPosition;
use App\Models\MasterType;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class MasterDataController extends Controller
{
    public function indexPosition()
    {
        $dataJobPosition = MasterJobPosition::orderBy('id', 'desc')->get();

        return view('admin.master.position.index', compact(['dataJobPosition']));
    }
    public function indexCategory()
    {
        $dataCategory = MasterCategory::orderBy('id', 'desc')->get();

        return view('admin.master.category.index', compact(['dataCategory']));
    }
    public function indexType()
    {
        $dataType = MasterType::orderBy('id', 'desc')->get();

        return view('admin.master.type.index', compact(['dataType']));
    }

    public function createPosition(Request $request)
    {
        try {
            //Cek Duplicate data
            $duplicate = MasterJobPosition::where('position', $request->input('position'))->first();

            if ($duplicate) {
                Toastr::warning('Duplicate data', 'Warning');
                return back();
            } else {

                $saveData = new MasterJobPosition;
                $saveData->position = $request->input('position');
                $saveData->uuid = Uuid::uuid4()->getHex();
                $saveData->save();

                Toastr::success('Data added successfully', 'Success');
                return back();
            }
        } catch (\Throwable $th) {
            //return error message
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function updatePosition(Request $request, $id)
    {
        try {

            $updateData = MasterJobPosition::find($id);
            $updateData->position = $request->input('position');
            $updateData->save();

            Toastr::success('Data update successfully', 'Success');
            return back();
        } catch (\Throwable $th) {
            //return error message
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function createCategory(Request $request)
    {
        try {
            //Cek Duplicate data
            $duplicate = MasterCategory::where('category', $request->input('category'))->first();

            if ($duplicate) {
                Toastr::warning('Data duplicate', 'Warning');
                return back();
            } else {

                $saveData = new MasterCategory();
                $saveData->category = $request->input('category');
                $saveData->uuid = Uuid::uuid4()->getHex();
                $saveData->save();

                Toastr::success('Data added successfully', 'Success');
                return back();
            }
        } catch (\Throwable $th) {
            //return error message
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function updateCategory(Request $request, $id)
    {
        try {

            $updateData = MasterCategory::find($id);
            $updateData->category = $request->input('category');
            $updateData->save();

            Toastr::success('Data update successfully', 'Success');
            return back();
        } catch (\Throwable $th) {
            //return error message
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function createType(Request $request)
    {
        try {
            //Cek Duplicate data
            $duplicate = MasterType::where('type', $request->input('type'))->first();

            if ($duplicate) {
                Toastr::warning('Data duplicate', 'Warning');
                return back();
            } else {

                $saveData = new MasterType();
                $saveData->type = $request->input('type');
                $saveData->uuid = Uuid::uuid4()->getHex();
                $saveData->save();

                Toastr::success('Data update successfully', 'Success');
                return back();
            }
        } catch (\Throwable $th) {
            //return error message
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function updateType(Request $request, $id)
    {
        try {

            $updateData = MasterType::find($id);
            $updateData->type = $request->input('type');
            $updateData->save();

            Toastr::success('Data update successfully', 'Success');
            return back();
        } catch (\Throwable $th) {
            //return error message
            return response()->json([
                'success' => false,
                'message' => $th
            ], 409);
        }
    }

    public function autocompletePosition(Request $request)
    {
        $datas = MasterJobPosition::select('id', 'position')
            ->where('position', 'LIKE', "%{$request->terms}%")
            ->pluck('position');

        return response()->json($datas);
    }

    public function autocompleteType(Request $request)
    {
        $datas = MasterType::select('id', 'type')
            ->where('type', 'LIKE', "%{$request->terms}%")
            ->pluck('type');

        return response()->json($datas);
    }
}
