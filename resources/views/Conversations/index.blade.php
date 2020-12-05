@extends('layouts.app')

@section('content')
<div class="container d-flex">
    <div id="conversation_container" class="col-md-4">
        {{-- checking for, then looping through all logged in user conversations --}}
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
                    <p class='text-muted mb-0 text-truncate d-flex align-items-center'>
                        <span>This is a test message.</span>
                    </p>
                </a>
            @endforeach
        @else
            <p class="text-muted">No conversations....</p>
        @endif
    </div>
    {{-- show message --}}
    <div id="message-container" class="col-md-8">
        <div id="users-container">
            <div class="d-flex justify-content-between p-3">
                <p class="font-weight-bold">Create a new chat...</p>
                <a class="font-weight-bold" id="convosation_add_someone" href="#">Add someone...</a>
            </div>
        </div>
        <div id="messages-container"></div>
        <div id="message-send-container" style="width:100%;">
            <form id="message-send">
                <div class="form-group mb-2">
                    <textarea class="form-control" name="" id="message-text" cols="100" rows="5"></textarea>
                    <button class="btn btn-primary float-right mt-1"type="submit" id="send_message">Send</button>
                </div>
            </form>                
        </div>
    </div>
</div>
@endsection
