@extends('layouts.auth')

@section('page_name')
New Password
@endsection

@section('contents')
      <h4 class="mb-1 pt-2">Change your password 🔐️</h4>
      @if(session('invalid'))
        <div class="alert alert-danger d-flex align-items-center" role="alert">
          <span class="alert-icon text-danger me-2">
            <i class="ti ti-ban ti-xs"></i>
          </span>
          {{ session('invalid') }}
        </div>
      @endif
      <form id="formAuthentication" class="@if($errors->any()) was-validated @endif" novalidate="" class="mb-3" method="POST">
        @csrf
        <div class="mb-3 form-password-toggle">
          <div class="d-flex justify-content-between">
            <label class="form-label" for="password">Current Password</label>
          </div>
          <div class="input-group input-group-merge">
            <input type="password" class="form-control" name="current" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
          </div>
        </div>

        <div class="mb-3 form-password-toggle">
          <div class="d-flex justify-content-between">
            <label class="form-label" for="password">New Password</label>
          </div>
          <div class="input-group input-group-merge">
            <input type="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
          </div>
        </div>

        <div class="mb-3 form-password-toggle">
          <div class="d-flex justify-content-between">
            <label class="form-label" for="password">Confirm Password</label>
          </div>
          <div class="input-group input-group-merge">
            <input type="password" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
            <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
          </div>
        </div>
        <div class="mb-3">
          <button class="btn btn-dark d-grid w-100" type="submit">Change Password</button>
        </div>
      </form>
@endsection