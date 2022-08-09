<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ConsultaController;

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
