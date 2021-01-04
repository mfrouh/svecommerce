<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class MainController extends Controller
{
  public function dashboard()
  {
     $admins=Admin::count();
    $users=User::count();
    // $subscribers=Subscribers::count();
    $products=Product::count();
    $actproducts=Product::active()->count();
    $inactproducts=Product::inactive()->count();
    $tags=Tag::count();
    $roles=Role::count();
    $permissions=Permission::count();
    $categories=Category::count();
    $actcategories=Category::active()->count();
    $inactcategories=Category::inactive()->count();
    $orders=Order::count();
    $offers=Offer::count();
    $actoffers=Offer::active()->count();
    $inactoffers=Offer::inactive()->count();
    $coupons=Coupon::count();
    $actcoupons=Coupon::active()->count();
    $inactcoupons=Coupon::inactive()->count();
    return view('Backend.main.dashboard',
    compact('admins','users',
    'products','tags','roles',
    'permissions','categories',
    'actproducts','inactproducts',
    'actcategories','inactcategories',
    'orders',
    'offers','actoffers','inactoffers',
    'coupons','actcoupons','inactcoupons'));
  }
  public function reviews()
  {
    $reviews=Review::all();
    return view('Backend.main.reviews',compact('reviews'));
  }
}
