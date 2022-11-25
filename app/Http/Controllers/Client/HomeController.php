<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Product;
use Illuminate\Pagination\Paginator;

class HomeController extends Controller
{
  public function home(Request $request)
  {
    $data = DB::table('category')
      ->join('product', 'product.cid', '=', 'category.id')
      ->orderBy('product.created_at', 'DESC')
      ->Paginate(7);

    $product = DB::table('category')
      ->join('product', 'product.cid', '=', 'category.id')
      ->where("product.status", "=", "1")
      ->orderBy('product.created_at', 'DESC')
      ->get();

    // echo "<pre>";
    // print_r($product);
    // die();

    return view('Client.home')->with(["data" => $data, "product" => $product]);
  }


  public function pages($imageid)
  {
    $data = DB::table('category')
      ->join('product', 'product.cid', '=', 'category.id')
      // ->join('productdetail', 'productdetail.pid', '=', 'product.id')
      ->where("product.id", $imageid)
      ->orderBy('product.created_at', 'DESC')
      ->get();

    $pdetail = DB::table('product')
      ->join('productdetail', 'productdetail.pid', '=', 'product.id')
      ->where("product.id", $imageid)
      ->select('productdetail.pimage', 'productdetail.des', 'productdetail.ptitle')
      ->get();

    $latest = DB::table('category')
      ->join('product', 'product.cid', '=', 'category.id')
      ->orderBy('product.created_at', 'DESC')
      ->Paginate(5);

    $product = DB::table('category')
      ->join('product', 'product.cid', '=', 'category.id')
      ->where("product.status", "=", "1")
      ->orderBy('product.created_at', 'DESC')
      ->get();

    return view('Client.pages')->with(["data" => $data, "product" => $product, "pdetail" => $pdetail, 'latest' => $latest]);
  }

  public function postpage(Request $request, $id)
  {

    $data = DB::table('category')
      ->join('product', 'product.cid', '=', 'category.id')
      ->where("category.cname", $id)
      ->orderBy('product.created_at', 'DESC')
      ->Paginate(5);

    $product = DB::table('category')
      ->join('product', 'product.cid', '=', 'category.id')
      ->where("product.status", "=", "1")
      ->orderBy('product.created_at', 'DESC')
      ->get();

    //   $productQuery = Product::query();
    //   if ($request->cat) {
    //   $productQuery->where("cid", $$request->cat);
    //   }
    //   $productData = $productQuery->get();

    // echo "<pre>";
    // print_r($data);
    // die();
    return view("Client.postpage")->with(['data' => $data, 'product' => $product]);
  }
  public function contect(Request $request)
  {
    $data = DB::table('category')
      ->join('product', 'product.cid', '=', 'category.id')
      ->orderBy('product.created_at', 'DESC')
      ->Paginate(7);

    $product = DB::table('category')
      ->join('product', 'product.cid', '=', 'category.id')
      ->where("product.status", "=", "1")
      ->orderBy('product.created_at', 'DESC')
      ->get();

    return view('Client.contect')->with(["data" => $data, "product" => $product]);
  }

  public function addcontact(Requestp $request)
  {

    $data = $request->all();

    if ($data['name'] != '' && $data['email'] != '' && $data['message'] != '') {
      $ans = DB::table('contact')->insert(["name" => $data['name'], "email" => $data['email'], "message" => $data['message']]);
      return redirect()->back()->with('message', ' Message Send Sucessfully!');
    } else {
      return redirect()->back()->with('error', 'Please Fill All Fields');
    }
  }
}
