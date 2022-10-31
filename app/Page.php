<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Sluggable;
use App\Traits\WithTranslationTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Page extends Model implements TranslatableContract
{
    use Translatable;
    use Sluggable;
    use WithTranslationTrait;
    protected $fillable = ['slug'];
    protected $translatedAttributes = ['name','body'];

    public $timestamps = false;
    
}
