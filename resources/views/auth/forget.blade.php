@extends('layouts.auth')

@section('page_name')
Forget Password
@endsection

@section('contents')
  <h4 class="mb-1 pt-2">Forgot Password? 🔒</h4>
  @if(session('notexist'))
  <div class="alert alert-danger d-flex align-items-center" role="alert">
    <span class="alert-icon text-danger me-2">
      <i class="ti ti-ban ti-xs"></i>
    </span>
    {{ session('notexist') }}
  </div>
  @else
  <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>
  @endif
  <form id="formAuthentication" class="mb-3" method="POST">
    @csrf
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus>
    </div>
    <button class="btn btn-dark d-grid w-100"  type="submit">Send Reset Link</button>
  </form>
  <div class="text-center">
    <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center text-dark">
      <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
      Back to login
    </a>
  </div>
@endsection