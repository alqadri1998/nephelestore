<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subscription;
use App\Setting;
use Mail;
use App\Mail\NewsMail;
class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        // Subscription
        $items = Subscription::query();
        parent::search($items, $request, ['email']);
        $items = $items->paginate(10);
        return view('admin.pages.subscriptions.index',compact('items'));
    }

    public function send(Request $request)
    {
        if (isset($request['subject']) && isset($request['body'])) {
            $subject =  $request['subject'];
            $body = $request['body'];
            $this->setMailCredentials();
            foreach (Subscription::get() as $item) {
                $name = $item->email;

                @Mail::to($item->email)->send(new NewsMail($name, $body, $subject));

            }
        }
        return redirect()->back()->with('message-success', __('تم الارسال بنجاح'));
    }

    public function setMailCredentials()
    {
        \Config::set('mail.from.address', 'blogshreef@gmail.com');
        \Config::set('mail.from.name', Setting::where('key', 'site_name_ar')->first()['value']);
    }
}
