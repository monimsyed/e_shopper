<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use Illuminate\Support\Facades\Redirect;

session_start();
class CheckoutController extends Controller
{
    public function login_check()
    {
      if(Session::get('customer_id'))
      {
        return Redirect::to('/checkout');
      }
      else
      {
        Session::put('login-check', 'Please login to Checkout !!');
        return view('pages.login');
      }
    }
    public function customer_login(Request $request)
    {
      $data = array();
      $data['customer_email'] = $request->customer_email;
      $data['customer_password'] = $request->customer_password;

      $check_email = DB::table('tbl_customer')
      ->where('customer_email', $data['customer_email'])
      ->where('customer_password', md5($data['customer_password']))
      ->first();
      if($check_email)
      {
         // echo "<pre>";
         // print_r($check_email);
         // echo count($check_email);
         // echo "</pre>";
         Session::put('customer_id', $check_email->customer_id);
         Session::put('customer_name', $check_email->customer_name);
         return Redirect::to('/checkout');
      }
      else
      {
        Session::put('login-msg', 'Invaild email or password !!');
        return Redirect::to('/login-check');
      }
    }
    public function customer_registration(Request $request)
    {
      $data = array();
      $data['customer_name'] = $request->customer_name;
      $data['customer_email'] = $request->customer_email;
      $data['customer_password'] = md5($request->customer_password);
      $data['customer_mobile'] = $request->customer_mobile;

      $check_email = DB::table('tbl_customer')
      ->where('customer_email', $data['customer_email'])
      ->get();

      if(count($check_email)>0)
      {
        Session::put('reg-msg', 'Email already in use !!');
        return Redirect::to('/login-check');
      }
      else
      {
        $customer_id  = DB::table('tbl_customer')
        ->insertGetId($data);
        Session::put('customer_id', $customer_id);
        Session::put('customer_id', $data['customer_name']);
        return Redirect::to('/checkout');
      }
    }
    public function checkout()
    {
      if(Session::get('shipping_id'))
      {
        return Redirect::to('/payment');
      }
      else
      {
        return view('pages.checkout');
      }

    }
    public function save_shipping_details(Request $request)
    {
      $data = array();
      $data['shipping_email'] = $request->shipping_email;
      $data['shipping_first_name'] = $request->shipping_first_name;
      $data['shipping_last_name'] = $request->shipping_last_name;
      $data['shipping_address'] = $request->shipping_address;
      $data['shipping_mobile_number'] = $request->shipping_mobile_number;
      $data['shipping_city'] = $request->shipping_city;

      $shipping_id = DB::table('tbl_shipping')
      ->insertGetId($data);
      Session::put('shipping_id', $shipping_id);
      return Redirect::to('/payment');
    }
    public function customer_logout()
    {
      Session::flush();
      return Redirect::to('/');
    }
    public function order_place(Request $request)
    {
      $payment_method = $request->payment_method;
      $pdata = array();
      $pdata['payment_method'] = $payment_method;
      $pdata['payment_status'] = 'pending';
      $payment_id = DB::table('tbl_payment')
      ->insertGetId($pdata);

      $odata = array();
      $odata['customer_id'] = Session::get('customer_id');
      $odata['shipping_id'] = Session::get('shipping_id');
      $odata['payment_id'] = $payment_id;
      $odata['order_total'] = Cart::total();
      $odata['order_status'] = "pending";

      $order_id = DB::table('tbl_order')
      ->insertGetId($odata);

      $contents = Cart::content();
      $oddata = array();

      foreach ($contents as $contents)
      {
        $oddata['order_id'] = $order_id;
        $oddata['product_id'] = $contents->id;
        $oddata['product_name'] = $contents->name;
        $oddata['product_price'] = $contents->price;
        $oddata['product_sales_quantity'] = $contents->qty;

        DB::table('tbl_order_details')
        ->insert($oddata);
      }

      if($payment_method=='handcash')
      {
        Cart::destroy();
        return view('pages.handcash');
      }
      else if($payment_method=='card')
      {
        echo "done by card";
      }
      else if($payment_method=='bkash')
      {
        echo "done by bkash";
      }
      else
      {
        echo "not selected";
      }

    }
    public function payment()
    {
      return view('pages.payment');
    }
}
