<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponsHasProduct extends Model
{
    protected $table = 'coupons_has_products';
    protected $fillable = ['coupon_id','product_id'];
}
