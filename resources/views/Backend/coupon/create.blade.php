@extends('layouts.app')
@section('title')
انشاء خصم
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto"> انشاء خصم</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
		</div>
	</div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
                <!-- row opened -->
<form action="/coupon" method="post">
 @csrf
 <div class="row row-sm">
 	<div class="col-xl-8">
 		<div class="card mg-b-20">
 			<div class="card-header pb-0">
 				<div class="d-flex justify-content-between">
 					<h4 class="card-title mg-b-0">انشاء خصم</h4>
 				</div>
 			</div>
 			<div class="card-body">
                <div class="form-group">
                    <label for="">كود الخصم</label>
                    <input type="text" name="code" class="form-control  @error('code') is-invalid @enderror" value="{{old('code')}}" placeholder="" aria-describedby="helpId">
                    @error('code')
                    <small  class="text-muted">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">نوع الخصم</label>
                    <select name="type" class="form-control  @error('type') is-invalid @enderror">
                        <option value="fixed">ثابت</option>
                        <option value="variable">متغير</option>
                    </select>
                    @error('type')
                    <small class="text-muted">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">قيمة الخصم</label>
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
                <div class="form-group">
                    <label for="">عددالمرات</label>
                    <select name="times" class="form-control  @error('times') is-invalid @enderror">
                       @for ($i = 1; $i < 10; $i++)
                        <option value="{{$i}}" {{old('times')==$i?'selected':''}}>{{$i}}</option>
                       @endfor
                    </select>
                    @error('times')
                    <small class="text-muted">{{$message}}</small>
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
                   <label for="">بداية الخصم</label>
                   <input type="datetime-local" name="start" class="form-control  @error('start') is-invalid @enderror" value="{{old('start')}}" placeholder="" aria-describedby="helpId">
                   @error('start')
                   <small  class="text-muted">{{$message}}</small>
                   @enderror
               </div>
               <div class="form-group">
                   <label for="">نهاية الخصم</label>
                   <input type="datetime-local" name="end" class="form-control  @error('end') is-invalid @enderror" value="{{old('end')}}" placeholder="" aria-describedby="helpId">
                   @error('end')
                   <small  class="text-muted">{{$message}}</small>
                   @enderror
               </div>
               <div class="form-group">
                   <label for="">الشرط</label>
                   <select name="cand" class="form-control  @error('cand') is-invalid @enderror">
                       <option value="">اختار نوع الشرط</option>
                       <option value="more" {{old('cand')=='more'?'selected':''}}>اكبر</option>
                       <option value="less" {{old('cand')=='less'?'selected':''}}>اقل</option>
                   </select>
                   @error('cand')
                   <small class="text-muted">{{$message}}</small>
                   @enderror
               </div>
               <div class="form-group">
                   <label for="">قيمة الخصم</label>
                   <input type="text" name="cand_value" class="form-control  @error('cand_value') is-invalid @enderror" value="{{old('cand_value')}}" placeholder="" aria-describedby="helpId">
                   @error('cand_value')
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

