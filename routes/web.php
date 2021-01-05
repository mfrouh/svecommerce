<?php

use Illuminate\Support\Facades\Auth;
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
Route::group(['middleware' => 'auth:admin'], function () {
Route::resource('category', 'Backend\CategoryController');
Route::resource('product', 'Backend\ProductController');
Route::resource('offer', 'Backend\OfferController')->except(['create','show']);
Route::get('/offer/create/{id}','Backend\OfferController@create');
Route::resource('coupon', 'Backend\CouponController')->except(['show']);
Route::resource('roles', 'Backend\RoleController');
Route::resource('permissions', 'Backend\PermissionController');
Route::resource('employee', 'Backend\AdminController');
//active && inactive cagtegory
Route::post('/category/active','Backend\CategoryController@active');
Route::post('/category/inactive','Backend\CategoryController@inactive');
//active && inactive cagtegory
Route::post('/product/active','Backend\ProductController@active');
Route::post('/product/inactive','Backend\ProductController@inactive');
//attribute
Route::get('product/{id}/attribute','Backend\AttributeController@attribute');
Route::post('/attribute','Backend\AttributeController@storeattribute');
Route::post('/value','Backend\AttributeController@storevalue');
Route::post('/variant','Backend\AttributeController@storevariant');
Route::delete('/attribute/{id}','Backend\AttributeController@deleteattribute');
Route::delete('/value/{id}','Backend\AttributeController@deletevalue');
Route::delete('/variant/{id}','Backend\AttributeController@deletevariant');
// users
Route::get('/users', 'Backend\AdminController@users');
// orders
Route::get('/orders', 'Backend\OrderController@orders');
Route::get('/orders/{id}/details', 'Backend\OrderController@order_details');
// tags
Route::get('/tags', 'Backend\TagController@tags');
Route::delete('/tags/{id}', 'Backend\TagController@deletetags');
Route::get('/tags/{name}/products', 'Backend\TagController@product_tags');
// reviews
Route::get('/reviews', 'Backend\MainController@reviews');
// dashboard
Route::get('/dashboard', 'Backend\MainController@dashboard');
// image
Route::get('/image/{id}', 'Backend\MainController@image');
// setting website
Route::get('/setting','Backend\SettingController@index');
Route::post('/setting','Backend\SettingController@setting');
// personal data
Route::get('/change-password','Backend\SettingController@change_password');
Route::post('/change-password','Backend\SettingController@post_change_password');
Route::get('/profile-setting','Backend\SettingController@profile_setting');
Route::post('/profile-setting','Backend\SettingController@post_profile_setting');
});
Auth::routes();
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
