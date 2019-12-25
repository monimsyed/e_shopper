<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class HomeController extends Controller
{
    public function index()
    {
      $all_product_info = DB::table('tbl_products')
      ->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')
      ->join('tbl_manufacture', 'tbl_products.manufacture_id', '=', 'tbl_manufacture.manufacture_id')
      ->select('tbl_products.*','tbl_category.category_name', 'tbl_manufacture.manufacture_name')
      ->where('tbl_products.publication_status', 1)
      ->get();
      return view('pages.home_content')->with('all_product_info', $all_product_info);
    }
    public function show_product_by_category($category_id)
    {
      $product_by_category = DB::table('tbl_products')
      ->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')
      ->select('tbl_products.*','tbl_category.category_name')
      ->where('tbl_category.category_id', $category_id)
      ->where('tbl_products.publication_status', 1)
      ->get();
      return view('pages.products_by_category')->with('product_by_category', $product_by_category);
    }
    public function show_product_by_manufacture($manufacture_id)
    {
      $product_by_manufacture = DB::table('tbl_products')
      ->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')
      ->join('tbl_manufacture', 'tbl_products.manufacture_id', '=', 'tbl_manufacture.manufacture_id')
      ->select('tbl_products.*','tbl_category.category_name', 'tbl_manufacture.manufacture_name')
      ->where('tbl_manufacture.manufacture_id', $manufacture_id)
      ->where('tbl_products.publication_status', 1)
      ->get();
      return view('pages.products_by_manufacture')->with('product_by_manufacture', $product_by_manufacture);
    }
    public function product_details_by_id($product_id)
    {
      $product_details = DB::table('tbl_products')
      ->join('tbl_category', 'tbl_products.category_id', '=', 'tbl_category.category_id')
      ->join('tbl_manufacture', 'tbl_products.manufacture_id', '=', 'tbl_manufacture.manufacture_id')
      ->select('tbl_products.*','tbl_category.category_name', 'tbl_manufacture.manufacture_name')
      ->where('tbl_products.product_id', $product_id)
      ->where('tbl_products.publication_status', 1)
      ->first();
      return view('pages.product_details')->with('product_details', $product_details);
    }
}
