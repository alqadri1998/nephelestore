<?php 

if(!function_exists('direction')){
	function direction(){
        $locale = Session::has('locale') ? Session::get('locale') : app()->getLocale();
        return $locale == 'ar' ? 'rtl' : 'ltr';
	}
}

if(!function_exists('sidebar')){
    function sidebar(){
        return config('sidebar');
    }
}

if(!function_exists('prefix')){
    function prefix(){
        $locale = Session::has('locale') ? Session::get('locale') : app()->getLocale();
        return $locale == 'ar' ? '.rtl' : '';
    }
}

if(!function_exists('t')){
	function t($word, $trans_file = 'admin'){
		if (trans()->has($trans_file . '.' . $word))
		   	return trans($trans_file . '.' . $word);
		else
			return $word;
	}
}