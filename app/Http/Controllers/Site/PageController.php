<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ContactRequest;
use App\Contact;
use App\Page;
use App\Product;
use App\Category;
Use App\Mail\ContactMail;
use Auth;
class PageController extends Controller
{
    public function contact()
    {
        $setting = \App\Setting::pluck('value','key')->toArray();

        return view('site.pages.contact',compact('setting'));
    }

    public function contact_send(Request $request)
    {
        // dd($request->all());
        $email = \App\Setting::where('key','email')->first();
        if($email['value']){
            @\Mail::to($email['value'])->send(new ContactMail($request['name'], $request['message'], $request['subject']));
        }
        $contact = Contact::create($request->all());
        return redirect()->back()->with('message-success', t('Message is sent successfully','site'));
    }


    public function page($slug)
    {
        $page = Page::whereSlug($slug)->first();
        if($page){
            return view('site.pages.index',compact('page'));
            // return view('site.pages.about',compact('page'));
        }else{
            return redirect('/404');
        }
    }

    public function shop(Request $request)
    {
        $items = Product::whereNull('parent_id')->where('active',true)->with('category')->where('pag_id',0);
        // filters goes here
        $currentCategory = null;
        if (isset($request->category)) {
            $items->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->category);
            });
            $currentCategory = Category::whereSlug($request->category)->first();
        }

        if (!empty(request('keyword'))) {
            $keyword = request('keyword');
            $items->whereTranslationLike('name', '%'.$keyword.'%');
        }



        // $per_page = 50;
        $items = $items->paginate(40);
        // $products = parent::customPagination($request, $products, $per_page);
        $categories = Category::where('active',true)->whereNull('parent_id')
                ->with('products','children')->get();
            // dd($categories->count());
        return view('site.shop', compact('items', 'categories','currentCategory'));
    }
}
