@extends('layouts.app')

@section('content')
<div class="container d-flex">
    <div id="conversation_container" class="col-md-4">
        <a href="{{ route('conversations.create') }}" class="message-thumb d-block p-4 mb-2">
            <div class="font-weight-bold">
                New chat...
            </div>
        </a>
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
                        @if(!$conversation->pivot->read_at)
                            <span class="bg-primary mr-2 rounded-circle" style="width:8px;height:8px;"></span>
                        @endif
                         <span>{{$conversation->messages->last()->body}}</span>
                    </p>
                </a>
            @endforeach
        @else
            <p class="text-muted">No conversations....</p>
        @endif
    </div>
    {{-- show message --}}
    <div class="col-md-8">
        <form action="" class="bg-white">
        <div class="p-4 border-bottom">
            <div id="userList" class="mb-2 text-muted">
                Send to 
                {{-- <a href="#" class="suggestion" data-value="1">Rhodri</a> --}}
            </div>

            <div id="suggestions" x-data="conversationCreateState()">
                <div class="form-group">            
                    <input type="text" class="form-control" id="user" autocomplete="off" placeholder="Search user" x-on:input.debounce="search">
                </div>

                <template  x-for="user in suggestions" :key="user.id">
                    <a  href="#" class="d-block" x-text="user.name" x-on:click="addUser(user)"></a>
                </template>
            </div>
            

        </div>


        <div class="p-4 border-top ">
            <div class="form-group">                
                <textarea rows="3" id="body" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-secondary btn-block">
                Start Conversation
            </button>
        </div>
    </form>
    </div>

    <script>
        function conversationCreateState() {            
            return {
                suggestions: [],

                search(e) {
                    fetch(`/api/search/users?q=${e.target.value}`)
                        .then(response => response.json())
                        .then((suggestions) => {
                            this.suggestions = suggestions
                        })
                },
                addUser(user) {
                    addUserToList(user)
                },
            }
        }
        
    </script>
</div>
@endsection
    <button id="pushing">Show users</button>
