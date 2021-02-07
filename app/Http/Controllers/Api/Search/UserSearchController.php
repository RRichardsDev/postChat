<?php

namespace App\Http\Controllers\Api\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSearchController extends Controller
{
    public function index(Request $request)
    {
    	if (!$q = $request->get('q', '')) {
    		return response()->json([]);
    	}
    	return User::where('name', 'LIKE', '%' . $q . '%')->get(['id', 'name']) ;
    }
    public function byID(Request $request)
    {
    	if (!$q = $request->get('q', '')) {
    		return response()->json([]);
    	}
    	return User::where('id', 'LIKE', '%' . $q . '%')->get(['id', 'name']) ;
    }
} 
