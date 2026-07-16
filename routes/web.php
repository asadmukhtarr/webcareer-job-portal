<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagesController; // import controller ..
use App\Http\Controllers\afterlogin\jobsController;
use App\Http\Controllers\afterlogin\pagesController as afterloginController;

// before login ..
Route::get('/',[pagesController::class,'welcome'])->name('welcome');
Route::get('/about',[pagesController::class,'about'])->name('about');
Route::get('/contact',[pagesController::class,'contact'])->name('contact');
Route::get('/services',[pagesController::class,'services'])->name('services');
Route::get('/companies',[pagesController::class,'companies'])->name('companies');
Route::get('/available-jobs',[pagesController::class,'jobs'])->name('client.jobs');
Route::get('/job/{id}',[pagesController::class,'show'])->name('show.jobz');


Auth::routes(); // authentication routes ..
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); // after login home page ..

// after login section ..
Route::middleware('auth')->group(function(){
    Route::get('/apply-job/{id}',[pagesController::class,'apply'])->name('apply.online');
    Route::get('/dashboard',[afterloginController::class,'dashboard'])->name('user.dashboard');
    Route::get('/profile',[afterloginController::class,'profile'])->name('user.profile');
    Route::post('/peronsol-information',[afterloginController::class,'personalinformation'])->name('personal.one');
    Route::post('/peronsol-information-two',[afterloginController::class,'personalinformation2'])->name('personal.two');
    Route::post('/peronsol-information-three',[afterloginController::class,'resume'])->name('personal.resume');
    Route::post('/social',[afterloginController::class,'social'])->name('personal.social');
    Route::get('/settings', [afterloginController::class,'settings'])->name('user.settings');
    Route::post('/change-password', [afterloginController::class,'changePassword'])->name('user.change.password');
    Route::get('/your-applied-jobs',[afterloginController::class,'yaj'])->name('user.yaj');
    Route::get('/withdraw/job/{id}',[afterloginController::class,'withdraw'])->name('withdraw.job');
    Route::resource('/jobs',jobsController::class);
    Route::post('/change/applicant/status',[jobsController::class,'applicant_status'])->name('applicant.status');
    Route::post('/create-company',[jobsController::class,'create_company'])->name('create.company');
});
// admin section routes ...

// for logout ..
Route::get('/logout',function(){
    Auth::logout();
    return redirect(route('welcome'));
})->name('user.logout');

