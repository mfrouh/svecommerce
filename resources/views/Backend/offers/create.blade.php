@extends('layouts.app')
@section('title')
انشاء عرض
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto"> انشاء عرض</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
		</div>
	</div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
                <!-- row opened -->
<form action="/offer" method="post">
 @csrf
 <div class="row row-sm">
 	<div class="col-xl-8">
 		<div class="card mg-b-20">
 			<div class="card-header pb-0">
 				<div class="d-flex justify-content-between">
 					<h4 class="card-title mg-b-0">انشاء عرض</h4>
 				</div>
 			</div>
 			<div class="card-body">
                <input type="hidden" name="product_id"  value="{{$product->id}}">
                <div class="form-group">
                    <label for="">نوع العرض</label>
                    <select name="type" class="form-control  @error('type') is-invalid @enderror">
                        <option value="fixed" {{old('type')=='fixed'?'selected':''}}>ثابت</option>
                        <option value="variable"  {{old('type')=='variable'?'selected':''}}>متغير</option>
                    </select>
                    @error('type')
                    <small class="text-muted">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">قيمة العرض</label>
                    <input type="text" name="value" class="form-control  @error('value') is-invalid @enderror" value="{{old('value')}}" placeholder="" aria-describedby="helpId">
                    @error('value')
                    <small  class="text-muted">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">الرسالة</label>
                    <textarea  name="message" class="form-control  @error('message') is-invalid @enderror">{{old('message')}}</textarea>
                    @error('message')
                    <small  class="text-muted">{{$message}}</small>
                    @enderror
                </div>
 			</div>
 		</div>
     </div>
     <div class="col-xl-4">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                </div>
            </div>
            <div class="card-body">
               <div class="form-group">
                   <label for="">بداية العرض</label>
                   <input type="datetime-local" name="start_offer" class="form-control  @error('start_offer') is-invalid @enderror" value="{{old('start_offer')}}" >
                   @error('start_offer')
                   <small  class="text-muted">{{$message}}</small>
                   @enderror
               </div>
               <div class="form-group">
                   <label for="">نهاية العرض</label>
                   <input type="datetime-local" name="end_offer" class="form-control  @error('end_offer') is-invalid @enderror" value="{{old('end_offer')}}" >
                   @error('end_offer')
                   <small  class="text-muted">{{$message}}</small>
                   @enderror
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

