<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Category;
use App\Helpers\MediaHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Product;
use App\ProductColor;
use App\ProductReview;
use App\ProductSize;
// use App\ProductSizeRelation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\Facades\FastExcel;
use Rap2hpoutre\FastExcel\FastExcel as FastExcelFastExcel;

class ProductController extends Controller
{
    // public function __construct()
    // {
    // 	$this->middleware('permission:list-products', ['only' => ['index']]);
    // 	$this->middleware('permission:create-products', ['only' => ['create', 'store']]);
    // 	$this->middleware('permission:edit-products', ['only' => ['edit', 'update']]);
    // 	$this->middleware('permission:delete-products', ['only' => ['destroy']]);
    // }

    public static function exportPdf($items)
    {
        $headers = ['name', 'category', 'price'];
        $items = $items->with('category')->get()
            ->map(function ($row) {
                return [
                    'name' => $row->name,
                    'category' => $row->category ? $row->category->name : '-',
                    'price' => '$' . $row->price,

                ];
            });
        return parent::export($headers, $items, 'products.index', 'products');
    }

    public function index(Request $request)
    {
        $items = Product::whereNull('parent_id');

        parent::search($items, $request, ['name', 'description'], true);
        if (isset($request['export'])) {
            return self::exportPdf($items);
        }

        if (isset($request['category_id']) && !empty($request['category_id'])) {
            $items->whereIn('category_id', $request['category_id']);
        }

        if (isset($request['status'])) {
            $items->where('active', $request['status']);
        }

        if (isset($request['date_from']) && !empty($request['date_from'])) {
            $items->whereDate('created_at', '>=', $request['date_from']);
        }

        if (isset($request['date_to']) && !empty($request['date_to'])) {
            $items->whereDate('created_at', '<=', $request['date_to']);
        }

        $items = $items->paginate(10);
        $categories = Category::where('active', true)->get();

        return view('admin.pages.products.index', compact('items', 'categories'));
    }

    public function create()
    {

        $categories = Category::where('active', true)->get();
        $products = Product::where('active', true)->whereNull('parent_id')->where('pag_id', 0)->get();

        $productColors = ProductColor::get();
        $productSizes = ProductSize::get();
        return view('admin.pages.products.create', compact('categories', 'productColors', 'productSizes', 'products'));
    }
    // public function createPackage()
    // {

    //     // $products = Category::where('active', true)->get();

    //     // $productColors = ProductColor::get();
    //     // $productSizes = ProductSize::get();
    //     // return view('admin.pages.products.create', compact('categories', 'productColors', 'productSizes'));
    //     return view('admin.pages.products.createPackage');
    // }

