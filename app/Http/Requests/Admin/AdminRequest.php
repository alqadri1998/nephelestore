<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Auth;

class AdminRequest extends FormRequest
{
    protected $route;
    protected $method_name;

    public function __construct()
    {
        $this->route = explode('.', Route::currentRouteName());
        $this->method_name = $this->route[count($this->route) - 1];
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
        if ($this->method_name == 'profileUpdate') {
            $id = Auth::id();

            return [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:admins,email,'.$id,
                'mobile'=> 'required|unique:admins,mobile,'.$id,
                'password' => 'nullable|min:6'
            ];
        } elseif ($this->method_name == 'store') {
            return [
                'name' => 'required',
                'email' => 'required|email|unique:admins,email',
                'mobile' => 'required|numeric|digits_between:5,15|unique:admins,mobile,',
                'password' => 'nullable|min:6',
               ];
        } elseif ($this->method_name == 'update') {
            $id = $this->request->get('user_id');

            return [
                'name' => 'required',
                'email' => 'required|email|unique:admins,email,'.$id,
                'mobile' => 'required|numeric|digits_between:5,15|unique:admins,mobile,'.$id,
                'password' => 'nullable|min:6',
               ];
        }
    }

    /**
     * Get the validation messages that apply to the request rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // example
            // 'name.required' => 'Name is required!',
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [];
    }
}
