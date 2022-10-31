<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Category;
use App\Department;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Product;
use App\Quotation;
use App\Visitor;
use DB;
use Illuminate\Http\Request;
class DashboardController extends Controller
{
    public function index(Request $request)
    {
    	$data = [];
    	return view('admin.dashboard');
    }
}
