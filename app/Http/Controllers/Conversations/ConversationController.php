<?php

namespace App\Http\Controllers\Conversations;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ConversationController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	$conversations = $request->user()->conversations;
    	
    	return view('conversations.index',compact('conversations'));
    }
    public function show(Conversation $conversation, Request $request)
    {
        $conversations = $request->user()->conversations;
        $chat = $conversation;

        return view('conversations.show', compact('conversations', 'chat') );
    }
}
