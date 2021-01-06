@extends('layouts.app')
@section('title')
تعديل منتج
@endsection
@section('css')
<link href="{{URL::asset('assets/plugins/inputtags/inputtags.css')}}" rel="stylesheet">
<style>
    .delete-image{
    position: absolute;
    right: 30px;
    top: 20px;
    border-radius: 5px;
    }
</style>
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
                    <textarea name="description" id="editor"  class="form-control  @error('description') is-invalid @enderror"  rows="4">{{$product->description}}</textarea>
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
                    <label for="">كمية المنتج</label>
                    <input type="number" name="quantity" class="form-control  @error('quantity') is-invalid @enderror" value="{{$product->quantity}}" placeholder="" >
                    @error('quantity')
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
                <div class="form-group">
                    <label for="">صورة المنتج</label>
                    <input type="file" name="image" accept="*/image">
                </div>
                 <div class="form-group">
                    <label for="">فيديو للمنتج</label>
                    <input type="text" name="video_url" class="form-control" value="{{$product->video_url}}" >
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" value="حفظ">
                </div>
             </div>
         </div>
     </div>
 </div>
</form>
<div class="row">
   <div class="col-xl-12">
   <div class="card mg-b-20">
   	  <div class="card-header pb-0">
   	  	<div class="d-flex justify-content-between">
   	  		<h4 class="card-title mg-b-0">صور منتج</h4>
   	  	</div>
   	  </div>
      <div class="card-body row">
            @foreach ($product->gallery as $image)
               <div class="col-md-3">
                <img src="{{asset($image->url)}}" class="m-3" height="150" width="150">
                 <a href="/image/{{$image->id}}" class="delete-image btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
               </div>
            @endforeach
      </div>
    </div>
   </div>
</div>
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/inputtags/inputtags.js')}}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ),{
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        language: 'ar',
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
            ]
        }
        } )
        .catch( error => {
            console.error( error );
        } );
 </script>
@endsection
