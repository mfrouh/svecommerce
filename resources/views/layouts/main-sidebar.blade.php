<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidebar-header active">
                @php
                    $setting=App\Models\Setting::first();
                @endphp
				<a class="desktop-logo logo-light active" href="{{ url('/') }}"><img src="{{URL::asset($setting->logo)}}" class="main-logo" alt="logo"></a>
				<a class="desktop-logo logo-dark active" href="{{ url('/') }}"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-light active" href="{{ url('/') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark active" href="{{ url('/') }}"><img src="{{URL::asset('assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
			</div>
			<div class="main-sidemenu">
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
							<img class="avatar avatar-xl brround" src="{{URL::asset(auth()->user()->image)}}"><span class="avatar-status profile-status bg-green"></span>
						</div>
						<div class="user-info">
							<h4 class="font-weight-semibold mt-3 mb-0">{{auth()->user()->name}}</h4>
						</div>
					</div>
				</div>
				<ul class="side-menu">
					<li class="slide">
						<a class="side-menu__item" href="{{ url('/dashboard' ) }}"><span class="side-menu__label">الرئيسية</a>
                    </li>
                   {{--  @can('الوظائف')  --}}
                    <li class="slide">
                        <a class="side-menu__item" href="#" data-toggle="slide"><span class="side-menu__label">الوظائف</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
                         {{--  @can('الوظائف')  --}}
					     <li class="slide">
					     	<a class="side-menu__item" href="{{ url('/roles' ) }}"><span class="side-menu__label">الوظائف</a>
                         </li>
                         {{--  @endcan
                         @can('انشاء وظيفة')  --}}
                         <li class="slide">
					     	<a class="side-menu__item" href="{{ url('/roles/create' ) }}"><span class="side-menu__label">انشاء وظيفة</a>
                         </li>
                         {{--  @endcan  --}}
                        </ul>
                    </li>
                    {{--  @endcan  --}}
                    {{--  @can('الصلاحيات')  --}}
                    <li class="slide">
                        <a class="side-menu__item" href="#" data-toggle="slide"><span class="side-menu__label">الصلاحيات</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
                         {{--  @can('الصلاحيات')  --}}
					     <li >
					     	<a class="side-menu__item" href="{{ url('/permissions' ) }}"><span class="side-menu__label">الصلاحيات</a>
                         </li>
                         {{--  @endcan
                         @can('انشاء صلاحية')  --}}
                         <li >
					     	<a class="side-menu__item" href="{{ url('/permissions/create' ) }}"><span class="side-menu__label">انشاء صلاحية</a>
                         </li>
                         {{--  @endcan  --}}
                       </ul>
                    </li>
                    {{--  @endcan  --}}
					<li class="slide">
                        <a class="side-menu__item" href="#" data-toggle="slide"><span class="side-menu__label">المستخدمين</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
                            @can('المستخدمين')
					        <li>
                               <a class="side-menu__item"  href="{{ url('/users') }}"><span class="side-menu__label">المستخدمين</a>
					        </li>
					        @endcan
                        </ul>
                    </li>
                    {{--  @can('الاقسام')  --}}
                    <li class="slide">
                        <a class="side-menu__item" href="#" data-toggle="slide"><span class="side-menu__label">الاقسام</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
					       {{--  @can('الاقسام')  --}}
					       <li>
					       	<a class="side-menu__item" href="{{ url('/category' ) }}"><span class="side-menu__label">الاقسام</a>
                           </li>
                           {{--  @endcan
                           @can('انشاء قسم')  --}}
					       <li>
					       	<a class="side-menu__item" href="{{ url('/category/create' ) }}"><span class="side-menu__label">انشاء قسم</a>
                           </li>
                           {{--  @endcan  --}}
                        </ul>
                    </li>
                    {{--  @endcan  --}}
                     {{--  @can('المنتجات')  --}}
                     <li class="slide">
                        <a class="side-menu__item" href="#" data-toggle="slide"><span class="side-menu__label">المنتجات</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
					       {{--  @can('المنتجات')  --}}
					       <li>
					       	<a class="side-menu__item" href="{{ url('/product' ) }}"><span class="side-menu__label">المنتجات</a>
                           </li>
                           {{--  @endcan
                           @can('انشاء منتج')  --}}
					       <li>
					       	<a class="side-menu__item" href="{{ url('/product/create' ) }}"><span class="side-menu__label">انشاء منتج</a>
                           </li>
                           {{--  @endcan  --}}
                        </ul>
                    </li>
                    <li class="slide">
						<a class="side-menu__item" href="{{ url('/offer' ) }}"><span class="side-menu__label">العروض</a>
                    </li>
                    <li class="slide">
						<a class="side-menu__item" href="{{ url('/orders' ) }}"><span class="side-menu__label">الطلبات</a>
                    </li>
                    <li class="slide">
						<a class="side-menu__item" href="{{ url('/tags' ) }}"><span class="side-menu__label">كلمات لها علاقة</a>
					</li>
                    {{--  @endcan  --}}
					{{--  @can('تعديل الموقع')  --}}
					<li class="slide">
						<a class="side-menu__item" href="{{ url('/setting' ) }}"><span class="side-menu__label">الاعدادات</a>
					</li>
					{{--  @endcan  --}}
				</ul>
			</div>
		</aside>
<!-- main-sidebar -->
