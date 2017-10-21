<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;
use App\User;

class MessageController extends Controller
{
    public function send(Request $request){
    	$message = new Message($request->all());
    	$message->send_id = Auth::id();
    	$message->receive_id = $request->has('receive_id');
    	$message->content = $request->has('content');
    	$message->save();

    	return redirect(route('messages/{receive_id}'));
    }

    public function show(){
        $messages = Message::findForUser(Auth::user());

    	return view('messages.messageslist')->with('messages',$messages);
    }

    public function showConversation($id){
        $user = User::find($id);
        $messages = Message::findForUser(Auth::user());
        return view('messages.messages')->with('user',$user)->with('messages',$messages);

    }
}
