<?php

namespace App\Http\Controllers\Site\Auth;

use App\CartStorage;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Login Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles authenticating users for the application and
		    | redirecting them to your home screen. The controller uses a trait
		    | to conveniently provide its functionality to your applications.
		    |
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	// protected $redirectTo = RouteServiceProvider::HOME;
	protected $redirectTo = '/';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest')->except('logout');
	}

	public function showLoginForm() {
		return view('site.auth.login');
	}

	protected function credentials(Request $request) {

		if (is_numeric($request->get('email'))) {
			return ['mobile' => $request->get('email'), 'password' => $request->get('password')];
		}
		return ['email' => $request->get('email'), 'password' => $request->get('password')];
	}

	protected function login(Request $request) {
		// $this->validateLogin($request);
		$request->validate([
			'email' => 'required|string',
			'password' => 'required|string',
		]);
		$user = User::where('email', $request->email)->orWhere('mobile', $request->email)->first();
		if ($user && !$user->active) {
			return $this->sendLockedAccountResponse($request);
		}
		if (Auth::guard('web')->attempt($this->credentials($request), $request->filled('remember'))) {
			$cartID = '';
			if ($request->cookie('cartID')) {
				$cartID = $request->cookie('cartID');
				$cartstorage = CartStorage::where('session_key', 'SAR_' . $cartID)->first();
				// dd($cartstorage);
				if ($cartstorage) {
					$cartstorage->update(['user_id' => Auth::id()]);
				}
			}
			// if(isset($request['redirect_to']) && !empty($request['redirect_to'])){
			//     return redirect()->route($request['redirect_to']);
			// }
			return redirect('/');
		}

		$this->incrementLoginAttempts($request);

		return $this->sendFailedLoginResponse($request);
	}

	public function logout(Request $request) {
		// $cartstorage = CartStorage::where('user_id', Auth::id())->first();
		//     if($cartstorage){
		//         $cartstorage->delete();
		//     }
		Auth::guard('web')->logout();
		$request->session()->invalidate();

		return $this->loggedOut($request) ?: redirect()->route('home');
	}

	public function sendLockedAccountResponse(Request $request) {
		// return redirect()->back()
		//     ->withInput($request->only('email', 'remember'))
		//     ->withErrors([
		//         'email' => __('site.account_blocked'),
		//     ]);
		throw ValidationException::withMessages([
			'email' => [t('Your Account Is Blocked', 'site')],
		]);
	}

	public function forgotPassword(Request $request) {
		return view('site.auth.forgot-password');
	}

	public function confirmForgotPassword(Request $request) {
		$user = User::whereEmail($request['email'])->first();
		if ($user) {
			$code = strtoupper(substr(sha1(mt_rand()), 17, 6));
			$user->remember_token = $code;
			$user->save();
			$this->sendEmail($user);
			return back()->with('message-success', t('Code sent via email', 'site'));
		}

		return back()->with('message-error-success', 'Your email is not registered with us');
	}

	public function sendEmail($user) {
		\Mail::send(
			'site.emails.forgot',
			['user' => $user],
			function ($message) use ($user) {
				$message->to($user->email);
				$message->subject($user->name . ' Reset Your Password');
			});
	}

	public function showResetPassword($email, $code) {
		$user = User::whereEmail($email)->first();
		if ($user && ($user->remember_token == $code)) {
			return view('site.auth.reset-password', compact('email', 'code'));
		}
		$salon = Salon::whereEmail($email)->first();
		if ($salon && ($salon->remember_token == $code)) {
			return view('site.auth.reset-password', compact('email', 'code'));
		}

		return redirect('/404');
	}

	public function resetPassword(Request $request) {
		$this->validate($request, [
			'password' => 'required|min:6|confirmed',
			'password_confirmation' => 'required',
		]);
		$user = User::whereEmail($request['email'])->first();
		if ($user) {
			$user->remember_token = null;
			$user->password = bcrypt($request['password']);
			$user->save();
			return redirect('/login')->with('message-success', t('Password Changed'));
		}

		return redirect('/404');
	}

}
