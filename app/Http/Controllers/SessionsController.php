<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Session;
use App\Http\Requests\SessionRequest;
use Alert;

class SessionsController extends Controller
{
	public function login()	{
		if ($user = Sentinel::check()) {
			// Session::flash("notice", "You has login ".$user->email);
			Alert::success('Login success ','Welcome, '.$user->first_name);
			return redirect('/');
		} else {
			return view('sessions.login');
		}
	}

	public function login_store(SessionRequest $request)	{
		if($user = Sentinel::authenticate($request->all())) {
			Session::flash("notice", "Welcome ".$user->first_name);
			Alert::success('Login Success', 'Welcome, '.$user->first_name);
			return redirect()->intended('/');
		} else {
			// Session::flash("error", "Login fails");
			Alert::error('Error', 'Login Fails');
			return view('sessions.login');
		}
	}

	public function logout()	{
		Sentinel::logout();
		// Session::flash("notice", "Logout success");
		Alert::success('Logout Success');
		return redirect('/');
	}
}
