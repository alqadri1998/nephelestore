<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Salon;
use App\Http\Requests\Admin\UserRequest;
class UserController extends Controller
{

   public function __construct()
    {
      
        $this->middleware('permission:list-users', ['only' => ['index']]);
        $this->middleware('permission:create-users', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-users', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-users', ['only' => ['destroy']]);
    }
    
    public function index(Request $request)
    {
        $items = User::query();
        parent::search($items, $request, ['name', 'email', 'mobile']);
        $items = $items->paginate(10);
        return view('admin.pages.users.index',compact('items'));
    }

   
    public function create()
    {  
        return view('admin.pages.users.create');
    }

    public function store(UserRequest $request)
    {
        $requestData = $request->all();
        // dd($requestData);
        $requestData['password'] = bcrypt($requestData['password']);
        try{
            
            $requestData['active'] = isset($requestData['active']) ? 1 : 0;
            $user = User::create($requestData);
            return redirect(route('admin.users.index'))->with('message-success', __('admin.messages.Created Successfully'));
        }catch(\Exception $e){
            return redirect()->back()->with('message-error', $e->getMessage());
        }
    }

    
    public function show($id)
    {
        $item = User::find($id);
        return view('admin.pages.users.show',compact('item'));
    }

   
    public function edit($id)
    {
        $item = User::find($id);;
        return view('admin.pages.users.edit',compact('item'));
    }

    
    public function update(UserRequest $request, $id)
    {
        try{
            $item = User::find($id);
            $requestData = $request->all();
            
            if(isset($requestData['password']))
                $requestData['password'] = bcrypt($requestData['password']);
            else{
                if(is_null($requestData['password']))
                    unset($requestData['password']);
            }
            $requestData['active'] = isset($requestData['active']) ? 1 : 0;
            $item->update($requestData);
            
            return redirect(route('admin.users.index'))->with('message-success', __('admin.messages.updated Successfully'));
        }catch(\Exception $e){
            return redirect()->back()->with('message-error', $e->getMessage());
        }
    }

   
    public function destroy($id)
    {
        try{
            $user = User::find($id)->delete();
            return redirect(route('admin.users.index'))->with('message-success', __('admin.messages.removed Successfull'));
        }catch(\Exception $e){
            return view('errors.500');
        }
    }

}
