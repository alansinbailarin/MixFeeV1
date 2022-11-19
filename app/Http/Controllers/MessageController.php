<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function show(Message $message){
        return view('messages.show', compact('message'));
    }

    public function store(Request $request){
        $message = Message::create($request->all());
        return redirect()->route('messages.show', $message);
    }
}
