<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/CategoriesAvg',[JobController::class,'CategoryAVG']);
Route::get('/TagSalaryAvg',[JobController::class,'SalaryTagsAVG']);
Route::get('/JobCategories',[JobController::class,'JobCategories']);
Route::get('/JobTags',[JobController::class,'JobTags']);
Route::get('/TotalTrabajos',[JobController::class,'TotalTrabajos']);
Route::get('/Wages',[JobController::class,'Wages']);
Route::get('/LatestWorks',[JobController::class,'LatestWorks']);
Route::get('/LatestCategories',[JobController::class,'LatestCategories']);
Route::get('/LatestTags',[JobController::class,'LatestTags']);
