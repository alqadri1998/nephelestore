<?php

namespace App;

use App\CategoryTranslation;
use App\Product;
use App\Traits\Sluggable;
use App\Traits\WithTranslationTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Category extends Model implements TranslatableContract, HasMedia
{
    use Translatable;
    use InteractsWithMedia;
    use Sluggable;
    use WithTranslationTrait;
   

    protected $fillable = ['active', 'slug', 'parent_id','image'];
    protected $translatedAttributes = ['name'];

    public $timestamps = false;
    public function getRouteKeyName()
    {
        return 'slug';
    }
   

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = '';
    }

    public function CategoryTranslation()
    {
      return $this->hasMany(CategoryTranslation::class);
    }

    public function products()
    {
      return $this->hasMany(Product::class);
    }


    public function parent()
    {
    	return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
    	return $this->hasMany(Category::class, 'parent_id');
    }

    // public function allChildrens()
    // {
    //     return $this->children()->with('allChildrens');
    // }

    // category may have one filterable attribute or more 
    // public function filtered_attributes()
    // {
    //     return $this->belongsToMany(
    //         Attribute::class, 
    //         'categories_filtered_attributes_relation', 
    //         'category_id',
    //         'attribute_id'
    //     )->with('translations');
    // }

    // public function meta()
    // {
    //     return $this->morphOne('App\Seo','metable', 'meta_type', 'meta_id');
    // }

    // public function products()
    // {
    //     return $this->hasMany(Product::class, 'category_id')->whereNull('parent_id');
    // }
}
