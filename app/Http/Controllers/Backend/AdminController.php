<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/

public function index()
{
   $admins = admin::orderBy('id','DESC')->get();
   $title='الموظفين';
   return view('Backend.admins.index',compact('admins','title'));
}
public function users()
{
   $users = User::orderBy('id','DESC')->get();
   $title='المستخدمين';
   return view('Backend.main.users',compact('users','title'));
}

/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
    $roles = Role::where('name','!=','SuperAdmin')->pluck('id','name')->toArray();
    return view('Backend.admins.create',compact('roles'));
}

/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{
     $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:admins',
        'password' => 'required|string|min:8|confirmed',
        'role'=>'required',
     ]);

     $input = $request->all();
     $input['password'] = Hash::make($input['password']);
     $admin = admin::create($input);
     $admin->syncRoles($request->input('role'));
     return redirect('/employee')
     ->with('success','تم اضافة الموظف بنجاح');
}

/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show($id)
{
   $admin=admin::find($id);
   $permissions=Permission::whereNotIn('id',$admin->getPermissionsViaRoles()->pluck('id')->toArray())->get();
   $adminpermissions=$admin->getAllPermissions()->pluck('id')->toArray();
   return view('Backend.admins.show',compact('admin','permissions','adminpermissions'));
}
public function admin_permissions(Request $request)
{
  $this->validate($request,[
      'admin_id'=>'required',
  ]);
  $admin=admin::find($request->admin_id);
  $admin->syncPermissions($request->permissions);
  return back()->with('success','تم تعديل الصلاحيات بنجاح');
}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit($id)
{
   $admin = admin::find($id);
   $roles = Role::where('name','!=','SuperAdmin')->pluck('id','name')->toArray();
   $adminRole = $admin->roles->pluck('name','name')->all();
   return view('Backend.admins.edit',compact('admin','roles','adminRole'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Request $request, $id)
{
     $this->validate($request, [
     'name' => 'required|string|max:255',
     'email' => 'required|string|email|max:255|unique:admins,email,'.$id,
     'password' => 'nullable|string|min:8|confirmed',
     'role'=>'required',
     ]);
     $admin=admin::find($id);
     $admin->name=$request->name;
     $admin->email=$request->email;
     if ($request->password) {
        $admin->password=Hash::make($request->password);
     }
     $admin->save();
     DB::table('model_has_roles')->where('model_id',$id)->delete();
     $admin->syncRoles($request->input('role'));
     return redirect('/employye')
     ->with('success','تم تحديث معلومات الموظف بنجاح');
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy(Request $request)
{
   admin::find($request->admin_id)->delete();
   return redirect('/employye')->with('success','تم حذف الموظف بنجاح');
}
}
