<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;

Route::get('/', [JobController::class, 'index'])->name('jobs.index');

Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('category/{category}', [JobController::class, 'category'])->name('jobs.category');

Route::get('tags/{tag}', [JobController::class, 'tag'])->name('jobs.tag');

Route::get('admin/dashboard',[ConsultaController::class, 'index']);

Route::get('messages/{message}', [MessageController::class, 'show'])->name('messages.show');
Route::post('messages', [MessageController::class, 'store'])->name('messages.store');
Route::get('apply/{id}', [JobController::class, 'messagesView'])->name('jobs.apply')->middleware('auth');
Route::get('publish', [JobController::class, 'publishNewJob'])->name('jobs.publish')->middleware('auth');
Route::get('profile/{id}', [JobController::class, 'showProfile'])->name('profile.user-profile');