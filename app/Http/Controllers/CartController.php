<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
session_start();
class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
      $qty = $request->qty;
      $product_id = $request->product_id;
      $product_info = DB::table('tbl_products')
      ->where('product_id',$product_id)
      ->first();

      $data['id'] = $product_info->product_id;
      $data['name'] = $product_info->product_name;
      $data['qty'] = $qty;
      $data['price'] = $product_info->product_price;
      $data['weight'] = 111;
      $data['options']['image'] = $product_info->product_image;

      Cart::add($data);
      return Redirect::to('/show-cart');
    }
    public function show_cart()
    {
      $all_published_category =  DB:: table('tbl_category')
      ->where('publication_status', 1)
      ->get();

      return view('pages.add_to_cart')->with('all_published_category', $all_published_category);
    }
    public function delete_from_cart($rowId)
    {
      Cart::update($rowId, 0);
      return Redirect::to('/show-cart');
    }
    public function update_cart(Request $request)
    {
      $qty = $request->qty;
      $rowId = $request->rowId;
      Cart::update($rowId, $qty);
      return Redirect::to('/show-cart');
    }
}