    public function store(ProductRequest $request)
    {
        // try{
        $requestData = $request->all();

        $requestData['active'] = isset($requestData['active']) ? 1 : 0;
        $requestData['new'] = isset($requestData['new']) ? 1 : 0;
        $requestData['featured'] = isset($requestData['featured']) ? 1 : 0;
        $mainPack =  $requestData['pag_id'] = isset($requestData['main_package']) ? 0 : 1;
        $store_shiping = isset($requestData['shipping_store']) ? 1 : 0;
        if (!isset($requestData['stock']) || is_null($requestData['stock'])) {
            $requestData['stock'] = 0;
        }
        if (isset($requestData['sub_package']) &&  $mainPack) {
            $requestData['pag_id'] = isset($requestData['sub_package']) ? $requestData['sub_package'] : 0;
        }
        if (isset($requestData['stock']) && !empty($requestData['stock']) && isset($requestData['variants']) && !empty($requestData['variants']['size'][0])) {
            return redirect()->back()->with('message-error', 'لا يمكن وضع مخزون للمنتج الرئيسي في وجود مقاسات له');
        }
        $product = Product::createWithTranslations($requestData);
        $product->generateSlug();
        $token = null;
        if ($store_shiping) {

            $token = $this->api_token();
        }
        if (isset($requestData['variants']) && count($requestData['variants']) > 0) {
            $length = count($requestData['variants']['color']);
            $quantity = $product->stock;
            $dataObject = [];
            for ($index = 0; $index < $length; $index++) {
                if ($requestData['variants']['color'][$index] || $requestData['variants']['color'][$index]) {
                    $dataObject['slug'] = null;
                    $dataObject['color_id'] = $requestData['variants']['color'][$index];
                    // $dataObject['size_id'] = $requestData['variants']['color'][$index];
                    $dataObject['stock'] = $requestData['variants']['stock'][$index] ?? 0;
                    $dataObject['price'] = $requestData['variants']['price'][$index] ?? 0;
                    $dataObject['weight'] = $requestData['variants']['weight'][$index] ?? 0.000;
                    $dataObject['special_price'] = $requestData['variants']['special_price'][$index] ?? 0;
                    $dataObject['parent_id'] = $product->id;
                    $dataObject['category_id'] = $requestData['category_id'];
                    $newProduct = $product->replicate();
                    $newProduct->push();

                    $newProduct->update($dataObject);
                    $newProduct->generateSlug();
                    $query = $this->createProductShipping($newProduct);
                    $this->api($newProduct, $query, $token);
                    $quantity += $dataObject['stock'];
                }
            }
            $product->stock = $quantity;
            $product->save();
        }

        if (isset($requestData['thumb'])) {
            MediaHelper::uploadMedia($product, $request, 'thumb', 'product', false, 'thumb', 300);
        }

        if (isset($requestData['images'])) {
            MediaHelper::uploadMedia($product, $request, 'images', 'product', false, 'images', 600);
        }

        if ($store_shiping) {
            DB::beginTransaction();
            try {
                $item = Product::find($product->id);



                $query = $this->createProductShipping($item);
                //   $query = $this->acountInfo();
                $resp =      $this->api($item, $query, $token);
                // $resp = json_decode($resp, true);

                DB::commit();
                //code...
            } catch (\Throwable $th) {
                //throw $th;
                DB::rollBack();

                return $th;
            }
        }

        //dd('s');
        return redirect()->route('admin.products.index')->with('message-success', __('admin.messages.Created Successfully'));
        // }catch(\Exception $e){
        // return redirect()->back()->with('message-error', $e->getMessage());
        // }
    }

    public function show($id)
    {
        $item = Product::find($id);

        return view('admin.products.show', compact('item'));

        return view('admin.pages.products.show', compact('item'));
    }
    public function excel()
    {
        $product = Product::get()->map(function ($q){
            return [
                'id'=>$q->id,
                'name_arabic'=>$q->translate('ar')->name,
                'name_english'=>$q->translate('en')->name,
                'slug'=>$q->slug,
            ];
        });
      return    (new FastExcelFastExcel($product))->download('products.xlsx');
    }

    public function edit($id)
    {
        $item = Product::find($id);
        $categories = Category::where('active', true)->get();
        $productColors = ProductColor::get();
        $productSizes = ProductSize::get();
        $products = Product::where('active', true)->whereNull('parent_id')->where('pag_id', 0)->get();
        // dd($item);
        return view('admin.pages.products.edit', compact('item', 'products', 'categories', 'productColors', 'productSizes'));
    }


