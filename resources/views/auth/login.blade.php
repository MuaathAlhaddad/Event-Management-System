@extends('layouts.app')
@section('content')

<style>
body{background-image: url('frontend/assets/img/3.jpg')!important; background-size:100%!important; 

}

h3{
      color: #7705a4!important;
      position: center;
}
</style>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mx-4">
            <div class="card-body p-4">
            <h3><b>IIUM WAQAF TIME MANAGEMENT<b></h3>
{{--                 <h1 style="text-align: center; color: {{config('styles.frontend.colors.primary')}}">{{ trans('panel.site_title') }}</h1> --}}

                <p class="text-muted">{{ trans('global.login') }}</p>

                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>

                        <input id="email" name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}"   style="border-color: #7705a4!important;">

                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>

                        <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}"  style="border-color: #7705a4!important;">

                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-4">
                        <div class="form-check checkbox">
                            <input class="form-check-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />
                            <label class="form-check-label" for="remember" style="vertical-align: middle;">
                                {{ trans('global.remember_me') }}
                            </label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary px-5" style=" color:white!important;   background-image: linear-gradient(to right top, #260326, #3b0441, #51025f, #650180, #7705a4)!important; border-color: #7705a4!important;">
                                {{ trans('global.login') }}
                            </button>
                        </div>
                    </div>
                    <div class="mt-4">
                            @if(Route::has('password.request'))
                                <a class="btn-link px-0" href="{{ route('password.request') }}" style="color: #7705a4!important;">
                                    {{ trans('global.forgot_password') }}
                                </a><br>
                            @endif
                            <a class="btn-link px-0" href="{{ route('frontend.users.create') }}" style="color: #7705a4!important;">
                                Create new Account
                            </a><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection