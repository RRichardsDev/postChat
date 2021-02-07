<?php

namespace App\Http\Controllers\Conversations;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class ConversationController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function index(Request $request)
    {
    	$conversations = $request->user()->conversations()->orderBy('last_message_at', 'desc')->get();
    	
    	return view('conversations.index',compact('conversations'));
    }
    public function show(Conversation $conversation, Request $request)
    {
        $conversations = $request->user()->conversations();

        $conversations->updateExistingPivot($conversation,[
            'read_at' => now()
        ]);

        $conversations = $conversations->orderBy('last_message_at', 'desc')->get();
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

        $conversation->update([
            'last_message_at' => now()
        ]);

        foreach($conversation->others as $user) {
            $user->conversations()->updateExistingPivot($conversation, [
                'read_at' => null
            ]);
        }
    }
    public function create(Request $request)
    {
        $conversations = $request->user()->conversations()->orderBy('last_message_at', 'desc')->get();
        return view('conversations.create',compact('conversations'));
    }
}
