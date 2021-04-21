@extends('layouts.app')
@section('content')
<div class="wrapper wrapper-full-page">
    <div class="page-header register-page header-filter">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-8 ml-auto mr-auto">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="card card-signup">
                            <div class="card-header card-header-primary text-center">
                                <h4 class="card-title">{{ __('global.register') }}</h4>
                            </div>
                            @if(session('status'))
                                <div class="card-body" style="padding: .9375rem 20px;">
                                    <p class="alert alert-info">
                                        {{ session('status') }}
                                    </p>
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- Name --}}
                                        <div class="form-group bmd-form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">face</i>
                                                    </span>
                                                </div>
                                                <input name="name" type="text" class="form-control" placeholder="{{ __('global.user_name') }}..." value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            </div>
                                            @error('name')
                                                <div class="error" for="name">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        {{-- Email --}}
                                        <div class="form-group bmd-form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">mail</i>
                                                    </span>
                                                </div>
                                                <input name="email" type="email" class="form-control" placeholder="{{ __('global.login_email') }}..." value="{{ old('email') }}" required autocomplete="email">
                                            </div>
                                            @error('email')
                                                <div class="error" for="email">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        {{-- Password --}}
                                        <div class="form-group bmd-form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">lock_outline</i>
                                                    </span>
                                                </div>
                                                <input name="password" type="password" class="form-control" placeholder="{{ __('global.login_password') }}..." value="{{ old('password') }}" required autocomplete="new-password">
                                            </div>
                                            @error('password')
                                                <div class="error" for="password">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        {{-- Password Confirm --}}
                                        <div class="form-group bmd-form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">lock_outline</i>
                                                    </span>
                                                </div>
                                                <input name="password_confirmation" type="password" class="form-control" placeholder="{{ __('global.login_password_confirmation') }}..." value="{{ old('password') }}" required autocomplete="new-password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer justify-content-center flex-column">
                                <button class="btn btn-primary btn-round mt-4 mb-3">Register</button>
                                or
                                <a class="btn btn-link btn-primary" href="{{ route('login') }}">
                                    {{ __('global.login') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection