<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Config;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Session;
class AuthController extends Controller
{
	use AuthenticatesUsers;

	public function __construct()
	{
		Config::set('auth.defaults.guard', 'admin');
	}


	public function showLoginForm()
	{
		return view('admin.auth.login');
	}

	protected function credentials(Request $request){
		if(is_numeric($request->get('email'))){
			return ['mobile'=>$request->get('email'), 'password'=>$request->get('password')];
		}
		return ['email' => $request->get('email'), 'password'=>$request->get('password')];
	}

	protected function login(Request $request){
		$this->validateLogin($request);
		// dd()
        $admin = Admin::where('email', $request->email)->orWhere('mobile', $request->email)->first();
        if ( $admin && $admin->active == 0 ) {
            return $this->sendLockedAccountResponse($request);
       		
        }
		if (Auth::guard('admin')->attempt($this->credentials($request), $request->filled('remember'))) {
			return redirect()->intended($this->redirectTo());
		}
		$this->incrementLoginAttempts($request);

		return $this->sendFailedLoginResponse($request);
	}

	public function redirectTo()
	{
		return '/admin';
	}

	public function logout(Request $request){
		Auth::guard('admin')->logout();

		$request->session()->invalidate();

		return $this->loggedOut($request) ?: redirect('/admin/login');
	}

	public function sendLockedAccountResponse($request)
	{
		throw ValidationException::withMessages([
	            'email' => [t('This Account Is Blocked')],
	        ]);
	}
}
