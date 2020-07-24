@extends('admin.layouts.auth')
​
@section('title')
    <title>Login</title>
@endsection
​
@section('content')
<div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan Login</p>

      <form action="{{ route('login') }}" method="post">
        @csrf
        @if (session('error'))
            @component('components.alert')
                @slot('type')
                    danger
                @endslot
                @slot('message')
                    {!! session('error') !!}
                @endslot
            @endcomponent
        @endif
        <span style="color:#dc3545;">{{ $errors->first('email') }}</span>
        <div class="input-group mb-3">
          <input name="email" type="email"
          class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" 
          placeholder="{{ __('E-Mail Address') }}"
          value="{{ old('email') }}">
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <span style="color:#dc3545;">{{ $errors->first('password') }}</span>
        <div class="input-group mb-3">
          <input type="password" name="password"
          class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }} " 
          placeholder="{{ __('Password') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
              <label for="remember">
                Remember Me
                
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
@endsection