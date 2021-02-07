@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">
                <div class="card-body">
                    <div class="container col-md-11">
                        <h4 class="text-muted">Post something...</h4>
                        <form action="#">
                            <div class="row justify-content-center mt-1">
                                <textarea class="form-control" name="post_text" id="" cols="80" rows="4"></textarea>
                            </div>
                            <div class="row justify-content-end mt-1">
                                <button class="btn btn-primary">Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     <div class="col-md-12">
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
@endsection
