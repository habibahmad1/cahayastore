<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function fetchMessages()
    {
        return ChatMessage::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
        $message = new ChatMessage();
        $message->user_id = Auth::id();
        $message->message = $request->message;
        $message->save();

        return ['status' => 'Message Sent!'];
    }
}
