<?php

namespace App;
use App\CartStorage;
use App\Product;
use Auth;
use DB;
use Illuminate\Support\Facades\Validator;
use Session;
class Cart
{
	protected $session;
	protected $sessionKey;
	protected $sessionKeyCartItems;
	protected $currentItemId;

	public function __construct(Session $session)
	{
		$this->session = $session;
	}

	public static function __callStatic($name, $arguments)
	{
		if(!isset($arguments[0])){
			$dbRow = CartStorage::where('user_id', Auth::id())->first();
			if($dbRow){
				$sessionKey = $dbRow->session_key;
			}else{
				$sessionKey = 'NULL';
                // throw new \Exception("Session key is required.");
			}
		}else{
			$sessionKey = $arguments[0];
		}
		$session = new Session;
		return (new self($session))->get($sessionKey);
	}

	public function get($sessionKey)
	{
		if(!$sessionKey)
			throw new \Exception("Session key is required.");
		$this->sessionKey = $sessionKey;
		$this->sessionKeyCartItems = 'SAR_' . $sessionKey;
		return $this;
	}

	public function add($id, $name = null, $description = null, $price = null, $quantity = null, $thumb = null, $attributes = [])
	{
		if(is_array($id)){
			$this->add(
				$id['id'],
				$id['name'],
				$id['description'],
				$id['price'],
				$id['quantity'],
				$id['thumb'] ?? null,
				$id['attributes'] ?? null
			);
			return $this;
		}
		$data = array(
			'id' 		  => $id,
			'name' 		  => $name,
			'description' => $description,
			'price' 	  => self::normalizePrice($price),
			'quantity' 	  => $quantity,
			'thumb' 	  => $thumb,
			'attributes'  => $attributes,
		);

		$item = $this->validate($data);

    	// get the cart
		$cart = $this->getContentWithId();
        // dd($size == $cart[$id]['size']);
        // dd($cart[$id]);
		if (isset($cart[$id])) {
			$this->update($id, $item);
		} else {
			$this->addRow($id, $item);
		}

		return $this;
	}

	public function addRow($id, $item)
	{
		$cart = $this->getContentWithId();

		$cart[$id] = $item;

		$this->updateCartStorage($cart);

		$this->saveToSession($cart);

		return true;
	}

	public function getContent()
	{
		$data = $this->session::get($this->sessionKeyCartItems);
		if(!$data){
			$data = $this->getCartStorageData();
		}
		$return = [];
		if($data && count($data) > 0){
			$return = Product::with('variants', 'parent')->whereIn('id', array_keys($data))->get()->map(function($row) use($data){
				return [
					'id'            => $row->id,
					'slug'            => $row->parent ? $row->parent->slug : $row->slug,
					'product_id'    => $row->id,
					'name'          => $row->parent ? $row->parent->name : $row->name,
					'description'   => $row->parent ? $row->parent->description : $row->description,
					'price'         => self::normalizePrice($data[$row->id]['price']),
					'quantity'      => $data[$row->id]['quantity'],
					'thumb'         => $data[$row->id]['thumb'],
					'attributes'=> $data[$row->id]['attributes'],
				];
			});
		}
		return $return;
	}

	public function getContentWithId()
	{
		$data = $this->session::get($this->sessionKeyCartItems);
		if(!$data){
			$data = $this->getCartStorageData();
		}
		return $data;
	}

	public function update($id, $data, $changeQuantity = false)
	{
		$cart = $this->getContentWithId();
		$itemToBeUpdated = $cart[$id];
		foreach ($data as $key => $value) {
			if($key == 'quantity'){
				if($changeQuantity){
					$itemToBeUpdated['quantity'] = $value;
				}else{
					$itemToBeUpdated['quantity'] = $this->updateQuantity($itemToBeUpdated['quantity'], $value);
				}
			}else if ($key != 'price'){
				$itemToBeUpdated[$key] = $value;
			}
		}

		$cart[$id] = $itemToBeUpdated;

		$this->updateCartStorage($cart);

		$this->saveToSession($cart);

		return true;
	}

	public function getCartStorageData()
	{
		if(Auth::user()){
			$dbRow = CartStorage::where(function($q){
				$q->where('session_key', $this->sessionKeyCartItems);
				$q->orWhere('user_id', Auth::id());
			})->first();
		}else{
			$dbRow = CartStorage::where('session_key', $this->sessionKeyCartItems)->first();
		}
		if($dbRow){
			return json_decode($dbRow->cartData, true);
		}else{
			return null;
		}
	}

	public function updateCartStorage($cart)
	{
		$dbRow = CartStorage::where('session_key', $this->sessionKeyCartItems)->first();
		$authId = Auth::user() ? Auth::id() : null;
		if($dbRow){
			$dbRow->update(['cartData' => json_encode($cart), 'user_id' => $authId]);
		}else{
			CartStorage::create(['session_key' => $this->sessionKeyCartItems, 'cartData' => json_encode($cart), 'user_id' => $authId]);
		}
	}

	public function clearCartStorage()
	{
		$dbRow = CartStorage::where('session_key', 'SAR_' . str_replace('SAR_', '', $this->sessionKeyCartItems))->first();
		if($dbRow){
			$dbRow->delete();
		}
	}

	public function remove($id)
	{
		$cart = $this->getContentWithId();

		if(isset($cart[$id]))
			unset($cart[$id]);

		$this->updateCartStorage($cart);

		$this->saveToSession($cart);

		return true;
	}

	public function clear()
	{
		$this->session::put(
			$this->sessionKeyCartItems,
			array()
		);

		$this->clearCartStorage();

		return true;
	}

	public function getTotalQuantity()
	{
		$items = $this->getContentWithId();
		$count = 0;
		if (is_null($items) || count($items) == 0) return $count;
		foreach ($items as $id => $item) {
			$count += $item['quantity'];
		}
		return $count;
	}

	public function getTotalPrice()
	{
		$items = $this->getContent();
		$totalPrice = 0.00;
		if (is_null($items) || count($items) == 0) return $totalPrice;

		foreach ($items as $id => $item) {
			$totalPrice += $item['quantity'] * $item['price'];
		}
		return $totalPrice;
	}

	protected function saveToSession($cart)
	{
		$this->session::put($this->sessionKeyCartItems, $cart);
	}

	public function updateQuantity($oldQuantity, $newQuantity)
	{
		if (preg_match('/\-/', $newQuantity) == 1) {
			$newQuantity = (int)str_replace('-', '', $newQuantity);
			if (($oldQuantity - $newQuantity) > 0) {
				return $oldQuantity - $newQuantity;
			}
		} elseif (preg_match('/\+/', $newQuantity) == 1) {
			return $oldQuantity + $newQuantity;
		} else {
			return $oldQuantity + $newQuantity;
		}
	}

	protected function validate($item)
	{
		$rules = array(
			'id' => 'required',
			'name' => 'required',
			'price' => 'required|numeric',
			'quantity' => 'required|numeric|min:1',
		);

		$validator = Validator::make($item, $rules);

		if ($validator->fails()) {
			throw new \Exception($validator->messages()->first());
		}

		return $item;
	}

	public function has($id)
	{
		$cart = $this->getContentWithId();
		return $cart && count($cart) > 0 && isset($cart[$id]);
	}

	public function count()
	{
		$data = $this->getContentWithId();
		return $data ? count($data) : 0;
	}

	public static function normalizePrice($price)
	{
		return (is_string($price)) ? floatval($price) : $price;
	}
}
