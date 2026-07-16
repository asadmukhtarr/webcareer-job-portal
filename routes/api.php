<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\vacancy;
use App\Http\Controllers\API\AuthController;
Route::post("/register",[AuthController::class,'register']);
Route::post("/login",[AuthController::class,'login']);
Route::get('/vacancies', function () {
    try {
        $data = [
            'message' => 'Vacancies fetched successfully',
            'status' => 'success',
            'vacancies' => vacancy::all(),
            'code' => 200
        ];
        return response()->json($data, 200);
    } catch(Exception $e){
        return response()->json([
            'message' => 'Failed to fetch vacancies',
            'status' => 'error',
            'code' => 500,
            'error' => $e->getMessage()
        ], 500);
    }
});
Route::get('/vacancy/{id}',function($id){
    try {
         $vacancy = vacancy::find($id);
        return response()->json([
            'message' => 'Single Job Fetched Succesfully',
            'status'  => 'success',
            'code'    => 200,
            'vacancy' => $vacancy
        ]);
    } catch(Exception $e) {
         return response()->json([
            'message' => 'Failed to fetch vacancy',
            'status' => 'error',
            'code' => 500,
            'error' => $e->getMessage()
        ], 500);
    }
});

