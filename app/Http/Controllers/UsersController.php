<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Session;
use Alert;
use App\Http\Requests\UserRequest;
class UsersController extends Controller
{
    public function signup()	
    {
    	return view('users.signup');
    } 

    public function signup_store(UserRequest $request)
	{
		// // below code will register and automatic activate account user
		// Sentinel::register($request, true);
		// // or		
	    $fill = [
	        'email' => $request->email,
	        'password' => $request->password,
	        'first_name' => $request->first_name,
	        'last_name' => $request->last_name
	    ];		
		
		$defaultUser = Sentinel::registerAndActivate($fill);

		$defaultRole = Sentinel::findRoleByName('writer');
		
		$defaultUser->roles()->attach($defaultRole);
		// sweetalert
		Alert::success('Success create new user');
		// session bawaan laravel
		// Session::flash('notice', 'Success create new user');

		return redirect()->back();
	}
}
