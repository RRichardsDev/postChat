@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <a href="#"><img src="{{ auth()->user()->present()->profilePic() }}" style="height: 200px; width: 200px; background-color: gray; "></img></a>
                            {{-- <a href="#"><img src="/profilePictures/1611956367.jpg" style="height: 200px; width: 200px; background-color: gray; "></img></a> --}}
                        </div>
                        <div class="col-md-9 justify-content-bottom">
                            <h1 class="card-title mb-0" style="position: absolute; bottom: 0px;">{{auth()->user()->name}} {{auth()->user()->lastName}}</h1>
                        </div>
                    </div>
                    
            		
            		<div class="row mt-2">
                        <div class="col-md-3">
                            <div class="w-100 border-bottom mt-2 mb-2"></div>
                            <p class="card-text d-block"><b><span>@</span>{{auth()->user()->username}}</b></p>
                            <p class="card-text d-block"><b>{{auth()->user()->email}}</b></p>
                            <p class="card-text d-block"><b>05 / 08 / 1996</b></p>
                            <a href="{{route('accountEdit')}}"><button type="button" class="btn btn-primary w-100" >Edit Details</button></a>
                            <div class="w-100 border-bottom mt-3"></div>
                            <div class="justify-content-between ml-1 mt-3">
                                @for($i=0; $i<=8; $i++)
                                    <div class="thumb-overlay" style="height: 55px; width: 55px; background-color: gray; display:inline-block; margin:3px;">
                                        <div class="thumb w-100 h-100 bg-dark"></div>
                                    </div>
                                @endfor
                            </div>
                            <div class="w-100 border-bottom mt-2 mb-2"></div>
                        </div>
                        <div class="col-md-9">
                            @for($i=0; $i<=5; $i++)
                                <div class="card d-block m-2 pb-1">
                                    <div class="card-body row mb-0 pb-1">
                                        <div class="col-sm-1 mr-2" > 
                                            <img src="{{ auth()->user()->present()->avatar() }}" style=" height:50px; width:50px; border-radius: 50px;"></img>
                                        </div>
                                        <div class="col-sm-10">
                                            <h4>Rhodri Richards</h4>
                                            <p>Duis est voluptate culpa proident aliqua ad minim ea amet cillum culpa anim laboris dolore esse aliquip aliqua voluptate.</p>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <div style="height: 10px; width: 10px; background-color: gray; border-radius:50px; margin: 0 auto;"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <div style="height: 10px; width: 10px; background-color: gray; border-radius:50px; margin: 0 auto;"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <div style="height: 10px; width: 10px; background-color: gray; border-radius:50px; margin: 0 auto;"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <div style="height: 10px; width: 10px; background-color: gray; border-radius:50px; margin: 0 auto;"></div>
                                        </div>

                                    </div>
                                </div>
                            @endfor
                            
                        </div>
        			</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