    public function update(ProductRequest $request, $id)
    {
        // try {
        $requestData = $request->all();
        $requestData['active'] = isset($requestData['active']) ? 1 : 0;
        $requestData['new'] = isset($requestData['new']) ? 1 : 0;
        $requestData['featured'] = isset($requestData['featured']) ? 1 : 0;
        // dd($requestData);
        $mainPack =  $requestData['pag_id'] = isset($requestData['main_package']) ? 0 : 1;
        if (isset($requestData['sub_package']) &&  $mainPack) {
             $requestData['pag_id'] = isset($requestData['sub_package']) ? $requestData['sub_package'] : 0;
        }
             $product = Product::find($id);
           $product->updateWithTranslations($requestData);

        if (isset($requestData['variants']) && count($requestData['variants']) > 0) {
            $length = count($requestData['variants']['color']);
            $quantity = $product->stock;
            $dataObject = [];
            // if($length > 0){
            // 	$product->variants()->delete();
            // }
            if (isset($requestData['variants']['id'])) {
                $oldVariantsIds = $product->variants()->pluck('products.id')->toArray();
                $newVariantsIds = $requestData['variants']['id'];
                $diff = array_diff($oldVariantsIds, $newVariantsIds);
                if (count($diff) > 0) {
                    @Product::whereIn('id', $diff)->delete();
                }
            } else {
                $product->variants()->delete();
            }

            for ($index = 0; $index < $length; $index++) {
                if ($requestData['variants']['color'][$index] || $requestData['variants']['color'][$index]) {
                    $dataObject['slug'] = null;
                    $dataObject['color_id'] = $requestData['variants']['color'][$index];
                    // $dataObject['size_id'] = $requestData['variants']['color'][$index];
                    $dataObject['stock'] = $requestData['variants']['stock'][$index];
                    $dataObject['price'] = $requestData['variants']['price'][$index];
                    $dataObject['special_price'] = $requestData['variants']['special_price'][$index] ?? 0;
                    $dataObject['weight'] = $requestData['variants']['weight'][$index] ?? 0.000;
                    $dataObject['category_id'] = $requestData['category_id'];

                    $dataObject['parent_id'] = $product->id;
                    if (isset($requestData['variants']['id'][$index])) {
                        $newProduct = Product::find($requestData['variants']['id'][$index]);
                    } else {
                        $newProduct = $product->replicate();
                        $newProduct->push();
                    }
                    $newProduct->update($dataObject);
                    // if(is_null($newProduct->slug)){
                    // 	$newProduct->generateSlug();
                    // }

                    $quantity += $dataObject['stock'];
                }
            }
            $product->stock = $quantity;
            $product->save();
        }

        if (isset($requestData['thumb'])) {
            MediaHelper::uploadMedia($product, $request, 'thumb', 'product', true, 'thumb', 480);
        }

        if (isset($requestData['images'])) {
            MediaHelper::uploadMedia($product, $request, 'images', 'product', true, 'images', 1000);
        }

        return redirect()->route('admin.products.index')->with('message-success', __('admin.messages.updated Successfully'));
        // } catch (\Exception $e) {
        // 	return redirect()->back()->with('message-error', $e->getMessage());
        // }
    }

    public function destroy($id)
    {
        try {
            Product::find($id)->delete();
            return redirect()->back()->with('message-success', __('admin.messages.removed Successfull'));
        } catch (\Exception $e) {
            return redirect()->back()->with('message-error', $e->getMessage());
        }
    }

    public function product_reviews(Request $request)
    {
        $items = ProductReview::query()->with(['product' => function ($q) {
            return $q->with('parent');
        }]);

        parent::search($items, $request, ['comment']);

        $items = $items->orderBy('id', 'DESC')->paginate(20);
        // dd($items);
        return view('admin.pages.reviews.index', compact('items'));
    }
    public function reviews_active($id)
    {
        $item = ProductReview::find($id);
        $item->update(['status' => 1]);
        return redirect()->bacK();
    }

