<?php
namespace App\Traits;
use Illuminate\Support\Str;
trait Sluggable{
	public function generateSlug($key = 'name'){
		$i = 1;
		// $createdSlug = str_slug($this->$key);
		$createdSlug = Str::slug($this->translate('en')->name);
		// dd($createdSlug);
		while($this->select('slug')->get()->contains('slug', $createdSlug)){
			// $createdSlug = str_slug($this->$key.'-'.($i++));
			$createdSlug = Str::slug($this->$key).'-'.($i++);
		}
		$this->attributes['slug'] = $createdSlug;
		$this->save();
	}
}