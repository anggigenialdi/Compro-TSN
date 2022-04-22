<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;
class VacancyController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::orderBy('id','desc')->get();

        return view('admin.vacancy.index',compact(['vacancies']));
    }
    public function addVacancy(Request $request){
            $cek_data =Vacancy::where('email',$request->email)->first();
            if($cek_data){
                return response()->json([
                    'success' => false,
                    'message' => 'Email Sudah Terdaftar',
                ],400);            }
            else{
                $vacancy = new Vacancy;
                $vacancy->full_name = $request->full_name;
                $vacancy->email = $request->email;
                $vacancy->phone_number = $request->phone_number;
                $vacancy->job_position = $request->job_position;
                $vacancy->work_experience = $request->work_experience;
                $vacancy->link_linkedin = $request->link_linkedin;
                $vacancy->link_portfolio = $request->link_portfolio;
        
                if($request->hasFile('file_resume')){
                    $file = $request->file('file_resume');
                    $filename = time().'.'.$file->getClientOriginalExtension();
                    $destinationpath = public_path('/resume');
                    $file->move($destinationpath,$filename);
                    $vacancy->file_resume = $filename;
                }
                $vacancy->save();
                return response()->json([
                    'success' => true,
                    'message' => 'Berhasil',
                    'data'    => $vacancy
                ],200);
            }
    }
}
