<?php

namespace App\Http\Controllers\Admin;

use App\CartStorage;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class LeftCartController extends Controller
{
    //
    public function index(Request $request)
    {
          $carts = CartStorage::where('updated_at','<=' ,Carbon::now()->subDays(7))->whereHas('user')->with('user')->paginate(10);

        return view('admin.pages.carts.index',compact('carts'));
    }
    public function show(Request $request)
    {
        $cart = CartStorage::find($request->id);


        return View::make('admin.pages.carts.show', compact(['cart']))->render();
    }
}
