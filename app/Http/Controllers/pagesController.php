<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vacancy;
use App\Models\applicant;
use Auth;

class pagesController extends Controller
{
    //
    public function welcome(){
        return view('welcome');
    }
    // about 
    public function about(){
        return view('about');
    }
    // contact ..
    public function contact(){
        return view('contact');
    }
    // services
    public function services(){
        return view('services');
    }
    // companies 
    public function companies(){
        return view('companies');
    }
    // jobs view method ..
    public function jobs(){
        $vacancies = vacancy::orderby('id','desc')->where('status',0)->get();
        return view('jobs.jobs',compact('vacancies'));
    }
    public function show($id){
        $vacancy = vacancy::find($id);
        $vacancy->increment('views');
        return view('jobs.single',compact('vacancy'));
    }
    public function apply($id){
        // Method # 1 ..
        // if(Auth::check()){
        //         $vacancy = vacancy::find($id);
        //         return $vacancy;
        // } else {
        //     return redirect(route('login'));
        // }
        // Method # 2 :
        $applicant = new applicant();
        $applicant->vacancy_id = $id;
        $applicant->user_id = Auth::user()->id;
        $applicant->save();
        return redirect()->back()->with('success','Succesfully Applied For Job');

    }
}