    public function reviews_unactive($id)
    {
        $item = ProductReview::find($id);
        $item->update(['status' => 0]);
        return redirect()->bacK();
    }
    private function api_token()
    {

        $request_url = "https://public-api.shiphero.com/auth/token";
        $data['username'] = "abbdo731@gmail.com"; //85532
        $data['password'] = "123456789"; //85532

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $request_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_CUSTOMREQUEST => isset($request_method) ? $request_method : 'POST',
            CURLOPT_POSTFIELDS => json_encode($data, true),
            CURLOPT_HTTPHEADER => array(
                'Content-Type:application/json'
            ),
        ));
        $json = curl_exec($curl);
        curl_close($curl);

        $json = json_decode($json, true);

        return $json["access_token"];
    }

    private function api($code = null,  $query = null, $token)
    {

        // if (!$code) {
        //     $code = rand(1000, 10000);
        // }

        // $query = null;
        $variables = '"ownerId": 161429,"perPage": 4';


        $json = json_encode(['query' => $query]);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://public-api.shiphero.com/graphql/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_VERBOSE, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
        curl_setopt(
            $curl,
            CURLOPT_HTTPHEADER,
            array(
                'User-Agent: PHP Script',
                'Content-Type: application/json;charset=utf-8',
                'Authorization: bearer ' . $token
            )
        );

        return    $response = curl_exec($curl);
        //echo $response;
    }
    public function createProductShipping($item)
    {
        //     return  $query = 'mutation {
        //     product_create(
        //       data: {
        //         name: "'.$item->name.'"
        //         sku: "'.$item->slug.'"
        //         price: "'.$item->price.'"
        //         warehouse_products: {
        //           warehouse_id: "14805"
        //           on_hand: 0
        //           inventory_bin: ""
        //           reserve_inventory: 0
        //           replenishment_level: 0
        //           reorder_level: 0
        //           reorder_amount: 0
        //           custom: false
        //         }
        //         value: ""
        //         barcode: ""
        //         country_of_manufacture: "SA"
        //         dimensions: { weight: "", height: "", width: "", length: "" }
        //         kit: false
        //         kit_build: false
        //         no_air: false
        //         final_sale: false
        //         customs_value: "0.00"
        //         not_owned: true
        //         dropship: false
        //       }
        //     ) {
        //       request_id
        //       complexity
        //       product {
        //         id
        //         legacy_id
        //         account_id
        //         name
        //         sku
        //         price
        //         value
        //         barcode
        //         country_of_manufacture
        //         dimensions {
        //           weight
        //           height
        //           width
        //           length
        //         }
        //         tariff_code
        //         kit
        //         kit_build
        //         no_air
        //         final_sale
        //         customs_value
        //         customs_description
        //         not_owned
        //         dropship
        //         created_at
        //       }
        //     }
        //   }';
        return  $query = 'mutation {
        product_create(
          data: {
            name: "' . $item->name . '"
            sku: "' . $item->slug . '"
            price: "' . $item->price . '"
            warehouse_products: {
              warehouse_id: "14805"
              on_hand: ' . $item->stock . '
              inventory_bin: ""
              reserve_inventory: 0
              replenishment_level: 0
              reorder_level: 0
              reorder_amount: 0
              custom: false
            }
            value: ""
            barcode: ""
            country_of_manufacture: "SA"
            dimensions: { weight: "", height: "", width: "", length: "" }
            kit: false
            kit_build: false
            no_air: false
            final_sale: false
            customs_value: "0.00"
            not_owned: true
            dropship: false
          }
        ) {
          request_id
          complexity
          product {
            id
            legacy_id
            account_id
            name
            sku
            price
            value
            barcode
            country_of_manufacture
            dimensions {
              weight
              height
              width
              length
            }
            tariff_code
            kit
            kit_build
            no_air
            final_sale
            customs_value
            customs_description
            not_owned
            dropship
            created_at
          }
        }
      }';
    }
    public function updateProductInventory($item)
    {

        return  $query = '{
            "account_id": 7556,
            "account_uuid": "QWNjb3VudDo3NTU2",
            "webhook_type": "Inventory Update",
            "inventory": [
                {
                    "sku": "100100",
                    "inventory": "37", // Use this value to update the quantities in the store
                    "backorder_quantity": "1",
                    "on_hand": "45",
                    "virtual": false,
                    "updated_warehouse": {
                        "warehouse_id": 13841,
                        "warehouse_uuid": "V2FyZWhvdXNlOjEzODQx",
                        "identifier": "CA",
                        "inventory": "35",// Use this value to update the quantities in the store

                        "backorder_quantity": "0",
                        "on_hand": "35"
                    }
                }
            ]
        }';
    }
}
