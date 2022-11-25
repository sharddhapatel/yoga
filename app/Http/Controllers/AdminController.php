<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

  public function admindashboard(Request $request)
  {

    return view('Admin.dashboard');
  }

  public function profileindex()
  {
    $id = Session::get("admin_id");
    $a = DB::table("admin")->where("id", $id)->first();
    return view('Admin.adminprofile')->with(["a" => $a]);
  }

  public function profileupdate(Request $request)
  {
    $id = Session::get("admin_id");
    $a = DB::table('admin')->where('id', $id)->first();
    $data = $request->all();
    if ($data['name'] != '' && $data['email'] != '') {

      if (@$data['image'] != '') {
        $name = $data['image']->getClientOriginalName();
        $t = time() . $name;
        $img = explode(".", $name);
        if ($img[1] == 'png' ||  $img[1] == "jpg" ||  $img[1] == "jpeg") {
          $data['image']->move(base_path('public\image'), $t);

          $list = DB::table('admin')->where('id', $id)->update(["name" => $data['name'], "email" => $data['email'], "profile_image" => $t]);

          $nm = DB::table('admin')->where("id", $id)->get()->toArray();
          $dd = $nm[0]->name;
          $photo = $request->input('oldimg');

          Session::put('admin_profile_image', $t);
          if ($photo != '') {
            if (file_exists('public/image/' . $photo)) {
              unlink('public/image/' . $photo);
            }
            Session::put('admin_name', $dd);
            return redirect()->back()->with('message', 'Update Successfully');
          }
        } else {
          return redirect()->back()->with('error', 'Invalid Image Type');
        }
      } else {
        $list = DB::table('admin')->where('id', $id)->update(["name" => $data['name'], "email" => $data['email']]);
        $nm = DB::table('admin')->where("id", $id)->get()->toArray();
        $dd = $nm[0]->name;
        Session::put('admin_name', $dd);
      }
      return redirect()->back()->with('message', 'Update Successfully');
    } else {
      return redirect()->back()->with('error', 'Please Fill All The Fileds');
    }
  }



  public function index(Request $request)
  {
    if (Session::has('admin_name')) {
      return view('Admin.dashboard');
    } else {
      return view('Admin.adminlogin');
    }
  }

  public function adminlogin(Request $request)
  {
    //   $order=DB::table('product')
    // ->join('category', 'category.id', '=', 'product.cid')
    // ->orderBy('product.created_at','DESC')
    // ->get();

    $email = $request->Input('email');
    $password = $request->Input('password');
    $same = DB::table('admin')->where(['email' => $email])->count();
    $a = DB::table('admin')->where('email', $email)->first();



    if (($email != "") && ($password != "")) {
      if ($same > 0 && Hash::check($password, $a->password)) {
        session::put('admin_id', $a->id);
        session::put('admin_name', $a->name);
        session::put('admin_email', $a->email);
        session::put('admin_profile_image', $a->profile_image);
        return view('Admin.dashboard')->with(['a' =>  $a]);
      } else {
        return redirect('adminlogin')->with('error', 'Email and Password has been wrong....');
      }
    } else {
      return redirect('adminlogin')->with('error', 'Email and Password Empty...');
    }
  }

  public function adminlogout()
  {
    Session()->forget('admin_id');
    Session()->forget('admin_name');
    Session()->forget('admin_email');
    Session()->forget('admin_profile_image');
    return redirect('adminlogin');
  }



  public function showcontact(Request $request)
  {
    $requestData = ['name', 'email'];
    $search = $request->input('search');
    $data = DB::table('contact')
      ->where(function ($q) use ($requestData, $search) {
        foreach ($requestData as $field)
          $q->orWhere($field, 'like', "%{$search}%");
      })
      ->Paginate(5);

    return view('Admin.showcontact')->with(['data' => $data, "search" => $search]);
  }


  public function contactdelete($id)
  {
    $data = DB::table('contact')->where('id', $id)->delete();
    return redirect()->back();
  }
}
