<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\MessageController;

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
Route::get('notifications', [MessageController::class, 'getNotifications'])->name('messages.all');
Route::post('messages', [MessageController::class, 'store'])->name('messages.store');
Route::get('apply/{id}', [JobController::class, 'messagesView'])->name('jobs.apply')->middleware('auth');
Route::get('publish', [JobController::class, 'publishNewJob'])->name('jobs.publish')->middleware('auth');
Route::get('profile/{id}', [JobController::class, 'showProfile'])->name('profile.user-profile');
Route::get('cv/pdf/{id}', [JobController::class, 'pdf'])->name('profile.cv');

//crear nueva sala de chat
Route::get('message/with/{user}',[ChatController::class , 'chat_with'])->name('chat.with');
//obtener todos los chat de una sala
Route::get('message/{chat}',[ChatController::class , 'index'])->name('chat.show');

/***************************API CHAT *****************************/
//guardar chat
Route::post('message/sent',[ChatController::class, 'sent'])->name('message.sent');
//obtiene la session actual
Route::get('auth/user', function(){
    if(auth()->check()){
        return response()->json([
            'authUser' => auth()->user()
        ]);
        return null;
    }
});
Route::get('message/{chat}/get_messages',[ChatController::class , 'get_message'])->name('chat.get_messages');
// obtiene todos los usuarios involucrados en una sala de chat
Route::get('message/{chat}/get_user',[ChatController::class , 'get_users'])->name('chat.get_user');

//get all messages from chat
Route::get('api/contacts',[ChatController::class , 'get_contacts'])->name('chat.get_contacts');


// Route::get('message/join/{users}',[ChatController::class , 'chat_with'])->name('chat.with');
Route::get('api/groups',[ChatController::class , 'get_groups'])->name('chat.get_groups');