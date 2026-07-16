<?php

namespace App\Http\Controllers\afterlogin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\company;
use App\Models\vacancy;
use App\Models\applicant;
use Auth;

class jobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // for read job ..
        $vacancies = vacancy::where('user_id',Auth::id())->orderby('id','desc')->paginate(5);
        return view('afterlogin.jobs.jobs',compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('afterlogin.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'title' => 'required|string|max:255|min:3',
            'type' => 'required|string|in:Full-time,Part-time,Contract,Internship,Remote',
            'location' => 'required|string|max:255|min:2',
            'salary' => 'nullable|string|max:100',
            'skills' => 'required|string|min:5|max:500',
            'description' => 'required|string|min:50|max:5000',
            'requirements' => 'required|string|min:30|max:2000',
            'vacancies' => 'required|integer|min:1|max:100',
            'experience' => 'required|string|in:Entry Level,Mid Level,Senior Level,Executive'
        ]);
        // example  ...
        /* 
            vacancy::create($request->all());
        */        
        $vacancy = new vacancy;
        $vacancy->user_id = Auth::id();
        $vacancy->company_id = Auth::user()->company->id;
        $vacancy->title = $request->title;
        $vacancy->type = $request->type;
        $vacancy->location = $request->location;
        $vacancy->salary = $request->salary;
        $vacancy->skills = $request->skills;
        $vacancy->description = $request->description;
        $vacancy->requirements = $request->requirements;
        $vacancy->vacancies = $request->vacancies;
        $vacancy->experience = $request->experience;
        $vacancy->save();
        return redirect()->back()->with('success','Job Published Succesfully');
    }
    public function create_company(Request $request){
        try {
             $validate = $request->validate([
                'name' => 'required|min:6|max:15|unique:companies',
                'industry' => 'required',
                'website' => 'required',
                'size' => 'required',
                'address' => 'required',
                'email' => 'required|unique:companies',
                'contact' => 'required',
                'description' => 'required',
                'logo' => 'required|image|mimes:jpg,jpeg,png'
            ]);
            // checking if image is coming or not ..
           // echo time();
            if($request->hasFile('logo')){
                $imageName = time().".".$request->logo->getClientOriginalExtension(); /// new name of file ..
                $request->logo->storeAs('companies',$imageName,'public');
            }
             // laravel query builder ...
            $company = new company;
            $company->name = $request->name;
            $company->user_id = Auth::id();
            $company->industry = $request->industry;
            $company->website = $request->website;
            $company->size = $request->size;
            $company->address = $request->address;
            $company->email = $request->email;
            $company->phone = $request->contact;
            $company->description = $request->description;
            $company->logo = "companies/".$imageName;
            $company->save();
            return redirect()->back()->with('success','Company created Succesfully');
        } catch(\Exception $e){
                return redirect()->back()->with('warning',$e->getMessage());
        }
        // return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $vacancy = vacancy::find($id);
        return view('afterlogin.jobs.show',compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $vacancy = vacancy::find($id);
        return view('afterlogin.jobs.edit',compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         //
        $validated = $request->validate([
            'title' => 'required|string|max:255|min:3',
            'type' => 'required|string|in:Full-time,Part-time,Contract,Internship,Remote',
            'location' => 'required|string|max:255|min:2',
            'salary' => 'nullable|string|max:100',
            'skills' => 'required|string|min:5|max:500',
            'description' => 'required|string|min:50|max:5000',
            'requirements' => 'required|string|min:30|max:2000',
            'vacancies' => 'required|integer|min:1|max:100',
            'experience' => 'required|string|in:Entry Level,Mid Level,Senior Level,Executive'
        ]);
        // example  ...
        /* 
            vacancy::create($request->all());
        */        
        $vacancy = vacancy::find($id);
        $vacancy->user_id = Auth::id();
        $vacancy->company_id = Auth::user()->company->id;
        $vacancy->title = $request->title;
        $vacancy->type = $request->type;
        $vacancy->location = $request->location;
        $vacancy->salary = $request->salary;
        $vacancy->skills = $request->skills;
        $vacancy->description = $request->description;
        $vacancy->requirements = $request->requirements;
        $vacancy->vacancies = $request->vacancies;
        $vacancy->experience = $request->experience;
        $vacancy->status = $request->status;
        $vacancy->save();
        return redirect(route('jobs.index'))->with('success','Job Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function applicant_status(Request $request){
       // return $request;
        $applicant = applicant::find($request->applicant);
        $applicant->status = $request->status;
        $applicant->save();
        return redirect()->back()->with('success','Applicant Status Updated Succesfully');
    }
    public function destroy(string $id)
    {
        //
        $vacancy = vacancy::find($id);
        $vacancy->delete();
        return redirect()->back()->with('warning','Job Deleted Succesfully');
    }
}
