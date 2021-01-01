@extends('layouts.app')
@section('title')
    الرئيسية
@endsection
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
		<div class="left-content">
			<div>
			  <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> أهلا {{auth()->guard('admin')->user()->name}}</h2>
			</div>
		</div>
	</div>
	<!-- /breadcrumb -->
@endsection
@section('content')
				<!-- row -->
<div class="row row-sm">
    {{--  @can('الاقسام')  --}}
	<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-primary-gradient">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">عدد الاقسام</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 ml-5 text-white">{{$categories}}</h4>
                        </div>
                        <div class="">
							<h4 class="tx-20 font-weight-bold mb-1 mr-5 ml-5 text-dark">{{$actcategories}}</h4>
                        </div>
                        <div class="">
							<h4 class="tx-20 font-weight-bold mb-1 mr-5 text-danger">{{$inactcategories}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    {{--  @endcan
    @can('الكتاب')  --}}
	<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-danger-gradient">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">عدد الموظفين</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$admins}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    {{--  @endcan  --}}
    {{--  @can('المقالات')  --}}
	<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-success-gradient">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">عدد المنتجات</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 ml-5 text-white">{{$products}}</h4>
                        </div>
                        <div class="">
							<h4 class="tx-20 font-weight-bold mb-1 mr-5 ml-5 text-dark">{{$actproducts}}</h4>
						</div>
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1  mr-5  text-danger">{{$inactproducts}}</h4>
						</div>

					</div>
				</div>
			</div>
		</div>
    </div>
    {{--  @endcan
    @can('المستخدمين')  --}}
	<div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-warning-gradient">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">عدد المستخدمين</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$users}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    {{--  @endcan
    @can('الصلاحيات')  --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-purple-gradient ">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">عدد الصلاحيات</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$permissions}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    {{--  @endcan
    @can('الوظائف')  --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-info-gradient ">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">عدد الوظائف</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$roles}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    {{--  @endcan
    @can('المشتركين')  --}}
    {{--  <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-danger ">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">عدد المشتركين</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$subscribers}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>  --}}
    {{--  @endcan
    @can('كلمات لها علاقة')  --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-light ">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-dark">عدد الكلمات لها علاقة</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-dark">{{$tags}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    {{--  @endcan  --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-secondary ">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-white">عدد الطلبات</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$orders}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-info-gradient ">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-white"> الخصومات</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$coupons}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
		<div class="card overflow-hidden sales-card bg-pink-gradient ">
			<div class="pl-3 pt-3 pr-3 pb-2 pt-0">
				<div class="">
					<h6 class="mb-3 tx-12 text-white"> العروض</h6>
				</div>
				<div class="pb-0 mt-0">
					<div class="d-flex">
						<div class="">
							<h4 class="tx-20 font-weight-bold mb-1 text-white">{{$offers}}</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>

  </div>
</div>
@endsection
