<?php

namespace App\Http\Controllers;

use DB;
use Input;
use Session;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function categoryindex(Request $request)
  {
    return view('Admin.category');
  }

  public function insertcategory(Request $request)
  {
    if ($request->isMethod('get')) {
      return view('Admin.category');
    } else {
      $data = $request->all();
      $same = DB::table('category')->where('cname', $data['cname'])->count();
      if ($same > 0) {
        return redirect()->back()->with('error', 'exist');
      } else {
        if ($data['cname'] != '') {
          DB::table('category')->insert(["cname" => $data['cname']]);

          return redirect()->back()->with('message', 'Insert Category Successfully');
        } else {
          return redirect()->back()->with('error', 'Category Are Not Inserted');
        }
      }
    }
  }
  public function showcategory(Request $request)
  {
    $requestData = ['id', 'cname'];
    $search = $request->input('search');
    $data = DB::table('category')
      // ->where('cname','LIKE','%'.$search.'%')
      ->where(function ($q) use ($requestData, $search) {
        foreach ($requestData as $field)
          $q->orWhere($field, 'like', "%{$search}%");
      })
      ->Paginate(7);

    return view('Admin.showcategory')->with(['data' => $data, "search" => $search]);
  }

  public function update($id)
  {
    $data = DB::table('category')->where('id', $id)->first();
    return view('Admin.updatecategory')->with('data', $data);
  }

  public function adminedit(Request $request)
  {
    $data = $request->all();
    $time = date('Y-m-d H:i:s', time());

    if ($data['cname'] != '') {

      DB::table('category')->where('id', $data['id'])->update(["cname" => $data['cname'], 'updated_at' => $time]);
      return redirect()->back()->with('message', 'Update Category Successfully!');
    } else {
      return redirect()->back()->with('error', 'Category Are Not Updated!');
    }
  }

  public function admindelete($id)
  {
    $data = DB::table('category')->where('id', $id)->delete();
    return redirect()->back();
  }
}
