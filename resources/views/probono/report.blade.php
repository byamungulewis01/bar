@extends('layouts.app')

@section('page_name')
Pro Bono Cases
@endsection

@section('contents')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

  <!-- Users List Table -->
  <div class="card">
    <div class="card-datatable table-responsive">
      <table class="datatables-probono table border-top">
        <thead>
          <tr>
            <th>#</th>
            <th style="width: 20%">Legal Aids Seeker</th>
            <th>Referrer</th>
            <th>Case Number</th>
            <th>Case Nature</th>
            <th>Case Status</th>
            <th>Hearing Day</th>
          </tr>
        </thead>
        @php
        $count = 1;
        @endphp
        @forelse ($probonos as $probono)

        <tbody>
          <tr>
            <td><span class="badge bg-label-danger me-2">{{ $count }}</span></td>
            <td>{{ $probono->fname }} {{ $probono->lname }} <br>
              <span class="badge bg-label-info me-2">Phone</span>{{ $probono->phone }}
            </td>
            <td>{{ $probono->referrel }} <br>
              <span class="badge bg-label-primary me-2">Category</span>{{ $probono->category }}
            </td>
            <td>{{ $probono->referral_case_no }}</td>
            <td>{{ $probono->case_nature }}</td>
            <td>
              @switch($probono->status)
              @case('OPEN')
              <span class="badge bg-label-primary me-2">{{ $probono->status }}</span>
              @break
              @case('WON')
              <span class="badge bg-label-success me-2">{{ $probono->status }}</span>
              @break
              @case('LOST')
              <span class="badge bg-label-warning me-2">{{ $probono->status }}</span>
              @break
              @default
              <span class="badge bg-label-danger me-2">{{ $probono->status }}</span>
              @endswitch

            </td>
            <td>
              {{ \Carbon\Carbon::parse($probono->hearing_date)->locale('fr')->format('F j, Y') }}
            </td>
          </tr>
        </tbody>

        @php
        $count++
        @endphp
        @empty
        <tbody>
          <tr>

            <td colspan="3">
              <h6 class="text-warning">
                Empy No Probono Founds Case

              </h6>

            </td>

          </tr>

        </tbody>
        @endforelse

      </table>
    </div>
  </div>

</div>


@endsection


@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />

@endsection

@section('js')
<script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<script>
  "use strict";
  $(function () {
    var dtt = document.querySelector("#date"),
      dte = document.querySelector("#end");
    dtt && dtt.flatpickr({
      enableTime: false,
      altInput: !0,
      altFormat: "F j, Y",
      dateFormat: "Y-m-d",
      minDate: 'today'
    })
    dte && dte.flatpickr({
      enableTime: !0,
      noCalendar: !0
    })
  })
  $(function () {
    var dtt1 = document.querySelector("#date1"),
      dte1 = document.querySelector("#end1");
    dtt1 && dtt1.flatpickr({
      enableTime: false,
      altInput: !0,
      altFormat: "F j, Y",
      dateFormat: "Y-m-d",
      minDate: 'today'
    })
    dte1 && dte1.flatpickr({
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
    $("#credit1").on("input", function () {
      var value = $(this).val();
      var decimalRegex = /^[0-9.]+(\.[0-9]{1,2})?$/;
      if (!decimalRegex.test(value)) {
        $(this).val(value.substring(0, value.length - 1));
      }
    });
  });
</script>

@endsection