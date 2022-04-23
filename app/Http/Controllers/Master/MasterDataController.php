<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\MasterCategory;
use App\Models\MasterJobPosition;
use App\Models\MasterType;
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
                return response()->json([
                    'success' => false,
                    'message' => 'Data Duplikat',
                ], 425);
            } else {

                $saveData = new MasterJobPosition;
                $saveData->position = $request->input('position');
                $saveData->uuid = Uuid::uuid4()->getHex();
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

    public function updatePosition(Request $request, $id)
    {
        try {
            
            $updateData = MasterJobPosition::find($id);
            $updateData->position = $request->input('position');
            $updateData->save();

            return back()->with(session()->flash('success', 'Update data berhasil'));
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
                return response()->json([
                    'success' => false,
                    'message' => 'Data Duplikat',
                ], 425);
            } else {

                $saveData = new MasterCategory();
                $saveData->category = $request->input('category');
                $saveData->uuid = Uuid::uuid4()->getHex();
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

    public function updateCategory(Request $request, $id)
    {
        try {
            
            $updateData = MasterCategory::find($id);
            $updateData->category = $request->input('category');
            $updateData->save();

            return back()->with(session()->flash('success', 'Update data berhasil'));
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
                return response()->json([
                    'success' => false,
                    'message' => 'Data Duplikat',
                ], 425);
            } else {

                $saveData = new MasterType();
                $saveData->type = $request->input('type');
                $saveData->uuid = Uuid::uuid4()->getHex();
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

    public function updateType(Request $request, $id)
    {
        try {
            
            $updateData = MasterType::find($id);
            $updateData->type = $request->input('type');
            $updateData->save();

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
