<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Configuration;
use App\Helpers\MediaHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use Auth;
use DB;
use Illuminate\Http\Request;
use Role;
use Session;
use Storage;
use DataTables;
use App\DataTables\UsersDataTable;
class AdminController extends Controller
{

    public function __construct()
    {
        // $this->middleware(['role:Super-Admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd("f");
        $model = Admin::query();
        $admins = Admin::query();
        parent::search($admins, $request, ['name', 'email', 'mobile']);
        $admins = $admins->paginate(10);
        return view('admin.pages.admins.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin.pages.admins.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $requestData = $request->all();
        // dd($requestData);
        $requestData['password'] = bcrypt($requestData['password']);
        try{
            if(isset($requestData['image'])){
                $file = $request->file('image');
                $filename = md5(uniqid() . time()).'.'.$file->getClientOriginalExtension();
                Storage::disk('user_media')->put($filename, file_get_contents($file));
                $requestData['image'] = $filename;
            }
            $requestData['active'] = isset($requestData['active']) ? 1 : 0;
            $admin = Admin::create($requestData);
            $Role = Role::find($requestData['role_id']);
            $admin->assignRole($Role->name);
            return redirect(route('admin.admins.index'))->with('message-success', __('admin.messages.Created Successfully'));
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
    public function show($id)
    {
        $admin = Admin::find($id);
        return view('admin.pages.admins.show',compact('admin'));
    }


    public function edit($id)
    {
        $admin = Admin::find($id);
        $roles = Role::get();
        return view('admin.pages.admins.edit',compact('admin', 'roles'));
    }


    public function update(AdminRequest $request, $id)
    {
        // dd($request->all());
        try{
            $admin = Admin::find($id);
            $requestData = $request->all();
            if(isset($requestData['password']))
                $requestData['password'] = bcrypt($requestData['password']);
            else{
                if(is_null($requestData['password']))
                    unset($requestData['password']);
            }
            if(isset($requestData['image'])){
                $file = $request->file('image');
                $filename = md5(uniqid() . time()).'.'.$file->getClientOriginalExtension();
                Storage::disk('user_media')->put($filename, file_get_contents($file));
                $requestData['image'] = $filename;
            }
            $requestData['active'] = isset($requestData['active']) ? 1 : 0;
            // dd($requestData);
            $admin->update($requestData);
            $Role = Role::find($requestData['role_id']);
            if(!$admin->hasRole($Role->name)){
                $admin->roles()->sync([]);
                $admin->assignRole($Role->name);
            }
            return redirect(route('admin.admins.index'))->with('message-success', __('admin.messages.updated Successfully'));
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
    public function destroy($id)
    {
        try{
            $admin = Admin::find($id)->delete();
            return redirect(route('admin.admins.index'))->with('message-success', __('admin.messages.removed Successfull'));
        }catch(\Exception $e){
            return view('errors.500');
        }
    }

    public function profile(){
        return view('admin.pages.profile');
    }

    public function profileUpdate(Request $request){
        $requestData = $request->all();
        $this->validate($request,[
            'username' => 'required',
        ]);
        try{
            if(isset($requestData['password'])){
                $requestData['password'] = bcrypt($requestData['password']);
            }else{
                unset($requestData['password']);
            }
            if(isset($requestData['image'])){
                $file = $request->file('image');
                $filename = md5(uniqid() . time()).'.'.$file->getClientOriginalExtension();
                Storage::disk('user_media')->put($filename, file_get_contents($file));
                $requestData['image'] = $filename;
            }
            Auth::user()->update($requestData);
            Session::flash('message-success', __('admin.messages.updated Successfully'));
            return redirect()->back();
        }catch(\Exception $e){
            dd($e->getMessage());
            // return view('errors.500',compact('message'));
        }
    }

    public function settings(){
        $settings = \App\Setting::pluck('value','key')->toArray();
    	return view('admin.pages.settings',compact('settings'));
    }

    public function changeSetting(Request $request)
    {
         $requestData = $request->all();
        // dd($requestData);
        try{
            if(!isset($requestData['pay_on_delivery_enabled']))
                $requestData['pay_on_delivery_enabled'] = 'off';
            foreach ($requestData as $key => $value) {
                if($key == 'logo' && isset($requestData[$key])){
                    $logo = $request->logo;
                    $imageName = self::generateImageRandomName() . '.' . $logo->getClientOriginalExtension();
                    $logo->move(public_path('uploads/'),$imageName);
                    $value = '/uploads/'.$imageName;
                }
                \App\Setting::updateOrCreate(['key'=>$key],['value' => $value]);
            }
            return redirect()->back()->with('message-success', __('admin.messages.updated Successfully'));
        }catch(\Exception $e){
            return redirect()->back();
        }
    }

    public function travelRules()
    {
        return view('admin.pages.travelRules');
    }

    public function generateImageRandomName($key = 'logo')
    {
        return str_slug($key) . rand(10, 10000) . '_' . date('Y_m_d');
    }

    public function setup(Request $request)
    {
        $requestData = $request->all();
        $configFilePath = base_path() . '/config/setup.php';
        $config = file_get_contents($configFilePath);
        $newConf = str_replace('false', 'true', $config);
        file_put_contents($configFilePath, $newConf);
        $superAdmin = Admin::create([
            'id'            => 1,
            'name'          => 'Admin',
            'email'         => $requestData['email'],
            'mobile'        => '01152731796',
            'password'      => bcrypt($requestData['password'])
        ]);
        $superAdmin->assignRole('Super-Admin');
        \Artisan::call('config:clear');
        return redirect()->route('admin.login');
    }
     public function block($id)
    {
        $user = Admin::find($id);
        $user->update(['blocked'=>1]);
        return redirect()->bacK();
    }

     public function activeate($id)
    {
        $user = Admin::find($id);
        $user->update(['blocked'=>0]);
        return redirect()->bacK();
    }
}
