<?php

namespace App;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class SliderItem extends Model
{
    protected $fillable = ['path','overlay_text','url','active','category_id'];

    public function Category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
