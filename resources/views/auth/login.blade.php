@extends('layouts.auth')

@section('page_name')
Login
@endsection

@section('contents')
      @if(session('reseted'))
      <div class="alert alert-success d-flex align-items-center" role="alert">
        <span class="alert-icon text-success me-2">
          <i class="ti ti-check ti-xs"></i>
        </span>
        {{ session('reseted') }}
      </div>
      @endif
      @if(session('status'))
      <div class="alert alert-danger d-flex align-items-center" role="alert">
        <span class="alert-icon text-danger me-2">
          <i class="ti ti-ban ti-xs"></i>
        </span>
        {{ session('status') }}
      </div>
      @endif
      @if($errors->any())
      <div class="alert alert-danger d-flex align-items-center" role="alert">
        <span class="alert-icon text-danger me-2">
          <i class="ti ti-ban ti-xs"></i>
        </span>
        @foreach ($errors->all() as $error)
          {{ $error }}
        @endforeach
      </div>
      @endif
      <form id="formAuthentication" class="mb-3" method="POST">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email or Username</label>
          <input type="text" class="form-control" id="email" name="username" placeholder="Enter your email or username" autofocus value="{{ old('username') }}">
        </div>
        <div class="mb-3 form-password-toggle">
          <div class="d-flex justify-content-between">
            <label class="form-label" for="password">Password</label>
            <a href="{{ route('password.forgot') }}" class="text-dark">
              <small>Forgot Password?</small>
            </a>
          </div>
          <div class="input-group input-group-merge">
            <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
          </div>
        </div>
        <div class="mb-3">
          <div class="form-check form-check-dark">
            <input class="form-check-input" type="checkbox" id="remember_me">
            <label class="form-check-label" for="remember-me">
              Remember Me
            </label>
          </div>
        </div>
        <div class="mb-3">
          <button class="btn btn-dark d-grid w-100" type="submit">Sign in</button>
        </div>
      </form>
@endsection