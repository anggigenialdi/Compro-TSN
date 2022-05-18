<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $dataProduct = Product::orderBy('id', 'desc')->get();

        return $dataProduct;
    }
    public function indexProduct(Request $request)
    {
        $dataProduct = Product::orderBy('id', 'desc')->get();

        return view('admin.products.index', compact(['dataProduct']));
    }
    public function createProduct(Request $request)
    {
        //validate incoming request 
        $this->validate($request, [
            'title'  => 'required|string',
            'description' => 'required|string',
            // 'product_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            //Cek Duplicate data
            $duplicate = Product::where('title', $request->input('title'))->first();

            if ($duplicate) {
                Toastr::warning('Titel has taken', 'Warning');
                return back();
            } else {

                $saveData = new Product;
                $saveData->title = $request->input('title');
                $saveData->description = $request->input('description');

                if ($request->hasfile('product_picture')) {
                    $files = [];

                    foreach ($request->file('product_picture') as $file) {
                        $name = time() . rand(1, 100) . $file->extension();
                        $file->move(public_path('products'), $name);
                        array_push($files, $name);
                    }
                    $saveData->product_picture = implode(',', $files);
                }
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

    public function updateProduct(Request $request, $id)
    {
        try {
            $updateDatas = Product::where('id', $id)->first();
            $updateDatas->title = $request->input('title');
            $updateDatas->description = $request->input('description');

            if (request()->hasFile('product_picture') && request('product_picture') != '') {
                $imagePath = public_path('products/' . $updateDatas->product_picture);
                if (File::exists($imagePath)) {
                    unlink($imagePath);
                }
                if ($request->hasfile('product_picture')) {
                    foreach ($request->file('product_picture') as $file) {
                        $name = time() . rand(1, 100) . $file->extension();
                        $file->move(public_path('products'), $name);
                        $files[] = $name;
                    }
                }
                $updateDatas->product_picture = implode(',', $files);
            }
            // dd($updateDatas);

            $updateDatas->save();
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
}
