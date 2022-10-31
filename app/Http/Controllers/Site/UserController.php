<?php

namespace App\Http\Controllers\Site;

use App\Helpers\MediaHelper;
use App\Http\Controllers\Controller;
use App\Order;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // public function profile()
    // {
    //     return view('site.user.user-account');
    // }

    // public function changeProfileSettings(Request $request)
    // {
    //     $user = Auth::user();

    //     $user->update($request->except('password'));

    //     if(isset($request['image']))
    //         MediaHelper::uploadMedia($user, $request, 'thumb', 'general', true, 'image', 480);

    //     return redirect()->back()->with('message-success', t('Account Settings Updated', 'site'));
    // }

    // public function profilePassword()
    // {
    //     return view('site.user.user-password');
    // }

    // public function changePassword(Request $request)
    // {
    //     $request->validate([
    //         'password'  => 'min:8|confirmed'
    //     ]);
    //     $user = Auth::user();
        
    //     if(isset($request['password'])){
    //         $request['password'] = bcrypt($request['password']);
    //         $user->update($request->only('password'));
    //     }

    //     return redirect()->back()->with('message-success', t('Password Changed', 'site'));
    // }

    public function updateAccount(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            // 'password'  => 'min:8|confirmed'
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'mobile'=> 'required|unique:users,mobile,'.$user->id,
            'password'  => 'min:8|nullable'
        ]);
        $user->name = $request['name'];
        $user->mobile = $request['mobile'];
        $user->email = $request['email'];
        if(isset($request['c_password']) && !empty($request['c_password']) && !empty($request['password'])){
            if (\Hash::check($request['c_password'], Auth::user()->password)) {
                $user->password = bcrypt($request['password']);
            }else{
                return redirect()->back()->with('message-error', t('Your Password Wrong Please Enter Correct Password'));
            }
        }
        $user->save();
        return redirect()->back()->with('message-success', t('Updated Successfully'));
        
    }

    public function myOrders()
    {
        $orders = Order::where('user_id',Auth::id())->orderBy('id', 'DESC')->get();
        return view('site.user.my-orders', compact('orders'));
    }
}
