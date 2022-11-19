<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;
use App\User;
use App\Product;
use App\Payment;
class Order extends Model
{

    protected $fillable = [
        'order_id',
        'status',
        'payment_method',
        'refunded',
        'coupon_code',
        'total_item_count',
        'sub_total',
        'discount',
        'shipping_price',
        'total',
        'name',
        'mobile',
        'street_address',
        'area_id',
        'city_id',
        'user_id',
        'coupon_id',
        'notes',
        'card_holder_name',
        'card_type',
        'card_issuing_bank',
        'card_number',
        'card_expiration_month',
        'card_expiration_year',
        'card_security_code',
        'paid',
        'vatAmount',
        'total_weight',
        'shipping_method'

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }
    public function area()
    {
        return $this->belongsTo(City::class, 'area_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function createOrderID()
    {
        $order_id = date('m') . date('d') . date('y') . '-' . ($this->id + 1000);
        $this->attributes['order_id'] = $order_id;
        $this->save();
    }

    // order has many products
    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'order_has_products',
            'order_id',
            'product_id'
        )
        ->withPivot(['quantity', 'price']);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'order_id');
    }

    public function payment_status()
    {
        $payment = $this->payment()->first();
        return $payment ? $payment->status : '';
    }


}
