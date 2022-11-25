<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Session;
use Illuminate\Http\Request;


class ProductController extends Controller
{
  public function addproductindex()
  {
    return view('Admin.addproduct');
  }


  public function addproduct(Request $request)
  {
    if ($request->isMethod('get')) {
      return view('Admin.addproduct');
    } else {
      $data = $request->all();

      if (@$data['item_img'] != '') {
        $img = array();
        if ($files = $request->file('item_img')) {
          foreach ($files as $file) {
            $name = $file->getClientOriginalName();
            $t = time() . $name;
            // $t=time().".".$name;
            $img = explode(".", $t);

            $file->move(public_path('item_img'), $t);
            $image[] = $t;
          }
        }


        if ($img[1] == 'png' ||  $img[1] == "jpg" ||  $img[1] == "jpeg") {
          if ($request->input('populer') === '1') {
            $ans = DB::table('product')->insertGetId(["cid" => $data['category_id'], "title" => $data['title'], "item_img" => implode(",", $image), "description" => $data['description'], 'status' => $data['populer']]);
          } else {
            $ans = DB::table('product')->insertGetId(["cid" => $data['category_id'], "title" => $data['title'], "item_img" => implode(",", $image), "description" => $data['description'], 'status' => '0']);
          }

          return redirect()->back()->with('message', ' Item Insert Sucessfully!');
        } else {
          return redirect()->back()->with('error', 'Invalid Image Type');
        }
      } else {
        return redirect()->back()->with('error', 'Please Enter Item Images');
      }
    }
  }

  public function showproduct(Request $request)
  {
    $requestData = ['cname', 'title'];
    $search = $request->input('search');

    $data = DB::table('category')
      ->join('product', 'product.cid', '=', 'category.id')
      ->where(function ($q) use ($requestData, $search) {
        foreach ($requestData as $field)
          $q->orWhere($field, 'like', "%{$search}%");
      })
      ->select('category.cname', 'product.*')
      ->orderBy('product.created_at', 'DESC')
      ->Paginate(7);

    // echo "<pre>";
    // print_r($data);
    // die();

    return view('Admin.showproduct')->with(['data' => $data, 'search' => $search]);
  }

  public function showproductdetail($imageid)
  {

    $data = DB::table('product')
      ->join('category', 'category.id', '=', 'product.cid')
      ->where("product.id", $imageid)
      ->select('product.*', 'category.cname')
      ->get();

    return view('Admin.showproductdetail')->with(["data" => $data]);
  }

  public function productdelete($id)
  {
    $data = DB::table('product')->where('id', $id)->delete();
    return redirect()->back();
  }


  public function addimagedetail(Request $request)
  {
    $data = $request->all();

    if (@$request->file('pimage') != '') {
      if ($request->hasFile('pimage')) {
        $poster = $request->file('pimage');
        $pname = $poster->getClientOriginalName();
        $pimage = time() . $pname;
        $poster->move(public_path('pimage'), $pimage);
      }

      $ans = DB::table('productdetail')->insert(['pid' => $data['pid'], 'ptitle' => $data['ptitle'], "pimage" => $pimage, 'des' => $data['des']]);
      return redirect()->back()->with('message', 'Insert Coverphoto Sucessfully!');
    } else {
      return redirect()->back()->with('error', 'please select photo');
    }
  }


  public function updatemyitem($id)
  {
    $data = DB::table('product')->where('id', $id)->first();
    $category = DB::table('category')->get();

    return view('Admin.editproduct')->with(['data' => $data, 'category' => $category]);
  }

  public function editmyitem(Request $request)
  {
    $time = date('Y-m-d H:i:s', time());


    $data = $request->all();

    if (@$data['image'] != '') {
      $img = array();
      if ($files = $request->file('image')) {
        foreach ($files as $file) {
          $name = $file->getClientOriginalName();
          $img = explode(".", $name);
          $t = time() . "." . $img[1];
          if ($img[1] == 'png' ||  $img[1] == "jpg" ||  $img[1] == "jpeg") {
            $file->move(base_path('public/item_img'), $t);
            if ($request->input('populer') === '1') {
              DB::table('product')->where('id', $data['id'])->update(["cid" => $data['cid'], "title" => $data['title'], "item_img" => $t, "description" => $data['description'], 'status' => $data['populer'],  'updated_at' => $time]);
            } else {
              DB::table('product')->where('id', $data['id'])->update(["cid" => $data['cid'], "title" => $data['title'], "item_img" => $t, "description" => $data['description'], 'status' => '0',  'updated_at' => $time]);
            }


            $photo = $request->input('oldimg');

            if ($photo != '') {
              if (file_exists('public/item_img/' . $photo)) {
                unlink('public/item_img/' . $photo);
              } else {
                echo "file not exist";
              }
            }
          } else {
            return redirect()->back()->with('error', 'Invalid Image Type');
          }
        }
        return redirect()->back()->with('message', 'Update Product Sucessfully!');
      }
    } else {
      if ($request->input('populer') === '1') {
        DB::table('product')->where('id', $data['id'])->update(["cid" => $data['cid'], "title" => $data['title'], "description" => $data['description'], 'status' => $data['populer'], 'updated_at' => $time]);
      } else {
        DB::table('product')->where('id', $data['id'])->update(["cid" => $data['cid'], "title" => $data['title'], "description" => $data['description'], 'status' => '0', 'updated_at' => $time]);
      }
      return redirect()->back()->with('message', 'Update Product Sucessfully!');
    }
  }


  public function showimage(Request $request)
  {
    $requestData = ['ptitle'];
    $search = $request->input('search');

    $data = DB::table('productdetail')
      ->where(function ($q) use ($requestData, $search) {
        foreach ($requestData as $field)
          $q->orWhere($field, 'like', "%{$search}%");
      })
      ->orderBy('created_at', 'DESC')
      ->Paginate(7);

    // echo "<pre>";
    // print_r($data);
    // die();

    return view('Admin.showimage')->with(['data' => $data, 'search' => $search]);
  }

  public function deleteimage($id)
  {
    $data = DB::table('productdetail')->where('id', $id)->delete();
    return redirect()->back();
  }

  public function editimage(Request $request)
  {
    $time = date('Y-m-d H:i:s', time());


    $data = $request->all();

    if (@$request->file('pimage') != '') {

      if ($request->hasFile('pimage')) {
        $poster = $request->file('pimage');
        $pname = $poster->getClientOriginalName();
        $pimage = time() . $pname;
        $poster->move(public_path('pimage'), $pimage);
      }

      DB::table('productdetail')->where('id', $data['id'])->update(["ptitle" => $data['ptitle'], "pimage" => $pimage, "des" => $data['des'], 'updated_at' => $time]);

      $photo = $request->input('oldimg');

      if ($photo != '') {
        if (file_exists('pimage/' . $photo)) {
          unlink('pimage/' . $photo);
        } else {
          echo "file not exist";
        }
      }

      return redirect()->back()->with('message', 'Update Product Sucessfully!');
    } else {

      DB::table('productdetail')->where('id', $data['id'])->update(["ptitle" => $data['ptitle'], "des" => $data['des'], 'updated_at' => $time]);


      return redirect()->back()->with('message', 'Update Product Sucessfully!');
    }
  }
}
