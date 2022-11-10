<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\SmsaShipment;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:list-orders', ['only' => ['index']]);
        $this->middleware('permission:create-orders', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-orders', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-orders', ['only' => ['destroy']]);
    }

    public static function exportEx($items, $title = '', $fileType = 'xlsx')
    {
        $items = $items->get()
            ->map(function ($row) {
                return [
                    'order_id' => $row->order_id,
                    'name' => $row->name,
                    'mobile' => $row->mobile,
                    'payment_method' => t($row->payment_method, 'site'),
                    'status' => t($row->status, 'site'),
                    'coupon_code' => $row->coupon_code ?? '',
                    'discount' => $row->discount ?? '',
                    'total_item_count' => $row->total_item_count ?? '',
                    'sub_total' => $row->sub_total ?? '',
                    'total' => $row->total ?? '',
                    'notes' => $row->notes,

                ];
            });

        return parent::exportEx($items, $title, $fileType);
    }

    public static function exportPdf($items)
    {
        $headers = ['order_id', 'name', 'mobile', 'payment_method', 'status', 'coupon_code', 'discount', 'total_item_count', 'sub_total', 'total', 'notes'];
        $items = $items->get()
            ->map(function ($row) {
                return [
                    'order_id' => $row->order_id,
                    'name' => $row->name,
                    'mobile' => $row->mobile,
                    'payment_method' => t($row->payment_method, 'site'),
                    'status' => t($row->status, 'site'),
                    'coupon_code' => $row->coupon_code ?? '',
                    'discount' => $row->discount ?? '',
                    'total_item_count' => $row->total_item_count ?? '',
                    'sub_total' => $row->sub_total ?? '',
                    'total' => $row->total ?? '',
                    'notes' => $row->notes,

                ];
            });
        return parent::export($headers, $items, 'orders.index', 'categories');
    }

    public function index(Request $request)
    {
        $items = Order::query();
        /* Filters */
        if (isset($request['status']) && !empty($request['status'])) {
            $items->where('status', $request['status']);
        }

        if (isset($request['user_id']) && !empty($request['user_id'])) {
            $items->where('user_id', $request['user_id']);
        }

        if (isset($request['from']) && $request['from']) {
            $items->whereDate('created_at', '>=', $request['from']);
        }

        if (isset($request['to']) && $request['to']) {
            $items->whereDate('created_at', '<=', $request['to']);
        }

        parent::search($items, $request, ['order_id', 'sub_total']);
        if (isset($request['export'])) {
            return self::exportPdf($items);
        }

        if (isset($request['exportEx'])) {

            return self::exportEx($items, 'orders', $request['exportEx']);
        }

        $items = $items->withCount('products')->orderBy('id', 'DESC')->paginate(15);

        $customers = User::whereHas('orders')->get();

        return view('admin.pages.orders.index', compact('items', 'customers'));
    }

    public function show($id)
    {
        $item = Order::whereId($id)->first();
        return view('admin.pages.orders.show', compact('item'));
    }

    public function change_status($order_id, $status)
    {
        $order = Order::with('products', 'user', 'city')->whereId($order_id)->first();



        // if(Auth::user()->can('change-order-status')){
        if ($status == 'confirmed') {
            $empty =  $order->products->filter(function ($product, $key) {
                return ($product->slug == null ||  $product->slug == '');
            });
            if (sizeof($empty) > 0) {
                return redirect()->back()->with('message-eroor', __('admin.messages.order status changed went wrrong'));
            }
            $token = $this->api_token();

            $query = $this->createPrashesOrder($order);
            //   $query = $this->acountInfo();
            $resp =      $this->api($order->order_id, $query, $token);
            $resp = json_decode($resp, true);
            if (isset($resp['errors'])) {
                // if there is not product in the shipping you should create one
                return  $resp['errors'];
            }
            $query = $this->createOrderShipping($order);
            $resp =      $this->api($order->order_id, $query, $token);
            $resp = json_decode($resp, true);
            if (isset($resp['errors'])) {
                // if there is not product in the shipping you should create one
                return  $resp['errors'];
            }
            foreach ($order->products as $product) {

                $product->reduceQuantityBy($product->pivot->quantity);
            }

            // $shipment = $this->creatShipment($order);
            // $shipment = $this->getShipCharges($order);

        } else if ($status == 'cancel') {
            if ($order->status == 'confirmed') {
                //Increase stock
                foreach ($order->products as $product) {
                    $product->increaseQuantity($product->pivot->quantity);
                }
            }
        }
        $order->update(['status' => $status]);
        // }
        return redirect()->back()->with('message-success', __('admin.messages.order status changed Successfull'));
    }

    public function creatShipment($order)
    {

        $data = $this->shipmentData($order);
        $smsaShipment = new SmsaShipment;
        $smsaShipment->Shipping($data);
        // $smsaShipment->getRTLCities();
    }

    public function shipmentData($order)
    {
        $data['refno'] = $order->order_id; //Mandatory
        $data['idNo'] = ''; //optional
        $data['cName'] = $order->name; //Mandatory Name Of Customer
        $data['cCity'] = $order->city ? $order->city->name : ''; //Consignee City
        $data['cZip'] = ''; //optional Consignee Zip code
        $data['cPOBox'] = ''; //optional Consignee PO Box
        $data['cMobile'] = $order->mobile; //Mandatory mobile Of Customer
        $data['cTel1'] = '';
        $data['cTel2'] = '';
        $data['cAddr1'] = $order->street_address;
        $data['cAddr2'] = '';
        $data['PCs'] = intval($order->total_item_count);
        $data['cEmail'] = $order->user ? $order->user->email : '';
        $data['carrValue'] = $order->shipping_price ?? 0; //Shipment Amout
        $data['codAmt'] = $order->payment_method == 'pay_on_delivery' ? ($order->discount ? $order->sub_total - $order->discount : $order->sub_total) : 0;
        $data['weight'] = '10';
        $data['itemDesc'] = $order->notes ?? '';
        $data['custVal'] = ''; //Customs Value
        $data['custCurr'] = ''; //Customs Curruncy
        $data['insrAmt'] = '';
        $data['insrCurr'] = '';
        $data['prefDelvDate'] = '';
        $data['gpsPoints'] = '';
        return $data;
    }

    public function getShipCharges($order)
    {
        $data['destCity'] = $order->city ? $order->city->name : '';
        // $data['codAmt']    = $order->payment_method == 'pay_on_delivery' ? ($order->discount ? $order->sub_total - $order->discount : $order->sub_total) : 0;
        $data['codAmt'] = 150;
        $data['weight'] = '10';
        $smsaShipment = new SmsaShipment;
        // $smsaShipment->getShipCharges($data);
        $smsaShipment->getRTLCities();
        // $smsaShipment->Tracking('290304041598');
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
    public function createProductShipping($name = "", $amount = 0, $price = 0, $sku = "", $code = null)
    {
        return  $query = 'mutation {
        product_create(
          data: {
            name: "' . $name . '"
            sku: "' . $sku . '"
            price: "' . $price . '"
            warehouse_products: {
              warehouse_id: "14805"
              on_hand: ' . $amount . '
              inventory_bin: "Bin A1"
              reserve_inventory: 0
              replenishment_level: 1
              reorder_level: 1
              reorder_amount: 20
              custom: false
            }
            value: "15.00"
            barcode: "' . $code . '"
            country_of_manufacture: "US"
            dimensions: { weight: "", height: "", width: "", length: "" }
            kit: false
            kit_build: false
            no_air: false
            final_sale: false
            customs_value: "1.00"
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
    public function createOrderShipping($order)
    {
        $method = $order->shipping_method??'Ground';
        $query = 'mutation {
            order_create(
              data: {
                order_number: "' . $order->order_id . '"
                shop_name: "Nephele"
                fulfillment_status: "pending"
                order_date: "' . $order->created_at . '"
                total_tax: "' . $order->vatAmount . '"
                subtotal: "' . $order->sub_total . '"
                total_discounts: "' . $order->discount . '"
                total_price: "' . $order->total . '"
                shipping_lines: {
                  title: "UPS"
                  price: "' . $order->shipping_price . '"
                  carrier: "UPS"
                  method: "' . $method  . '"
                }shipping_address: {
                  first_name: "' . $order->user->name . '"
                  last_name: "' . $order->user->name . '"
                  company: ""
                  address1: "' . $order->street_address . '"
                  address2: "' . $order->street_address . '"
                  city: "' . $order->city->getTranslation('name', 'en')->name . '"
                  state: "' . $order->city->getTranslation('name', 'en')->name . '"
                  state_code: "OK"
                  zip: "1111"
                  country: "SA"
                  country_code: "SA"
                  email: "' . $order->user->mobile . '"
                  phone: "' . $order->user->mobile . '"
                }
                billing_address: {
                  first_name: "' . $order->user->name . '"
                  last_name: "' . $order->user->name . '"
                  company: ""
                  address1: "' . $order->street_address . '"
                  address2: "' . $order->street_address . '"
                  city: "' . $order->city->getTranslation('name', 'en')->name . '"
                  state: "' . $order->city->getTranslation('name', 'en')->name . '"
                  state_code: "OK"
                  zip: "73008"
                  country: "SA"
                  country_code: "SA"
                  email: "' . $order->user->mobile . '"
                  phone: "' . $order->user->mobile . '"
                }
                line_items: [
                    ';
        foreach ($order->products as $product) {
            $query .=   '{
                            sku: "' . $product->slug . '"
                            partner_line_item_id: "' . $order->order_id . '"
                            quantity: 1
                            price: "' . $product->price . '"
                            product_name: "' . $product->slug . '"
                            fulfillment_status: "pending"
                            quantity_pending_fulfillment: 1
                            warehouse_id: "14805"
                     }';
        }
        return $query .= ' ]
                required_ship_date: "' . Carbon::now() . '"
              }
            ) {
              request_id
              complexity
              order {
                id
                order_number
                shop_name
                fulfillment_status
                order_date
                total_tax
                subtotal
                total_discounts
                total_price
                custom_invoice_url
                account_id
                email
                profile
                packing_note
                required_ship_date
                shipping_address {
                  first_name
                  last_name
                  company
                  address1
                  address2
                  city
                  state
                  state_code
                  zip
                  country
                  country_code
                  email
                  phone
                }
                line_items(first: 1) {
                  edges {
                    node {
                      id
                      sku
                      product_id
                      quantity
                      product_name
                      fulfillment_status
                      quantity_pending_fulfillment
                      quantity_allocated
                      backorder_quantity
                      eligible_for_return
                      customs_value
                      warehouse_id
                      locked_to_warehouse_id
                    }
                  }
                }
              }
            }
          }';
    }
    public function createPrashesOrder($order)
    {
        $query = 'mutation {
  purchase_order_create(
    data: {po_date: "' . Carbon::now() . '"
      po_number: ""
      subtotal: "' . $order->sub_total . '"
      tax: "' . $order->vatAmount . '"
      shipping_price: "' . $order->shipping_price . '"
      total_price: "' . $order->total . '"
      warehouse_id: "14805"
      line_items: [
        ';
        foreach ($order->products as $product) {
            $query .=   '{sku: "' . $product->slug . '"
           quantity: 1
           expected_weight_in_lbs: "0.00"
           vendor_id: "495867"
           quantity_received: 0
           quantity_rejected: 0
           price: "' . $product->price . '"
           product_name: "' . $product->slug . '"
           fulfillment_status: "pending"
           sell_ahead: 0
         }';
        }
        return $query .= ' ]
      fulfillment_status: "pending"
      discount: "0.00"
      vendor_id: "495867"
    }
  ) {
    request_id
    complexity
    purchase_order {
      id
      po_number
      account_id
      warehouse_id
      vendor_id
      created_at
      po_date
      date_closed
      packing_note
      fulfillment_status
      po_note
      description
      subtotal
      discount
      total_price
      tax
      shipping_method
      shipping_carrier
      shipping_name
      shipping_price
      tracking_number
      payment_method
      payment_due_by
      payment_note
      locking
      locked_by_user_id
      line_items(first: 1) {
        edges {
          node {
            id
            sku
          }
        }
      }
    }
  }
}';
    }



    private function acountInfo()
    {
        // view:warehouse_products
        $query = 'query {
        account {
          complexity
          request_id
          data {
            id
            legacy_id
            email
            username
            status
            is_3pl
            warehouses {
              id
              legacy_id
              identifier: "14805"
            }
          }
        }
      }';
    }
}
