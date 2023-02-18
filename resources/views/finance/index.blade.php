@extends('layouts.app')

@section('page_name')
Contribution
@endsection

@section('contents')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">



    <!-- Users List Table -->
    <div class="card h-100">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-0">Contributions <a href="" data-bs-toggle="modal" data-bs-target="#contribution"
                    class="btn btn-dark text-white pull-left float-end"><i
                        class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">New
                        Contribution</span></a></h5>

        </div>
        <div class="modal fade" id="contribution" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="mb-2">Define New Contribution</h3>
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <p><strong>Opps Something went wrong</strong></p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>* {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <form method="POST" class="row g-3" action="{{ route('contribution.store') }}">
                            @csrf
                            <div class="col-12">
                                <label for="title" class="form-label">Name</label>
                                <input required type="text" name="name" class="form-control">
                            </div>
                            <div class="col-md-6">

                                <label for="date" class="form-label">Period Start</label>
                                <input required type="text" class="form-control" id="start_period" name="start_period"
                                    placeholder="Month DD, YYYY">
                            </div>
                            <div class="col-md-6">
                                <label for="end" class="form-label">Period End</label>
                                <input required type="text" class="form-control" id="end_period" name="end_period"
                                    placeholder="Month DD, YYYY">
                            </div>
                            <div class="col-4">
                                <label for="venue" class="form-label">Deadline</label>
                                <input required type="text" name="deadline" class="form-control" id="deadline"
                                    placeholder="Month DD, YYYY">
                            </div>
                            <div class="col-4">
                                <label for="venue" class="form-label">Amount</label>
                                {{-- <input required type="text" name="amount" id="amount" class="form-control"> --}}
                                <input type="text" id="numeral-mask" name="amount" class="form-control numeral-mask"
                                    placeholder="Enter Amount" />
                            </div>
                            <div class="col-4">
                                <label for="venue" class="form-label">Fine Percentage</label>
                                <input required type="text" name="percentage" id="percentage" class="form-control">
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" name="concern[]" type="checkbox" value="1"
                                        id="Advocate" />
                                    <label class="form-check-label" for="Advocate">
                                        Concerns Advocate
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="concern[]" type="checkbox" value="3"
                                        id="Support" />
                                    <label class="form-check-label" for="Support">
                                        Concerns Support Staff
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" name="concern[]" type="checkbox" value="2"
                                        id="interns" />
                                    <label class="form-check-label" for="interns">
                                        Concerns interns
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="concern[]" type="checkbox" value="4"
                                        id="Technical" />
                                    <label class="form-check-label" for="Technical">
                                        Technical Staff
                                    </label>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive" style="min-height: 500px;">
            <table class="datatables-users table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Contribution type</th>
                        <th>Period</th>
                        <th>Dealine</th>
                        <th>Amount</th>
                        <th>Fine Parcentage</th>
                        <th>Concerned</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                   @forelse ($contributions as $key => $contribution)
                       <tr>
                        <td>{{ $key+1 }}</td>
                        <td> {{ $contribution->name }} </td>
                        <td> {{ $contribution->start_period }} to {{ $contribution->end_period }}</td>
                        <td>{{ $contribution->deadline }}</td>
                        <td>{{ $contribution->amount }}</td>
                        <td>{{ $contribution->percentage }}</td>
                        <td>
                                @php
                                    $values = explode(',', $contribution->concern);
                                @endphp
                                @foreach($values as $value)
                                    {{ $value }}
                                @endforeach
                        </td>
                        <td>
                            <a href="" class="btn btn-primary btn-sm text-white"><i class="ti ti-pencil me-0 me-sm-1 ti-xs"></i></a>
                            <a href="" class="btn btn-dark btn-sm text-white"><i class="ti ti-mail me-0 me-sm-1 ti-xs"></i></a>
                        </td>
                       </tr>
                   @empty
                       
                   @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>

</div>


<!-- / Content -->

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
<script src="{{ asset('assets/js/forms-file-upload.js') }}"></script>
<script src="{{ asset('assets/js/forms-extras.js') }}"></script>

<script>
    "use strict";
    $(function () {
        var start_period = document.querySelector("#start_period"),
            end_period = document.querySelector("#end_period"),
            deadline = document.querySelector("#deadline");

        start_period.flatpickr({
            autoclose:!0,
            enableTime: !0,
            altInput: !0,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            autoclose:!0,
        });
        end_period.flatpickr({
            autoclose:!0,
            enableTime: !0,
            altInput: !0,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            autoclose:!0,
        });
        deadline.flatpickr({
            autoclose:!0,
            enableTime: !0,
            altInput: !0,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",     
        });
    })


    $(document).ready(function () {
        $("#amount").on("input", function () {
            var value = $(this).val();
            var decimalRegex = /^[0-9.]+(\.[0-9]{1,2})?$/;
            if (!decimalRegex.test(value)) {
                $(this).val(value.substring(0, value.length - 1));
            }
        });
        $("#percentage").on("input", function () {
            var value = $(this).val();
            var decimalRegex = /^[0-9.]+(\.[0-9]{1,2})?$/;
            if (!decimalRegex.test(value)) {
                $(this).val(value.substring(0, value.length - 1));
            }
        });
    });


    @if($errors->any())
    @foreach($errors->all() as $error)

    @endforeach
    @php
    $data = 'Error Accurs';
    @endphp
    $(document).ready(function () {
        $.toast({
            heading: 'Error',
            text: '{{ $error }}',
            showHideTransition: 'fade',
            icon: 'error',
            position: 'top-right',
            hideAfter: 5000,
        });
    });
    @endif
</script>
@endsection