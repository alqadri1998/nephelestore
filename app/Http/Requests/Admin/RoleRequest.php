<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Auth;
class RoleRequest extends FormRequest
{

    protected $route;
    protected $method_name;

    public function __construct(){
        $this->route = explode('.', Route::currentRouteName());
        $this->method_name = $this->route[count($this->route)-1];
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method_name == 'store'){
            return [
                'name'  => 'required|unique:roles',
            ];
        }else{
            return [
                'name'  => 'required|unique:roles,name,'.$this->request->get('role_id'),
            ];
        }
    }
}
