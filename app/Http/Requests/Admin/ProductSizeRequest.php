<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Auth;
class ProductSizeRequest extends FormRequest
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
    			'size' => 'required|unique:product_sizes,size',
    		];
    	} elseif ($this->method_name == 'update') {
    		$id = $this->request->get('size_id');
    		return [
    			'size' => 'required|unique:product_sizes,size,'.$id,
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
    		// 'name.required' => 'Size Name is Required',
    		'size.required' => 'Size is Required',
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
