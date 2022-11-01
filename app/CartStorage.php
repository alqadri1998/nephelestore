<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class CartStorage extends Model
{
    protected $fillable = ['session_key', 'cartData', 'user_id'];
    protected $appends = ['data'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getDataAttribute()
    {
        if(isset($this->cartData)){
            return json_decode($this->cartData) ;
        }
        return [] ;


    }
}
