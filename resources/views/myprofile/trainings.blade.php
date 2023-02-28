@extends('layouts.app')

@section('page_name')
Disciplene info
@endsection

@section('contents')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-2">
        <span class="text-muted fw-light">Disciplinary case /</span> Profile
    </h4>


    @include('myprofile.navigation')

    <div class="row invoice-preview">
        <!-- Invoice -->
        <div class="col-xl-7 col-md-8 col-12 mb-md-0 mb-4">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div class="card-datatable table-responsive">
                        <table class="datatables table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Trainings</th>
                                    <th>Descriptions</th>
                                </tr>
                            </thead>
                            @php
                            $count = 1;
                            @endphp
                            @foreach ($trainings as $training)
                            <tbody>
                                <tr>
                                    <td><span class="badge bg-label-danger me-2">{{ $count }}</span></td>
                                    <td><strong>{{ $training->title }}</strong><br>
                                        <span class="badge bg-label-info me-2">Credit</span>{{ $training->credits }}
                                        <span class="badge bg-label-info me-2">Price</span>{{ $training->price }} Rwf
                                    </td>
                                    <td>
                                        <strong>Venue :</strong> {{ $training->venue }}<br>
                                        Start on <u class="text-primary">{{ $training->starton }}</u> |
                                        End on <u class="text-primary">{{ $training->endon }}</u>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <i class="fas fa-bullhorn"></i>
                                    </td>
                                    <td colspan="2">
                                        <h6><span class="badge bg-label-warning me-2">Warning </span>
                                            Early Registration Deadline <u
                                                class="text-danger">{{ $training->early_deadline }}</u> And Late
                                            Registration Deadline
                                            ( <span class="text-warning">with {{ $training->rate }}% increase </span> )
                                            <u class="text-danger">{{ $training->late_deadline }}</u>
                                            @php
                                            $databaseDate = $training->late_deadline;
                                            $today = \Carbon\Carbon::now();
                                            // $ratedate = \Carbon\Carbon::parse($databaseDate);
                                            @endphp
                                            @if (in_array($training->id, $booked))

                                            @else
                                            @if ($today->lte(\Carbon\Carbon::parse($databaseDate)))
                                            <a class="btn btn-sm btn-dark text-white pull-left float-end"
                                                data-bs-toggle="modal"
                                                data-bs-target="#book{{ $training->id }}">Book</a>
                                            @else

                                            @endif

                                            @endif

                                            <div class="modal modal-top fade" id="book{{ $training->id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-md" role="document">
                                                    <div class="modal-content">
                                                        <form method="POST" action="{{ route('training_book') }}">
                                                            @csrf
                                                            <input type="hidden" name="training"
                                                                value="{{ $training->id }}" />
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel2">
                                                                    Do you want to Go with <b
                                                                        class="text-info">{{ $training->title }}</b>
                                                                    Trainings ?
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-label-secondary"
                                                                    data-bs-dismiss="modal">no</button>
                                                                <button type="submit"
                                                                    class="btn btn-warning">Yes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </h6>


                                    </td>

                                </tr>
                            </tbody>
                            @php
                            $count++
                            @endphp

                            @endforeach

                        </table>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-5 col-md-8 col-12 mb-md-0 mb-4">
            @include('myprofile.extra')
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

@endsection