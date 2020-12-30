@extends('layouts.master2')
<title>تسجيل دخول</title>
@section('css')
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('assets/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="{{ url('login') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>اهلا بك</h2>
												 <form method="POST" action="/login/admin">
                                                   @csrf
													<div class="form-group">
                                                        <label>البريد الالكتروني</label>
                                                        <input class="form-control @error('email')  is-invalid @enderror" placeholder="ادخل البريد الالكتروني" name="email" type="email" required>
                                                        @error('email')
                                                        <small id="helpId" class="text-muted">{{$message}}</small>
                                                        @enderror
                                                    </div>
													<div class="form-group">
                                                        <label>كلمة السر</label>
                                                        <input class="form-control  @error('password')  is-invalid @enderror" placeholder="ادخل كلمة السر" name="password" type="password" required>
                                                        @error('password')
                                                        <small id="helpId" class="text-muted">{{$message}}</small>
                                                        @enderror
                                                    </div><button class="btn btn-main-primary btn-block">تسجيل دخول</button>
												</form>
												<div class="main-signin-footer mt-5">
													<p><a href="/password/reset"> نسيت كلمة السر</a></p>
													<p>ليس لديك حساب? <a href="{{ url('/register') }}">انشاء حساب</a></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')
@endsection
