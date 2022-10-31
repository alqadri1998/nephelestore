<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use App\Setting;
use App\Mail\NewsMail;
use Mail;
class ContactController extends Controller
{
   
    public function index(Request $request)
    {
        $items = Contact::query();
        parent::search($items, $request, ['name'], true);
        $items = $items->paginate(15);
        return view('admin.pages.contacts.index',compact('items'));
    }

    public function create()
    {
        $categories = Category::where('active',1)->get();
        return view('admin.pages.categories.create', compact('categories'));
    }

    
    public function sendReply(Request $request)
    {
        
            // dd($request->all());
            $contactRow = Contact::where('id',$request['id'])->first();

            if($contactRow){
            $subject =  $request['subject'];
            $body = $request['body'];
            $this->setMailCredentials();
            $name = $contactRow->name;
            @Mail::to($contactRow->email)->send(new NewsMail($name, $body, $subject));
            $contactRow->update(['replay'=>1]);
        
                return redirect()->back()->with('message-success', __('تم الارسال بنجاح'));   
            }else{
                return redirect()->back()->with('message-success', __('admin.messages.Some thing went to wrong'));  
            }
            
        
    }

    public function setMailCredentials()
    {
        $email = Setting::where('key','email')->first() ? Setting::where('key','email')->first()['value']:'blogshreef@gmail.com';
        $site = Setting::where('key', 'site_name_ar')->first() ?Setting::where('key', 'site_name_ar')->first()['value'] : 'Nephele';
        \Config::set('mail.from.address', $email);
        \Config::set('mail.from.name', $site);
    }

    
}