<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponsHasCategory extends Model
{
    protected $table = 'coupons_has_categories';
    protected $fillable = ['coupon_id','category_id'];
}
