<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Product;
use App\City;
use App\Order;
class User extends Authenticatable implements HasMedia
{
    use InteractsWithMedia;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','mobile','active','area_id','city_id','street_address' ,'country_name_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function area()
    {
        return $this->belongsTo(City::class, 'area_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function wishlist()
    {
        return $this->belongsToMany(
            Product::class,
            'wishlists',
            'user_id',
            'product_id'
        );
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id')->orderBy('orders.id', 'DESC');
    }
}
