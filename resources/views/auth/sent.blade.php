@extends('layouts.auth')
@section('contents')
    @if(session('sentEmail'))
        <!-- /Logo -->
        <h4 class="mb-1 pt-2">Verify your email ✉️</h4>
        <p class="text-start mb-4">
          Password reset link have been sent to your email address: {{ session('sentEmail') }} Please follow the link inside to continue.
        </p>
        <a class="btn btn-primary w-100 mb-3" href="{{ route('login') }}">
          Skip for now
        </a>
        <p class="text-center mb-0">Didn't get the mail?
          <a href="javascript:void(0);">
            Resend
          </a>
        </p>
    @endif
@endsection