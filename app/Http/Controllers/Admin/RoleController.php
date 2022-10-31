<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Role;
use Permission;
class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:list-roles', ['only' => ['index']]);
        $this->middleware('permission:create-roles', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-roles', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-roles', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::query();
        
        parent::search($roles, $request, ['name', 'display_name']);
        
        $roles = $roles->paginate(10);
        return view('admin.pages.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('admin.pages.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'display_name'      => 'required'
        ];
        $request->validate($rules);
        $requestData = $request->all();
        try{
        	$requestData['name'] = str_slug($requestData['display_name']);
            $permissions = [];
            if(isset($requestData['permissions'])){
                $permissions = $requestData['permissions'];
                unset($requestData['permissions']);
            }
        	$role = Role::create($requestData);
            $role->givePermissionTo(array_keys($permissions));
            return redirect(route('admin.roles.index'))->with('message-success', __('admin.messages.Created Successfully'));
        }catch(\Exception $e){
        	return redirect()->back()->with('message-error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($role)
    {
        $role = Role::find($role);
        return view('admin.pages.roles.show',compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($role)
    {
        $permissions = Permission::get();
        $role = Role::find($role);
        return view('admin.pages.roles.edit',compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $role)
    {
        $rules = [
            'display_name'      => 'required',
        ];
        $request->validate($rules);
        $requestData = $request->all();
        try{
        	$role = Role::find($role);
            $permissions = [];
            if(isset($requestData['permissions'])){
                $permissions = $requestData['permissions'];
                unset($requestData['permissions']);
            }
        	$role->update($requestData);
            // $role->givePermissionTo([]);
            $role->syncPermissions(array_keys($permissions));
            return redirect(route('admin.roles.index'))->with('message-success', __('admin.messages.updated Successfully'));
        }catch(\Exception $e){
            return redirect()->back()->with('message-error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($role)
    {
    	try {
            Role::find($role)->delete();
            return redirect()->route('admin.roles.index')->with('message-success', __('admin.messages.removed Successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->with('message-error', $e->getMessage());
        }
    }
}
