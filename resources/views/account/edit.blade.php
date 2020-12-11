@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body pb-0">
                	<form action="#">
                		<div class="row mb-4">
	                        <div class="col-md-3">
	                            <a href="#"><img src="{{ auth()->user()->present()->profilePic() }}" style="height: 200px; width: 200px; background-color: gray; "></img></a>
	                        </div>	                        
	                    </div>
                		<div class="row">                			
	                		<div class="form-group col-6">          
	                			<label for="firstName">First name:</label>
	                			<input class="form-control" type="text" name="firstName" placeholder={{auth()->user()->name}}>
		                	</div>
		                	<div class="form-group col-6">   		                		
	                			<label for="lastName">Last name:</label>
	                			<input class="form-control" type="text" name="lastName" placeholder={{auth()->user()->name}}>	       
	                		</div>
                		</div>
                		<div class="row">
	                		<div class="form-group col-7">
	                			<label for="email">Email:</label>
	                			<input class="form-control" type="email" name="email" placeholder={{auth()->user()->email}}>
		                	</div>
		                	<div class="form-group col-5">   		                		
	                			<label for="username">Username:</label>
	                			<input class="form-control" type="text" name="username" placeholder={{auth()->user()->username}}>	       
	                		</div>
                		</div>
                		<div class="row">
	                		<div class="form-group col-4">
	                			<label for="dob">DoB:</label>
	                			<input class="form-control" type="date" name="dob" value="1999-02-17">
		                	</div>		         
                		</div>
                		<div class="row">
	                		<div class="form-group col-6">
	                			<label for="bios">Bios:</label>
	                			<textarea class="form-control" name="dob" rows="5"></textarea>
		                	</div>
		                </div>	   
		                <div class="row">

                		
	                		<div class="form-group col-12 ">
	                			
	                			<button class="btn btn-primary position-relative float-right" id="editAccountSubmit" name="submit" >Submit</button>
		                	</div>		         
                		</div>
                	</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection