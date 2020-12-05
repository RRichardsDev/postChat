@extends('layouts.app')

@section('content')
<div class="container d-flex">
{{-- Sidebar section --}}
    <div id="conversation_container" class="col-md-4">
        @if($conversations->count())
            @foreach($conversations as $conversation)
                <a href="{{route('conversations.show', $conversation)}}" class="message-thumb d-block p-4 mb-2">
                    <div class="font-weight-bold">
                        {{-- Displaying the name of all users part of the conversation --}}
                        @foreach($conversation->users as $user)
                            {{-- Applies presenter to logged in user, adds a commer between names --}}
                            {{ $user->present()->name() }}@if($conversation->users->last() != $user), @endif 
                        @endforeach
                    </div>
                    {{-- Last message in convosation preview --}}
                    <p class='text-muted mb-0 text-truncate d-flex align-items-center'>
                        <span>{{$conversation->messages->last()->body}}</span>
                    </p>
                </a>
            @endforeach
        @else
            <p class="text-muted">No conversations....</p>
        @endif
    </div>
{{-- Message Section --}}
    <div id="message-container" class="col-md-8">
        {{-- Displays list of users in the convosation --}}
        <div id="users-container">
            <div class="d-flex justify-content-between p-3">
                <div class="font-weight-bold text-muted">
                    @foreach($chat->users as $user)
                        {{$user->present()->name()}}@if($chat->users->last() != $user), @endif 
                    @endforeach
                </div>
                <a class="font-weight-bold" id="convosation_add_someone" href="#">Add someone...</a>  
            </div>         
        </div>
        {{-- Displays messages --}}
        <div id="messages-container">
            @foreach($chat->messages as $message)
                {{-- If its the users message use the message-sent class --}}
                @if($message->user_id == auth()->id())
                    <div class="message-sent-container">
                        <div class="message-sent" >
                            {{$message->body}}
                        </div>
                        <div class="message-sent-name">
                             <p class="text-muted ">{{$message->user->name}}</p>
                        </div>
                    </div>
                @else
                {{-- If its the users message use the message-recieved class --}}
                    <div class="message-recieved-container">
                        <div class="message-recieved" >
                            {{$message->body}}
                        </div>
                        <div class="message-recieved-name">
                            <p class="text-muted ">{{$message->user->name}}</p>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
{{-- Send message section --}}
        <div id="message-send-container" style="width:100%;">
            <form id="message-send">
                <div class="form-group mb-2">
                    <input type="hidden" id="message-user-name" value="{{auth()->user()->name}}">
                    <textarea class="form-control" name="" id="message-text" cols="100" rows="5"></textarea>
                    <button class="btn btn-primary float-right mt-1"type="submit" id="send_message">Send</button>
                </div>
            </form>                
        </div>
    </div>
</div>
@endsection
