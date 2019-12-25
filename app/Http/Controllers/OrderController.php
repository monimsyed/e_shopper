<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class OrderController extends Controller
{
    public function manage_order()
    {
      $this->AdminAuthCheck();
      $all_order_info = DB::table('tbl_order')
      ->join('tbl_customer', 'tbl_order.customer_id', '=', 'tbl_customer.customer_id')
      ->select('tbl_order.*', 'tbl_customer.customer_name')
      ->get();
      return view('admin.manage_order')->with('all_order_info', $all_order_info);
    }
    public function active_order($order_id)
    {
      DB::table('tbl_order')
      ->where('order_id', $order_id)
      ->update(['order_status'=>'processed']);
      Session::put('message', 'Order processed !!');
      return Redirect::to('/manage-order');
    }
    public function unactive_order($order_id)
    {
      DB::table('tbl_order')
      ->where('order_id', $order_id)
      ->update(['order_status'=>'pending']);
      Session::put('message', 'Order pending !!');
      return Redirect::to('/manage-order');
    }
    public function view_order($order_id)
    {
      $this->AdminAuthCheck();
      $order_by_id = DB::table('tbl_order')
      ->join('tbl_customer', 'tbl_order.customer_id', '=', 'tbl_customer.customer_id')
      ->join('tbl_order_details', 'tbl_order.order_id', '=','tbl_order_details.order_id')
      ->join('tbl_shipping', 'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
      ->select('tbl_order.*', 'tbl_order_details.*', 'tbl_shipping.*','tbl_customer.*')
      ->where('tbl_order.order_id', $order_id)
      ->get();


      return view('admin.view_order')->with('order_by_id', $order_by_id);
    }
    public function delete_order($order_id)
    {
      DB::table('tbl_order')
      ->where('order_id', $order_id)
      ->delete();
      Session::put('message', 'Order deleted successfully !!');
      return Redirect::to('/manage-order');
    }
    public function AdminAuthCheck()
    {
      $admin_id = Session::get('admin_id');
      if($admin_id)
      {
        return;
      }
      else
      {
        return Redirect::to('/admin')->send();
      }
    }

}
