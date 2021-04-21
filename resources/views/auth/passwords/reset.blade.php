@extends('layouts.app')
@section('content')
<div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                    <form class="form" method="POST" action="{{ route('password.request') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="card card-login">
                            <div class="card-header card-header-primary text-center">
                                <h4 class="card-title">{{ trans('global.reset_password') }}</h4>
                            </div>

                            @if(session('status'))
                                <div class="card-body" style="padding: .9375rem 20px;">
                                    <p class="alert alert-info">
                                        {{ session('status') }}
                                    </p>
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">email</i>
                                            </span>
                                        </div>
                                        <input name="email" type="email" class="form-control" placeholder="{{ trans('global.login_email') }}..." value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                    @error('email')
                                        <div class="error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                        </div>
                                        <input name="password" type="password" class="form-control" placeholder="{{ trans('global.login_password') }}..." autocomplete="new-password" required>
                                    </div>
                                    @error('password')
                                        <div class="error" for="email">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                        </div>
                                        <input name="password_confirmation" type="password" class="form-control" placeholder="{{ trans('global.login_password_confirmation') }}..." autocomplete="new-password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer justify-content-center flex-column">
                                <button type="submit" class="btn btn-link btn-primary btn-lg">
                                    {{ trans('global.reset_password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection