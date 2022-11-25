<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/adminlogin', 'AdminController@index');
Route::post('admin_login', 'AdminController@adminlogin');
Route::get('adminlogout', 'AdminController@adminlogout');

Route::get('adminprofile', 'AdminController@profileindex');
Route::post('profileupdate', 'AdminController@profileupdate');

Route::get('admindashboard', 'AdminController@admindashboard');

Route::get('categoryindex', 'CategoryController@categoryindex');
Route::post('insertcategory', 'CategoryController@insertcategory');
Route::get('showcategory', 'CategoryController@showcategory');
Route::get('update/{id}', 'CategoryController@update');
Route::post('adminedit', 'CategoryController@adminedit');
Route::get('admindelete/{id}', 'CategoryController@admindelete');

Route::get('addproduct', 'ProductController@addproductindex');
Route::post('addproduct', 'ProductController@addproduct');
Route::get('showproduct', 'ProductController@showproduct');
Route::get('showproductdetail/{id}', 'ProductController@showproductdetail');
Route::get('productdelete/{id}', 'ProductController@productdelete');
Route::get('updatemyitem/{id}', 'ProductController@updatemyitem');
Route::post('editmyitem', 'ProductController@editmyitem');
Route::post('addimagedetail', 'ProductController@addimagedetail');


Route::get('showcontact', 'AdminController@showcontact');
Route::get('contactdelete/{id}', 'AdminController@contactdelete');

Route::get('showimage', 'ProductController@showimage');
Route::post('editimage', 'ProductController@editimage');
Route::get('deleteimage/{id}', 'ProductController@deleteimage');

// =========================================================================

Route::get('/', 'Client\HomeController@home');
Route::get('pages/{id}', 'Client\HomeController@pages');
route::get('product/{cat}', 'Client\HomeController@postpage');
route::get('contact', 'Client\HomeController@contect');
route::post('addcontact', 'Client\HomeController@addcontact');
