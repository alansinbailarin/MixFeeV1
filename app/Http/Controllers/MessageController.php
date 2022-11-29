<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\File;
use App\Models\User;
use App\Notifications\MessageSent;

class MessageController extends Controller
{
    public function show(Message $message){
        return view('messages.show', compact('message'));
    }

    public function store(Request $request){
        $request->validate([
            'subject'  => 'required',
            'subject.*' => 'mimes:doc,pdf,docx,zip,png,jpge,jpg',
        ]);
        $message = Message::create([
            'subject' => $request->subject,
            'body' => $request->body,
            'from_user_id' => auth()->id(),
            'to_user_id' => $request->to_user_id
        ]);

        $user = User::find($request->to_user_id);
        $user->notify(new MessageSent($message));

        session()->flash('flash.banner','Your message has been sent!');
        session()->flash('flash.bannerStyle','success');

        return redirect()->back();
    }
}
