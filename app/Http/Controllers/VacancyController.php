<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\Applicant;
use App\Models\MasterCategory;
use App\Models\MasterJobPosition;
use App\Models\MasterType;
use \stdClass;

class VacancyController extends Controller
{
    public function indexJobVacancy()
    {
        $vacancies = Vacancy::orderBy('id','desc')->get();
        $category = MasterCategory::orderBy('id','desc')->get();
        $position = MasterJobPosition::orderBy('id','desc')->get();
        $type = MasterType::orderBy('id','desc')->get();

        return view('admin.vacancy.jobvacancy.index',compact(['vacancies','category','position','type']));
    }
    public function addJobVacancy(Request $request){
                $vacancy = new Vacancy;
                $vacancy->position = $request->position;
                $vacancy->category = $request->category;
                $vacancy->type = $request->type;
                $vacancy->active = true;
                $vacancy->end_date = $request->end_date;
                $vacancy->save();
                return back();
    }
    public function updateJobVacancy($id,Request $request){
                $vacancy = Vacancy::find($id);
                $vacancy->position = $request->position;
                $vacancy->category = $request->category;
                $vacancy->type = $request->type;
                $vacancy->active = $request->active == 0 ? false : true;
                $vacancy->end_date = $request->end_date;
                $vacancy->save();
                return back();
    }
    public function indexApplicant()
    {
        $applicant = Applicant::orderBy('id','desc')->get();

        return view('admin.vacancy.applicant.index',compact(['applicant']));
    }
    public function applyVacancy(Request $request){
            $cek_data =Applicant::where('email',$request->email)->first();
            if($cek_data){
                return response()->json([
                    'success' => false,
                    'message' => 'Email Sudah Terdaftar',
                ],400);            }
            else{
                $vacancy = new Applicant;
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
    public function getVacancyActive(){
        $vacancies = Vacancy::where('active',true)->orderBy('id','desc')->get();
        $data = [];
        $res_vacancy = [];

        foreach ($vacancies as $vacancies) {
            $data['id'] = $vacancies->id; 
            $data['job_position'] = $vacancies->masterPosition->position;
            $data['job_category'] = $vacancies->masterCategory->category;
            $data['job_type'] = $vacancies->masterType->type;
            $data['end_date'] = $vacancies->end_date; 
            array_push($res_vacancy, $data);
        }
        return response()->json([
            'success' => true,
            'message' => 'Berhasil',
            'data'    => $res_vacancy
        ],200);
    }
    public function getVacancyActiveDetail($id){
        $vacancy = Vacancy::where('id',$id)->first();
        
        $data = new \stdClass();;
            $data->id = $vacancy->id;
            $data->job_position= $vacancy->masterPosition->position;
            $data->job_category= $vacancy->masterCategory->category;
            $data->job_type = $vacancy->masterType->type;
            $data->end_date = $vacancy->end_date;
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil',
            'data'    => $data
        ],200);
    }
}
