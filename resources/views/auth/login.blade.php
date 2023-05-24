@extends('layouts.master2')
@section('css')
@endsection
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <div class="mb-5 d-flex"><img src="{{ URL::asset('assets/img/brand/favicon.png') }}" class="sign-favicon ht-40"
                    alt="logo">
                <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">{{ env('APP_NAME') }}</h1>
            </div>
        </div>
     
        <div class="card">
            <div class="card-body login-card-body">

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    @error('status')
                    <div class="alert alert-danger">{{ trans('general.status_msg') }}</div>
                @enderror
                <div class="login-box-msg">
                    <h2>{{ trans('auth.welcome') }}</h2>
                    <h5 class="font-weight-semibold mb-4">{{ trans('auth.login') }}</h5>
                </div>
                    <div class="form-group mb-3">
                        <label>{{ trans('auth.email') }}</label>
                        <input id='email' class="form-control verifed @error('email') is-invalid @enderror"
                            placeholder="{{ trans('auth.placemail') }}" type="text" name="email" id="email"
                            required>
                        @error('email')
                            <div class="alert alert-danger">{{ trans('general.email_msg') }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>{{ trans('auth.pass') }}</label>
                        <input id='password' class="form-control verifed @error('password') is-invalid @enderror"
                            placeholder="{{ trans('auth.placpass') }}" type="password" id="password" name="password"
                            required>
                        @error('password')
                            <div class="alert alert-danger">{{ trans('general.password_msg') }}</div>
                        @enderror
                    </div><button class="btn btn-primary btn-block">{{ trans('auth.log') }}</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div><!-- End -->
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
