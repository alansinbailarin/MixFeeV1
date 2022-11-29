<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function __autoload(){
        $this->middleware('auth');
    }

    public function sent(Request $request){
        $message = auth()->user()->messages()->create([
            'content' => $request->message,
            'chat_id' => $request->chat_id,
        ])->load('user');

        broadcast(new MessageSent($message))->toOthers();

        return $message;
    }
}
