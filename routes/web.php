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
Route::resource('category', 'Backend\CategoryController');
Route::resource('product', 'Backend\ProductController');
Route::resource('offer', 'Backend\OfferController');
Route::resource('roles', 'Backend\RoleController');
Route::resource('permissions', 'Backend\PermissionController');
Route::get('/orders', 'Backend\OrderController@orders');
Route::get('/orders/{id}/details', 'Backend\OrderController@order_details');
Route::get('/tags', 'Backend\TagController@tags');
Route::delete('/tags/{id}', 'Backend\TagController@deletetags');
Route::get('/tags/{name}/products', 'Backend\TagController@product_tags');
Route::get('/dashboard', 'Backend\MainController@dashboard');
// setting website
Route::get('/setting','Backend\SettingController@index');
Route::post('/setting','Backend\SettingController@setting');
// personal data
Route::get('/change-password','Backend\SettingController@change_password');
Route::post('/change-password','Backend\SettingController@post_change_password');
Route::get('/profile-setting','Backend\SettingController@profile_setting');
Route::post('/profile-setting','Backend\SettingController@post_profile_setting');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
