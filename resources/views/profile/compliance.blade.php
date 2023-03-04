@extends('layouts.app')

@section('page_name')
User Profile
@endsection

@section('contents')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-5">
        <span class="text-muted fw-light">User  /</span> Contribution
    </h4>

    @include('profile.navigation')

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-5 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-2">
                <div class="modal fade" id="settle" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                        <div class="modal-content p-3 p-md-5">
                            <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                <div class="text-center mb-4">
                                    <h3 class="mb-2">Settlement</h3>
                                </div>
                                <form method="POST" class="row g-3" action="{{ route('contribution.user') }}">
                                    @csrf
                                    <input type="hidden" name="contribution" value="{{ $contribution->id }}">
                                    <input type="hidden" name="advocate" value="{{ $user_id }}">
                                    <div class="col-12">
                                        <label for="title" class="form-label">Transaction Type</label>
                                        <select name="transction_type" class="form-select">
                                            <option value="PAYMENT">PAYMENT</option>
                                            <option value="REFUND">REFUND</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="title" class="form-label">Document No / Ref</label>
                                        <input required type="text" name="reference_no" class="form-control">
                                    </div>
                                    <div class="col-12">
                                        <label for="title" class="form-label">Transaction Date</label>
                                        <input required type="text" name="transction_date" class="form-control" id="date" placeholder="Month DD, YYYY">
                                    </div>
                                    <div class="col-12">
                                        <label for="title" class="form-label">Paid Amount</label>
                                        <input required type="text" name="amount" class="form-control" id="amount">
                                    </div>

                                    <div class="col-12 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="contribution" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                        <div class="modal-content p-3 p-md-5">
                            <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                <div class="text-center mb-4">
                                    <h3 class="mb-2">Contribution</h3>
                                </div>
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <tbody class="table-border-bottom-0">
                                            <tr>
                                                <td>Contribution type</td>
                                                <td> {{ $contribution->name }} </td>
                                            </tr>
                                            <tr>
                                                <td>Period</td>
                                                <td>{{ $contribution->start_period }} <span
                                                        class="text-danger">to</span> {{ $contribution->end_period }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Deadline</td>
                                                <td> {{ $contribution->deadline }} </td>
                                            </tr>
                                            <tr>
                                                <td>Defined Amount</td>
                                                <td>{{ $contribution->amount }} Rwf</td>
                                            </tr>
                                            {{-- <tr>
                                                <td>Fine Amount</td>
                                                <td>
                                                    @php
                                                    $a = App\Models\ContributeAdvocate::count();
                                                    if ($a == '0') {
                                                    $paid = 0;
                                                    } else {
                                                    $b = App\Models\ContributeAdvocate::where('advocate'
                                                    ,$user_id)->first();
                                                    if ($b == '0') {
                                                    $paid = 0;
                                                    } else {
                                                    $contibu = App\Models\ContributeAdvocate::where('advocate'
                                                    ,$user_id)
                                                    ->where('contribution' ,$contribution->id)
                                                    ->first();
                                                    $paid = $contibu->amount;
                                                    }

                                                    }
                                                    @endphp
                                                    {{ $paid }} Rwf
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Paid Amount</td>
                                                <td>{{ $paid }} Rwf</td>
                                            </tr>
                                            <tr>
                                                <td>Status</td>
                                                <td> @if ($paid == 0)
                                                    <span class="badge bg-label-danger me-2">Unpaid</span>
                                                    @else
                                                    <span class="badge bg-label-info me-2">Paid</span>
                                                    @endif</td>
                                            </tr> --}}



                                        </tbody>
                                    </table>
                                    <hr>
                                    {{-- <div class="d-flex justify-content-center">
                                        @unless ($paid != 0)
                                        <button data-bs-toggle="modal" data-bs-target="#settle"
                                        class="btn btn-sm btn-primary">Settle</button>
                                        @endunless
                                      
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card-body">
                    <h6 class="text-uppercase">Contribution</h6>
                    <hr>
                    <table>
                        <tr>
                            <td width="150">Score
                                {{-- @if ($paid == 0)
                                <span class="badge bg-label-danger me-2">Unpaid</span>
                                @else
                                <span class="badge bg-label-info me-2">Paid</span>
                                @endif --}}
                            </td>
                            <td width="200"> Compliance <span class="badge bg-label-info me-2"><i
                                        class="ti ti-check me-0 me-sm-1"></i></span></td>
                            <td><a href="" data-bs-toggle="modal" data-bs-target="#contribution">Details</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!--/ About User -->
            <!-- About User -->
            <div class="card mb-2">
                <div class="card-body">
                    <small class="card-text text-uppercase">Office</small> <br><br>
                    <span class="badge bg-label-info me-2">Score</span>23
                    <span class="badge bg-label-info me-2">Compliance</span> Rwf
                </div>
            </div>
            <!--/ About User -->
            <!-- About User -->
            <div class="card mb-2">
                <div class="card-body">
                    <small class="card-text text-uppercase">Practicing Status</small>
                    <br><br>
                    <span class="badge bg-label-info me-2">Score</span>23
                    <span class="badge bg-label-info me-2">Compliance</span> Rwf
                </div>
            </div>
            <!--/ About User -->

        </div>
        <div class="col-xl-7 col-lg-7 col-md-7">
            <div class="card mb-4">
                <h5 class="card-header">Continuous Legal Education</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-truncate">Item</th>
                                    <th class="text-truncate">Units</th>
                                    <th class="text-truncate"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-truncate">C.L.E</td>
                                    <td class="text-truncate"></td>
                                    <td class="text-truncate"></td>
                                </tr>
                                <tr>
                                    <td class="text-truncate">Extra C.L.E</td>
                                    <td class="text-truncate"></td>
                                    <td class="text-truncate"></td>
                                </tr>
                                <tr>
                                    <td class="text-truncate">Probonos</td>
                                    <td class="text-truncate"></td>
                                    <td class="text-truncate"></td>
                                </tr>
                                <tr>
                                    <td class="text-truncate">Meetings</td>
                                    <td class="text-truncate"></td>
                                    <td class="text-truncate"></td>
                                </tr>
                                <tr>
                                    <td class="text-truncate">Total</td>
                                    <td class="text-truncate"></td>
                                    <td class="text-truncate"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ User Profile Content -->

</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-profile.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
@endsection

@section('js')
<script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<script>
  "use strict";
  $(function () {
    var dtt = document.querySelector("#date");
    dtt.flatpickr({
      enableTime: !0,
      altInput: !0,
      altFormat: "F j, Y",
      dateFormat: "Y-m-d",
    })
  });

  $(document).ready(function () {
        $("#amount").on("input", function () {
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