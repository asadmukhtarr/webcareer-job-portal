<?php

namespace App\Http\Controllers\afterlogin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\applicant;
use App\Models\profile;

class pagesController extends Controller
{
    // method for dashboard ..
    public function dashboard(){
        $applications = Auth::user()->applicants;
        return view("afterlogin.dashboard",compact('applications'));
    }
    // method for profile ..
    public function profile(){
        return view("afterlogin.profile");
    }
    // settings ...
    public function settings(){
        return view("afterlogin.settings");
    }
    // your applied jobs 
    public function yaj(){
        $jobs = Auth::user()->applicants;
        $interview = Auth::user()->applicants->where('status',1)->count();
        $hired = Auth::user()->applicants->where('status',2)->count();
        return view("afterlogin.yaj",compact('jobs','interview','hired'));
    }
    public function withdraw($id){
        $applicant = applicant::find($id);
        $applicant->delete();
        return redirect()->back('warning','Withdrawn successfully!');
    }
    public function personalinformation2(Request $request){
    $validated = $request->validate([
        'headline' => 'required|string|max:255|min:3',
        'description' => 'required|string|max:2000|min:10',
        'current_position' => 'required|string|max:255|min:2',
        'experience_level' => 'required|in:entry,mid,senior,executive',
        'skills' => 'required|string|max:1000|min:2'
    ]);
    
    $profile = Auth::user()->profile;
    if(empty($profile)){
        $profile = new profile;
        $profile->user_id = Auth::id();
        $profile->headline = $request->headline;
        $profile->about = $request->description;
        $profile->current_position = $request->current_position;
        $profile->experience_level = $request->experience_level;
        $profile->skills = $request->skills;
        $profile->save();
    } else {
        $profile->headline = $request->headline;
        $profile->about = $request->description;
        $profile->current_position = $request->current_position;
        $profile->experience_level = $request->experience_level;
        $profile->skills = $request->skills;
        $profile->save();
//        $profile = profile::Create($request->all());
    }
    
    return redirect()->back()->with('success', 'Professional information updated successfully!');
}

public function social(Request $request){
    $validated = $request->validate([
        'linkedin' => 'required|url|max:255',
        'github' => 'required|url|max:255',
        'twitter' => 'required|url|max:255',
        'website' => 'required|url|max:255'
    ]);
    
    $profile = Auth::user()->profile;
    if(empty($profile)){
        $profile = new profile;
        $profile->user_id = Auth::id();
        $profile->linkedn = $request->linkedin;
        $profile->github = $request->github;
        $profile->twitter = $request->twitter;
        $profile->website = $request->website;
        $profile->save();
    } else {
        $profile->linkedn = $request->linkedin;
        $profile->github = $request->github;
        $profile->twitter = $request->twitter;
        $profile->website = $request->website;
        $profile->save();
    }
    
    return redirect()->back()->with('success', 'Social links updated successfully!');
}

    public function resume(Request $request){
        $validated = $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx|max:5120' // 5MB max
        ]);
       // return $request;
        // Upload logic here
        $resumeName = time().'.'.$request->resume->getClientOriginalExtension();
        $request->resume->storeAs('resume',$resumeName,'public');
        $profile = Auth::user()->profile;
    if(empty($profile)){
        $profile = new profile;
        $profile->user_id = Auth::id();
        $profile->resume = "resume/".$resumeName;
        $profile->save();
    } else {
        $profile->resume = "resume/".$resumeName;
        $profile->save();
    }
        return redirect()->back()->with('success', 'Resume uploaded successfully!');
    }
    public function changePassword(Request $request){
        $validated = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);
        
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return redirect()->back()->with('warning', 'Current password is incorrect!');
        }
        
        Auth::user()->update([
            'password' => Hash::make($request->new_password)
        ]);
        
        return redirect()->back()->with('success', 'Password changed successfully!');
    }
}
