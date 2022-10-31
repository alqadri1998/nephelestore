<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Config;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function changeLang($locale)
    {
        app()->setLocale($locale);
        Config::set('app.locale', $locale);
        Session::put('locale', $locale);
        // dd(app()->getLocale());
        // dd(Session::get('locale'));
        return redirect()->back();
    }
}
