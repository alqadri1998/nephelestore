<?php

namespace App;

use App\Country;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
class City extends Model implements TranslatableContract
{
	use Translatable;
	protected $fillable = ['parent_id'];
	public $translatedAttributes = ['name'];
	protected $hidden = ['translations'];

	// public function country()
	// {
	// 	return $this->belongsTo(Country::class, 'country_id');
	// }
	public function parent()
    {
    	return $this->belongsTo(City::class, 'parent_id');
    }

    public function areas()
    {
    	return $this->hasMany(City::class, 'parent_id');
    }
}
