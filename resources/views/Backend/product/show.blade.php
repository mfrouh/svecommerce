@extends('layouts.app')
@section('title')
{{$product->name}}
@endsection
@section('page-header')
  <!-- breadcrumb -->
  <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		 <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{$product->name}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
           @if ($product->status=="inactive")
             {{-- @can('تفعيل المنتج') --}}
              <a class="btn btn-success float-left" href="/product/active"  onclick="event.preventDefault();
              document.getElementById('active-product').submit();">تفعيل المنتج</a>
             <form id="active-product" action="/product/active" method="POST" class="d-none">
                @csrf
                <input type="hidden" name="id" value="{{$product->id}}">
             </form>
             {{-- @endcan --}}
           @else
             {{-- @can('تعطيل المنتج') --}}
              <a class="btn btn-danger float-left" href="/product/inactive" onclick="event.preventDefault();
              document.getElementById('inactive-product').submit();">تعطيل المنتج</a>
               <form id="inactive-product" action="/product/inactive" method="POST" class="d-none">
                  @csrf
                  <input type="hidden" name="id" value="{{$product->id}}">
               </form>
             {{-- @endcan --}}
           @endif
        </div>
	</div>
  </div>
  <!-- breadcrumb -->
@endsection
@section('content')
				<!-- row opened -->
 <div class="row row-sm">
 	<div class="col-xl-12">
 		<div class="card mg-b-20">
 			<div class="card-header pb-0">
 				<div class="d-flex justify-content-between">
 					<h4 class="card-title mg-b-0">{{$product->name}}</h4>
 				</div>
            </div>
            <div class="card-body">

            </div>
 		</div>
 	</div>
 </div>
</div>
</div>
@endsection
