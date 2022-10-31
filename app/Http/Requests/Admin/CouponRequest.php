<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Auth;
class CouponRequest extends FormRequest
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
       if ($this->method_name == 'store') {
            return [
                'coupon' => 'required|unique:coupons,coupon,',
                'value'=> 'required',
               
               
            ];
        } elseif ($this->method_name == 'update') {
            $id = $this->request->get('id');
            return [
                'coupon' => 'required|unique:coupons,coupon,'.$id,
                'value'=> 'required',
                
               
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
