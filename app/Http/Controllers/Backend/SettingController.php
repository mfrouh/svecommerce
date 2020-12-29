<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
   {
    $setting=Setting::first();
    return view('Backend.setting.index',compact('setting'));
   }

   public function setting(Request $request)
   {
    $this->validate($request,[
        'name'=>'required',
        'logo'=>"nullable",
        'description'=>'required',
        'facebook'=>'url|nullable',
        'twitter'=>'url|nullable',
        'youtube'=>'url|nullable',
        'twitter'=>'url|nullable',
    ]);
    $setting=Setting::first();
    if($setting)
    {
        $setting=Setting::first();
    }
    else {
        $setting=new Setting();
    }
    $setting->name=$request->name;
    if ($request->logo) {
        $setting->logo=sortimage('storage/logo/',$request->logo);
    }
    $setting->description=$request->description;
    $setting->facebook=$request->facebook;
    $setting->twitter=$request->twitter;
    $setting->instagram=$request->instagram;
    $setting->youtube=$request->youtube;
    $setting->save();
    return back()->with('success','تم تعديل الموقع بنجاح');
   }
   public function change_password()
   {
     return view('Backend.setting.change-password');
   }
   public function profile_setting()
   {
     return view('Backend.setting.profile-setting');
   }

   public function post_change_password(Request $request)
    {
        $this->validate($request,[
            'old_password'=>'required|min:8',
            'password'=>'required|min:8|confirmed'
        ]);
        $user=User::where('id',auth()->user()->id)->first();
        if (Hash::check($request->old_password,$user->password)) {
            $user->password=Hash::make($request->password);
            $user->save();
                return back()->with('success','تمت تغير كلمة المرور بنجاح');
        }
        else {
                return back()->with('error','نريد كلمة المرور الحالية');
        }
    }
    public function post_profile_setting(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email,'.auth()->user()->id,
            'image'=>'image|nullable'
        ]);
        $user=User::where('id',auth()->user()->id)->first();
        $user->name=$request->name;
        $user->email=$request->email;
        if ($request->image) {
            $user->image=sortimage('storage/users/',$request->image);
        }
        $user->save();
        return back()->with('success','تم التعديل البيانات بنجاح');

    }
}
