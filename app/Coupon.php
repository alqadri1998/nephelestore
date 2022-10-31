<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Category;
class Coupon extends Model
{
    protected $fillable = ['coupon','value','active','type','maximum_discount'];


    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'coupons_has_products',
            'coupon_id',
            'product_id'
        );
    }
    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'coupons_has_categories',
            'coupon_id',
            'category_id'
        );
    }

    // public function orders()
    // {
    //     // return $this->hasMany(Order::class, 'coupon_code');
    
    // }
}
