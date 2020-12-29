@extends('layouts.app')
@section('title')
صلاحيات الموظف
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto"> صلاحيات الموظف</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
		</div>
	</div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
                <!-- row opened -->
<form action="/admin_permissions" method="post">
 @csrf
 <div class="row row-sm">
 	<div class="col-xl-8">
 		<div class="card mg-b-20">
 			<div class="card-header pb-0">
 				<div class="d-flex justify-content-between">
 					<h4 class="card-title mg-b-0">صلاحيات الموظف</h4>
 				</div>
 			</div>
 			<div class="card-body">
                <div class="form-group">
                    <label for="">اسم الموظف</label>
                    <input type="text" class="form-control" readonly value="{{$admin->name}}" >
                    <input type="hidden" class="form-control" name="admin_id" readonly value="{{$admin->id}}" >
                </div>
                <div class="form-group">
                    <label for="">اسم الوظيفة</label>
                    @foreach ($admin->roles->pluck('name') as $role)
                    <a class="btn btn-success">{{$role}}</a>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="">صلاحياتي</label>
                    @foreach ($admin->getAllPermissions() as $permission)
                    <label class="btn btn-info" >
                         {{$permission->name}}
                    </label>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="">الصلاحيات</label>
                    @foreach ($permissions as $permission)
                    <label class="btn btn-light" >
                        <input type="checkbox" name="permissions[]"  {{in_array($permission->id,$adminpermissions)?'checked':''}} value="{{$permission->id}}">
                         {{$permission->name}}
                    </label>
                    @endforeach
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" value="حفظ">
                </div>
 			</div>
 		</div>
     </div>
 </div>
</form>
</div>
</div>
@endsection

