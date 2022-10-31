<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class CartStorage extends Model
{
    protected $fillable = ['session_key', 'cartData', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
