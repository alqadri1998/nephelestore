<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Salon;
use App\Http\Requests\Admin\UserRequest;
use App\UserContry;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDO;
use Rap2hpoutre\FastExcel\FastExcel;

class UserController extends Controller
{

    public function __construct()
    {

        $this->middleware('permission:list-users', ['only' => ['index']]);
        $this->middleware('permission:create-users', ['only' => ['create', 'store', 'import']]);
        $this->middleware('permission:edit-users', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-users', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $items = User::query();
        parent::search($items, $request, ['name', 'email', 'mobile']);
        $items = $items->paginate(10);
        return view('admin.pages.users.index', compact('items'));
    }


    public function create()
    {
        return view('admin.pages.users.create');
    }


    public function store(UserRequest $request)
    {

        $requestData = $request->all();
        if ($request->hasFile('excel')) {
            try {
                // $contries = new UserContry();
                // $all_city =  new City();
                // return  $all_city = City::get()->pluck('translations');
                //  return collect($all_city)->map(function ($q){
                //     return   ;

                //  });
                $all_city = DB::table('city_translations')->where('locale', 'ar')->select('name')->get();
                $cities = $all_city->toArray();
                // use ($cities, $all_city)
                $data = array();
                $password = Hash::make('123456');
                  $all_users = User::get()->pluck('email')->toarray();
                foreach((new FastExcel)->import($request->excel) as $line ){
                        // return   $city = $line['المدينة']?City::where('name->ar', $line['المدينة'])->first():null ;

                        if(!in_array($line['البريد الإلكتروني'] , $all_users)){

                            if ($line['المدينة']) {
                                if (in_array($line['المدينة'], $cities)) {
                                    $city = $all_city->where('name', $line['المدينة'])->first()->id;
                                } else {
                                    $ar = City::create([]);
                                    $ar->translateOrNew('ar')->name = $line['المدينة'];
                                    $ar->save();
                                    $city = $ar->id;
                                    $city = null;
                                }
                            } else {
                                $city = null;
                            }


                            $con =  $line['الدولة'] ? UserContry::firstOrCreate(['country_name' => $line['الدولة']]) : null;

                              $data[] = [
                                'name' => $line['اسم العميل'],
                                'email' => $line['البريد الإلكتروني'],
                                'mobile' => $line['رقم الجوال'],
                                'password' =>$password,
                                'active' => "1",
                                'city_id' => $city ,
                                'country_name_id' =>$con?$con->id : null,
                            ];;
                        }
                }
                 $chunks =  array_chunk($data, 1000);
                 foreach($chunks as $chunk){
                    User::insert($chunk);

                 }



                // (new FastExcel)->import($request->excel, function ($line)  {
                    // $newsItem->getTranslation('name', 'nl');

                    //   return   $city = $line['المدينة']?City::where('name->ar', $line['المدينة'])->first():null ;
                    // if ($line['المدينة']) {
                    //     // if (in_array($line['المدينة'], $cities)) {
                    //         // $city = $all_city->where('name', $line['المدينة'])->first()->id;
                    //     // } else {
                    //         // $ar = City::create([]);
                    //         // $ar->translateOrNew('ar')->name = $line['المدينة'];
                    //         // $ar->save();
                    //         // $city = $ar->id;
                    //         $city = null;
                    //     }
                    // } else {
                    //     $city = null;
                    // }


                    // $con =  $line['الدولة'] ? UserContry::firstOrCreate(['country_name' => $line['الدولة']]) : '';

                //      $data[] = [
                //         'name' => $line['اسم العميل'],
                //         'email' => $line['البريد الإلكتروني'],
                //         'mobile' => $line['رقم الجوال'],
                //         'password' => Hash::make('123456'),
                //         'active' => "1",
                //         'city_id' => null ,
                //         'country_name_id' => 0,
                //     ];
                //     return ;
                // });
                // return $data;

                return redirect(route('admin.users.index'))->with('message-success', __('admin.messages.Created Successfull'));
            } catch (\Exception $e) {
                dd($e);
                return view('errors.500');
            }
        }
        // dd($requestData);
        $requestData['password'] = bcrypt($requestData['password']);
        try {

            $requestData['active'] = isset($requestData['active']) ? 1 : 0;
            $user = User::create($requestData);
            return redirect(route('admin.users.index'))->with('message-success', __('admin.messages.Created Successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->with('message-error', $e->getMessage());
        }
    }


    public function show($id)
    {
        $item = User::find($id);
        return view('admin.pages.users.show', compact('item'));
    }


    public function edit($id)
    {
        $item = User::find($id);;
        return view('admin.pages.users.edit', compact('item'));
    }


    public function update(UserRequest $request, $id)
    {
        try {
            $item = User::find($id);
            $requestData = $request->all();

            if (isset($requestData['password']))
                $requestData['password'] = bcrypt($requestData['password']);
            else {
                if (is_null($requestData['password']))
                    unset($requestData['password']);
            }
            $requestData['active'] = isset($requestData['active']) ? 1 : 0;
            $item->update($requestData);

            return redirect(route('admin.users.index'))->with('message-success', __('admin.messages.updated Successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->with('message-error', $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $user = User::find($id)->delete();
            return redirect(route('admin.users.index'))->with('message-success', __('admin.messages.removed Successfull'));
        } catch (\Exception $e) {
            return view('errors.500');
        }
    }
}
