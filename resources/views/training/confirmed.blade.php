@extends('layouts.app')

@section('page_name')
Trainings
@endsection

@section('contents')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row invoice-preview">
        <!-- Invoice -->
        <div class="col-xl-7 col-md-8 col-12 mb-md-0 mb-4">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div
                        class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">

                        <div>
                            <div class="card-header border-bottom">
                                <h5 class="card-title mb-0">Confirmed<span
                                        class="pull-left float-end"><span class="badge bg-label-info me-2">Training</span> {{ $training->title }}</span>   
                                </h5>

                            </div>
                            <div class="row p-4">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th style="width: 220px">Person</th>
                                                <th>Price</th>
                                                <th>Credit</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        @php
                                        $count = 1;
                                        @endphp

                                        <tbody>
                                            @forelse ($bookings as $booking)
                                            <tr>
                                                <td>{{ $count }}</td>
                                                <td>{{ $booking->user->name}}</td>
                                                <td>{{ $booking->trains->price }}</td>
                                                <td>{{ $booking->trains->credits }}</td>
                                                <td> @if ($booking->confirm)
                                                    <span class="badge bg-label-info me-2">Confirm</span>
                                                @else
                                                <span class="badge bg-label-warning me-2">not Confirm</span>
                                                @endif </td>
                                             
                                            </tr>
                                            @php
                                            $count++;
                                            @endphp
                                            @empty
                                            <tr>
                                                <td></td>
                                                <td colspan="4"><span class="text-warning">No data Found or Not yet Book</span></td>

                                            </tr>
                                            @endforelse


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>
                <hr class="my-0" />


            </div>
        </div>
        <div class="col-xl-5 col-md-8 col-12 mb-md-0 mb-4">
            @include('training.extra')
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
        var dtt = document.querySelector("#starton");
        var startAt = document.querySelector("#startAt");
        var endAt = document.querySelector("#endAt");

        startAt.flatpickr({
                enableTime: !0,
                noCalendar: !0
            }),
            endAt.flatpickr({
                enableTime: !0,
                noCalendar: !0
            }),

            dtt && dtt.flatpickr({
                enableTime: false,
                altInput: !0,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d",
                minDate: 'today'
            })
    });
    $(function () {
        var dtt = document.querySelector("#endon");
        dtt && dtt.flatpickr({
            enableTime: false,
            altInput: !0,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            minDate: 'today'
        })
    });
    $(function () {
        var dtt = document.querySelector("#early_deadline");
        dtt && dtt.flatpickr({
            enableTime: false,
            altInput: !0,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        })
    });
    $(function () {
        var dtt = document.querySelector("#late_deadline");
        dtt && dtt.flatpickr({
            enableTime: !0,
            altInput: !0,
            altFormat: "F j, Y H:i",
            dateFormat: "Y-m-d H:i",
        })
    });


    $(document).ready(function () {
        $("#credit").on("input", function () {
            var value = $(this).val();
            var decimalRegex = /^[0-9.]+(\.[0-9]{1,2})?$/;
            if (!decimalRegex.test(value)) {
                $(this).val(value.substring(0, value.length - 1));
            }
        });
        $("#price").on("input", function () {
            var value = $(this).val();
            var decimalRegex = /^[0-9.]+(\.[0-9]{1,2})?$/;
            if (!decimalRegex.test(value)) {
                $(this).val(value.substring(0, value.length - 1));
            }
        });
        $("#price").on("input", function () {
            var value = $(this).val();
            var decimalRegex = /^[0-9.]+(\.[0-9]{1,2})?$/;
            if (!decimalRegex.test(value)) {
                $(this).val(value.substring(0, value.length - 1));
            }
        });
        $("#seats").on("input", function () {
            var value = $(this).val();
            var decimalRegex = /^[0-9.]+(\.[0-9]{1,2})?$/;
            if (!decimalRegex.test(value)) {
                $(this).val(value.substring(0, value.length - 1));
            }
        });
        $("#rate").on("input", function () {
            var value = $(this).val();
            var decimalRegex = /^[0-9.]+(\.[0-9]{1,2})?$/;
            if (!decimalRegex.test(value)) {
                $(this).val(value.substring(0, value.length - 1));
            }
        });
    });
</script>

@endsection