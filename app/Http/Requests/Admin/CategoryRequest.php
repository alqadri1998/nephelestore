<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Auth;
class CategoryRequest extends FormRequest
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
        return [
            'ar.name' => 'required',
            'en.name' => 'required',
            //'image' => 'mimes:jpg,bmp,png,jpeg|size:max:4000',
       ];
    }

    /**
     * Get the validation messages that apply to the request rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'ar.name.required' => 'الاسم بالعربية مطلوب',
            'en.name.required' => 'الاسم بالانجليزية مطلوب',
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
