@extends('layouts.app');

@section('page_name')
New Meeting
@endsection

@section('contents')
<div class="container-xxl flex-grow-1 container-p-y">

  <div class="row justify-content-center">
    <!-- Basic Custom Radios -->
    <div class="col-xl-6 mb-4">
      <div class="card">
        <h5 class="card-header">New Meeting</h5>
        <div class="card-body">
          <div class="row g-3">
            <form method="POST" class="row g-3" action="{{ route('meetings.store') }}">
              @csrf
              <div class="col-12">
                <label for="title" class="form-label">Title</label>
                <input required type="text" name="title" class="form-control" id="title">
              </div>
              <div class="col-md-6">

                <label for="date" class="form-label">Date and Start time</label>
                <input required type="text" class="form-control" id="date" name="date" placeholder="Month DD, YYYY H:i">
              </div>
              <div class="col-md-6">
                <label for="end" class="form-label">End time</label>
                <input required type="text" class="form-control" id="end" name="end" placeholder="H:i">
              </div>
              <div class="col-9">
                <label for="venue" class="form-label">Venue</label>
                <input required type="text" name="venue" class="form-control" id="venue">
              </div>
              <div class="col-3">
                <label for="venue" class="form-label">Credit</label>
                <input required type="text" name="credits" id="credit" class="form-control">
              </div>
              <div class="col-md mb-md-0 mb-2">
                <div class="form-check custom-option custom-option-basic checked">
                  <label class="form-check-label custom-option-content" for="published1">
                    <input required name="published" class="form-check-input" type="radio" value="1" id="published1">
                    <span class="custom-option-header">
                      <span class="h6 mb-0">Published</span>
                      <span class="text-muted"></span>
                    </span>
                    <span class="custom-option-body">
                      <small>Every user will get this meeting on their meeting list</small>
                    </span>
                  </label>
                </div>
              </div>
              <div class="col-md">
                <div class="form-check custom-option custom-option-basic">
                  <label class="form-check-label custom-option-content" for="published2">
                    <input required name="published" class="form-check-input" type="radio" value="0" id="published2"
                      checked="">
                    <span class="custom-option-header">
                      <span class="h6 mb-0">Not Published</span>
                      <span class="text-muted"></span>
                    </span>
                    <span class="custom-option-body">
                      <small>Only the invited users will get this meeting on their list</small>
                    </span>
                  </label>
                </div>
              </div>
              <div class="col-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Meeting</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /Basic Custom Radios -->
  </div>

  <script>
    // Check selected custom option
    window.Helpers.initCustomOptionCheck();
  </script>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
@endsection

@section('js')
<script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>

<script>
  "use strict";
  $(function () {
    var dtt = document.querySelector("#date"),
      dte = document.querySelector("#end");
    dtt && dtt.flatpickr({
      enableTime: !0,
      altInput: !0,
      altFormat: "F j, Y H:i",
      dateFormat: "Y-m-d H:i",
      minDate: 'today'
    })
    dte && dte.flatpickr({
      enableTime: !0,
      noCalendar: !0
    })
  })

  $(document).ready(function () {
    $("#credit").on("input", function () {
      var value = $(this).val();
      var decimalRegex = /^[0-9.]+(\.[0-9]{1,2})?$/;
      if (!decimalRegex.test(value)) {
        $(this).val(value.substring(0, value.length - 1));
      }
    });
  });
</script>
@endsection