@extends('layouts.app')

@section('page_name')
Disciplene info
@endsection

@section('contents')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-5">
        <span class="text-muted fw-light">Disciplinary case /</span> Profile
    </h4>


    @include('profile.navigation')

     <!-- User Profile Content -->
     <div class="row">
        <div class="col-xl-6 col-lg-5 col-md-5">
       
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Case Information</h5>
                @foreach ($sittings as $sitting)
                    
                @endforeach

                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>Disciplinary Case Number</td>
                                    <td>{{ $case->case_number }}</td>
                                </tr>
                                <tr>
                                    <td>Created By</td>
                                    <td>{{ $case->admin->name }}</td>
                                </tr>
                                <tr>
                                    <td>Created On</td>
                                    <td>{{ $case->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>@if ($case->case_status =='OPEN')
                                        <span class="badge bg-label-info">{{ $case->case_status }}</span>
                                        @else
                                        <span class="badge bg-label-danger">{{ $case->case_status }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Authority</td>
                                    <td>{{ $case->authority }}</td>
                                </tr>
                                <tr>
                                    <td>Complaint</td>
                                    <td>{{ $case->complaint }}</td>
                                </tr>
                                <tr>
                                    <td>Next Sitting Day</td>
                                    <td>{{ $sitting->sittingDay }}</td>
                                </tr>
                                <tr>
                                    <td>Next Sitting Time</td>
                                    <td>{{ $sitting->sittingTime }}</td>
                                </tr>

                                <tr>
                                    <td>Plaintiff</td>
                                    <td>{{ $case->p_name }}

                                        @if ($case->case_type == 1)

                                        @elseif ($case->case_type == 2)
                                        <span class="badge bg-label-warning me-2">Advocate</span>
                                        @else
                                        <span class="badge bg-label-warning me-2">Advocate</span>
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td>Defendant</td>
                                    <td>{{ $case->d_name }}
                                        @if ($case->case_type == 1)
                                        <span class="badge bg-label-warning me-2">Advocate</span>
                                        @elseif ($case->case_type == 2)

                                        @else
                                        <span class="badge bg-label-warning me-2">Advocate</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
              
                </div>


            </div>
        </div>
        <div class="col-xl-6 col-lg-7 col-md-7">
            <div class="card mb-4">
                <h5 class="card-header">Case Sammry</h5>
                <div class="cord-body bg-light" style="padding: 2%">
                    <p>
                        {{ $case->sammary }}
                    </p>
                </div>

            </div>
       

            <div class="card card-action mb-4">
                <div class="card-header align-items-center">
                    <h5 class="card-action-title mb-0">Participant</h5>
                  
                </div>
                <div class="card-body">

                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Advocate</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @php
                                $count = 1;
                                @endphp
                                @foreach ($members as $member)
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $member->user->name }}</td>
                                    <td>{{ $member->role }}</td>
                              

                                </tr>
                                @php
                                $count++
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!--/ Teams -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">

                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Schedules</th>
                                    <th style="width: 700px;">Conclusions</th>
                                    <th style="width: 10px;"></th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @php
                                $count = 1;
                                @endphp
                                @foreach ($sittings as $sitting)
                                @if ($sitting->sittingDay == 'NONE')
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                               
                                </tr>
                                @else
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>

                                        <li class="d-flex align-items-center"><span class="fw-bold mx-2"><span
                                                    class="badge bg-primary">{{  $sitting['category']; }}</span>
                                        </li>
                                        <li class="d-flex align-items-center"><span class="fw-bold mx-2">Sitting
                                                Day:</span>{{  $sitting['sittingDay']; }}</span></li>
                                        <li class="d-flex align-items-center"><span class="fw-bold mx-2">Sitting
                                                Time:</span>{{  $sitting['sittingTime']; }}</span></li>
                                        <li class="d-flex align-items-center"></i><span
                                                class="fw-bold mx-2">Sitting
                                                Time:</span>{{  $sitting['sittingVenue']; }}</span></li>
                                        <li class="d-flex align-items-center"><span
                                                class="fw-bold mx-2">Scheduled
                                                by:</span>{{  $sitting->admin->name; }}</span></li>

                                    </td>
                                    <td>
                                        <li class="d-flex align-items-center mb-2"><span class="fw-bold mx-2"><span
                                            class="badge bg-danger">{{  $sitting['decisionCategory']; }}</span>
                                </li>
                                <li class="d-flex align-items-center"><span class="fw-bold mx-2">
                                    <span class="badge bg-primary">Targeting:</span>
                                </span>{{  $sitting['targetedAdvocate']; }}</span></li>
                                
                                    <u>Comment</u> <br>
                                {{ $sitting['comment']; }}
    
                                    </td>
                                

                                </tr>
                                @endif

                                @php
                                $count++;
                                @endphp
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
        <!--/ About User -->

        <!--/ Profile Overview -->
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