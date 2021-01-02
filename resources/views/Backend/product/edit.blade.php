@extends('layouts.app')
@section('title')
تعديل منتج
@endsection
@section('css')
<link href="{{URL::asset('assets/plugins/inputtags/inputtags.css')}}" rel="stylesheet">
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto"> تعديل منتج</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
		</div>
	</div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
                <!-- row opened -->
<form action="/product/{{$product->id}}" method="post" enctype="multipart/form-data">
 @csrf
 @method('put')
 <div class="row row-sm">
 	<div class="col-xl-8">
 		<div class="card mg-b-20">
 			<div class="card-header pb-0">
 				<div class="d-flex justify-content-between">
 					<h4 class="card-title mg-b-0">تعديل منتج</h4>
 				</div>
 			</div>
 			<div class="card-body">
                <div class="form-group">
                    <label for="">اسم المنتج</label>
                    <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" value="{{$product->name}}" placeholder="" >
                    @error('name')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">وصف المنتج</label>
                    <textarea name="description"  class="form-control  @error('description') is-invalid @enderror"  rows="4">{{$product->description}}</textarea>
                    @error('description')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">سعر المنتج</label>
                    <input type="text" name="price" class="form-control  @error('price') is-invalid @enderror" value="{{$product->price}}" placeholder="" >
                    @error('price')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Sku</label>
                    <input type="text" name="sku" class="form-control  @error('sku') is-invalid @enderror" value="{{$product->sku}}" placeholder="" >
                    @error('sku')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                </div>

 			</div>
 		</div>
     </div>
     <div class="col-xl-4">
         <div class="card mg-b-20">
             <div class="card-body">
                <div class="form-group">
                    <label for="">القسم</label>
                    <select name="category_id" class="form-control  @error('category_id') is-invalid @enderror">
                        @foreach ($categories as $category)
                          <option value="{{$category->id}}" {{$product->category_id==$category->id?'selected':''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">حالة المنتج</label>
                    <select name="status" class="form-control  @error('status') is-invalid @enderror">
                        <option value="active"   {{$product->status=='active'?'selected':''}}>مفعل</option>
                        <option value="inactive" {{$product->status=='inactive'?'selected':''}}>مغلق</option>
                    </select>
                    @error('status')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">كلمات لها علاقة</label>
                    <input type="text" data-role="tagsinput" name="tags" value="{{implode(',',$product->tags->pluck('name')->toArray())}}" placeholder="ادخل كلمات لها علاقة بالمنتج" class="form-control @error('tags') is-invalid @enderror">
                    @error('tags')
                    <small id="helpId" class="text-muted">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">صور المنتج</label>
                    <input type="file" name="images[]" multiple accept="*/image">
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
@section('js')
<script src="{{URL::asset('assets/plugins/inputtags/inputtags.js')}}"></script>
@endsection
