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
    public function reply(Conversation $conversation, Request $request)
    {
        $conversation = Conversation::where('uuid', '=', $_POST["conversation-id"])->first();
        $conversation->messages()->create([
            'user_id' => auth()->id(),
            'body' => $_POST['message-text']
        ]);
        
        $conversation_id = 1;
        $user_id = 1;
        $message = 'hello';
    }
}
