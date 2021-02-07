<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	return view('account.profile');
    }
    public function editIndex()
    {
    	return view('account.edit');
    }
    public function update()
    {
    	$user = auth()->user();

    	($_POST['name'] != null ? $user->name = $_POST['name'] : $user->name = auth()->user()->name );
        ($_POST['lastName'] != null ? $user->lastName = $_POST['lastName'] : $user->lastName = auth()->user()->lastName );
    	($_POST['email'] != null ? $user->email = $_POST['email'] : $user->email = auth()->user()->email );
    	($_POST['username'] != null ? $user->username = $_POST['username'] : $user->username = auth()->user()->username );
        ($_POST['bios'] != null ? $user->bios = $_POST['bios'] : $user->bios = auth()->user()->bios );

    	
    	$profilePicFile;
    	if($_FILES['profilePictureUpload']['name'] != null)
    	{
    		$profilePicFile = $this->uploadProfilePic();
    		$user->profilePicture = $profilePicFile;
    	} ;

    	$user->save();
    	    		
    	return view('account.profile');
    }

    public function uploadProfilePic()
    {
    	$path = $_FILES['profilePictureUpload']['name'];

		$ext = "." . pathinfo($path, PATHINFO_EXTENSION);
		$filename= time().$ext;


    	$img = Image::make($_FILES['profilePictureUpload']['tmp_name']);
		
        $img->save('profilePictures/'. $filename);


		return ($filename);
    }
}
