@extends('layouts.master2')
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
							<img src="{{URL::asset('assets/img/media/R.webp')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
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
                                    @error('status')
                                    <div class="alert alert-danger">{{trans('general.status_msg')}}</div>
                                    @enderror
                                    <div class="card-sigin">
										<div class="mb-5 d-flex"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">{{env('APP_NAME')}}</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>{{trans('auth.welcome')}}</h2>
												<h5 class="font-weight-semibold mb-4">{{trans('auth.login')}}</h5>
												<form action="{{route('login')}}" method="post">
                                                    @csrf
													<div class="form-group">
														<label>{{trans('auth.email')}}</label>
                                                        <input id='email' class="form-control verifed @error('email') is-invalid @enderror" placeholder="{{trans('auth.placemail')}}" type="text" name="email" id="email" required>
														@error('email')
														<div class="alert alert-danger">{{trans('general.email_msg')}}</div>
														@enderror
													</div>
													<div class="form-group">
														<label>{{trans('auth.pass')}}</label>
                                                        <input id='password' class="form-control verifed @error('password') is-invalid @enderror" placeholder="{{trans('auth.placpass')}}" type="password" id="password" name="password" required>
														@error('password')
														<div class="alert alert-danger">{{trans('general.password_msg')}}</div>
														@enderror
													</div><button class="btn btn-main-primary btn-block text-bold">{{trans('auth.log')}}</button>
												</form>
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
<script>

/*    let verify = document.querySelectorAll('.verifed'),
        email = document.querySelector('#email'),
        password = document.querySelector('#password'),
        submit = document.querySelector('#submit');

window.addEventListener('keyup',handelButton);
    function handelButton() {
        if(password.value===""|| email.value==="") {
            submit.disabled = true;
        } else {
            submit.disabled = false;
        }
    }*/
</script>
@endsection
