<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
	protected $fillable = ['rating', 'comment', 'status', 'product_id', 'user_id'];

	public function product()
	{
		return $this->belongsTo(Product::class, 'product_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'user_id');
	}

}
