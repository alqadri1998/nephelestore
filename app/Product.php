<?php

namespace App;
use App\Category;
use App\Product;
use App\ProductColor;
// use App\ProductReview;
use App\Traits\Sluggable;
use App\Traits\WithTranslationTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements TranslatableContract, HasMedia {
	use Translatable;
	use InteractsWithMedia;
	use Sluggable;
	use WithTranslationTrait;

	protected $fillable = [
		'slug',
		'price',
		'active',
		'new',
		'stock',
		'category_id',
		'size_id',
		'color_id',
		'brand_id',
		'special_price',
		// variants key
		'parent_id',
		'weight',
		'featured',
        //product_id with package
        'pag_id'
	];
	public $translatedAttributes = [
		'name',
		'description',
		// 'description_more'
	];
	public $hidden = ['translations', 'media'];

	public function category() {
		return $this->belongsTo(Category::class, 'category_id');
	}

	// public function size()
	// {
	// 	return $this->belongsTo(ProductSize::class, 'size_id');
	// }

	// public function sizes()
	// {
	// 	return $this->variants()->select('product_sizes.size', 'products.id')
	// 	->join('product_sizes', 'product_sizes.id', '=', 'products.size_id')
	// 	->pluck('product_sizes.size', 'products.id')
	// 	->toArray();
	// }

	public function color() {
		return $this->belongsTo(ProductColor::class, 'color_id');
	}

	public function colors() {
		return $this->variants()->select('product_colors.color', 'products.id')
			->join('product_colors', 'product_colors.id', '=', 'products.color_id')
			->where('products.stock', '>', 0)
			->pluck('product_colors.color', 'products.id')
			->toArray();
	}

	public function variants() {
		return $this->hasMany(Product::class, 'parent_id');
	}
	public function reviews() {
		return $this->hasMany(ProductReview::class, 'product_id');
	}

	// public function getMinPriceAttribute()
	// {
	// 	return $this->variants()->min('price');
	// }

	// public function getMaxPriceAttribute()
	// {
	// 	return $this->variants()->max('price');
	// }

	// public function active_reviews()
	// {
	//     return $this->hasMany(ProductReview::class, 'product_id')->where('status', true);
	// }

	// public function get_reviews()
	// {
	// 	return $this->active_reviews()->select('users.first_name as name', 'product_reviews.created_at as date', 'product_reviews.comment', 'product_reviews.rating')
	// 								->join('users', 'users.id', '=', 'product_reviews.user_id')
	// 								->get();
	// }

	// public function rating()
	// {
	//     return $this->active_reviews()->sum('rating') > 0 ? round($this->active_reviews()->sum('rating') / $this->active_reviews()->count()) : 0;
	// }

	public function parent() {
		return $this->belongsTo(Product::class, 'parent_id');
	}

	public function getVariants() {
		return $this->variants()->select('products.id', 'products.color_id', 'stock', 'price', 'special_price', 'weight', 'product_colors.color', 'product_colors.name as color_name')
		// ->leftjoin('product_sizes', 'product_sizes.id', '=', 'products.size_id')
			->leftjoin('product_colors', 'product_colors.id', '=', 'products.color_id')

			->get()
			->toArray();
	}

	// public function getMinPrice($original = false)
	// {
	// 	if($this->variants()->count() > 0 && !$original){
	// 		return $this->variants()->min('price');
	// 	}
	// 	return $this->price;
	// }
	// public function getMinDiscountPrice()
	// {
	// 	if($this->variants()->count() > 0){
	// 		return $this->variants()->min('discount_price');
	// 	}
	// 	return $this->discount_price;
	// }

	public function reduceQuantityBy($quantity) {

		$this->update(['stock' => $this->stock - $quantity]);
		if ($this->parent) {
			$this->parent->update(['stock' => $this->parent->stock - $quantity]);
		}
	}
	public function increaseQuantity($quantity) {
		$this->update(['stock' => $this->stock + $quantity]);
		if ($this->parent) {
			$this->parent->update(['stock' => $this->parent->stock + $quantity]);
		}
	}
}
