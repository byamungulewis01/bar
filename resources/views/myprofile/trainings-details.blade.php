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
        <div class="col-xl-8 col-md-8 col-12 mb-md-0 mb-4">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div
                        class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">

                        <div>
                            <h4 class="fw-semibold mb-2">{{ $training->title }}</h4>
                            
                            <p>It has Credit: {{ $training->credits }}. Venue: <strong>{{ $training->venue }}</strong>,
                                Starting on <u class="text-danger">{{ $training->starton }} </u> to End on <u
                                    class="text-danger">{{ $training->endon }} </u></p>
                            <hr>

                            <div class="demo-inline-spacing mt-3">
                                <div class="list-group list-group-horizontal-md text-md-center">
                                    <a class="list-group-item list-group-item-action active" id="home-list-item"
                                        data-bs-toggle="list" href="#horizontal-home">Training Topic</a>
                                    <a class="list-group-item list-group-item-action" id="profile-list-item"
                                        data-bs-toggle="list" href="#horizontal-profile">Training Materials</a>
                                </div>
                                <div class="tab-content px-0 mt-0">
                                    <div class="tab-pane fade show active" id="horizontal-home">
                                        <div class="card-header border-bottom">
                                            <h5 class="card-title mb-0">Training Topic </h5>

                                        </div>
                                        <div class="row p-4">
                                            <div class="table-responsive">
                                                <table class="table m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th style="width: 200px">Topic</th>
                                                            <th style="width: 150px">Start At</th>
                                                            <th style="width: 110px">End At</th>
                                                            <th style="width: 100px">Trainer</th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    @php
                                                    $count = 1;
                                                    @endphp

                                                    <tbody>
                                                        @forelse ($topics as $topic)
                                                        <tr>
                                                            <td>{{ $count }}</td>
                                                            <td>{{ $topic->topic }}</td>
                                                            <td>{{ $topic->startAt }}</td>
                                                            <td>{{ $topic->endAt }}</td>
                                                            <td>{{ $topic->trainer }}</td>
                                                       
                                                        </tr>
                                                        @php
                                                        $count++;
                                                        @endphp
                                                        @empty
                                                        <tr>
                                                            <td></td>
                                                            <td colspan="4"><span class="text-warning">No Topic
                                                                    Specified</span></td>

                                                        </tr>
                                                        @endforelse


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="horizontal-profile">
                                        <div class="card-header border-bottom">
                                            <h5 class="card-title mb-0">Training Materials
                                              
                                            </h5>

                                        </div>
                                        <div class="row p-4">
                                            <div class="table-responsive">
                                                <table class="table m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Title</th>
                                                            <th>Files</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                    $count = 1;
                                                    @endphp
                                                    <tbody>
                                                        @forelse ($materials as $material)
                                                        <tr>
                                                            <td>{{ $count }}</td>
                                                            <td>{{ $material->title }}</td>
                                                            <td><a
                                                                    href="{{ route('userDownload',$material->file ) }}">Download</a>
                                                            </td>
                                                          
                                                        </tr>
                                                        @php
                                                        $count++;
                                                        @endphp
                                                        @empty
                                                        <tr>
                                                            <td></td>
                                                            <td colspan="4"><span class="text-warning">No Material
                                                                    Specified</span></td>

                                                        </tr>
                                                        @endforelse


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>


                    </div>


                </div>
                <hr class="my-0" />


            </div>
        </div>
        <div class="col-xl-4 col-md-8 col-12 mb-md-0 mb-4">
            <div class="card mb-2">
                <div class="card-body">
                    <h6>Active Enrolments</h6>
                    <div class="card-datatable table-responsive">
                        <table class="datatables table">
                            <thead>
                                <tr>
                                    <th style="width: 3px;">#</th>
                                    <th>Trainings</th>
                                    <th></th>
                                </tr>
                            </thead>
                            @php
                            $count = 1;
                            @endphp
                            @foreach ($bookings as $booking)
                            <tbody>
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td><strong>{{ $booking->trains->title }}</strong><br>
                                        <span class="badge bg-label-info me-2">Price</span>{{ $booking->trains->price }}
                                        Rwf
                                    </td>
                                    <td>
                                        @if ($booking->confirm)
                                        <a href="{{ route('mytraings_detail' , $booking->training) }}" class="btn btn-sm btn-primary"><i class='ti-xs ti ti-list me-1'></i></a>
                                       
                                        @else
                                        <a href="" data-bs-toggle="modal" data-bs-target="#payee{{ $booking->id }}"
                                            class="text-info">payee</a>
                                            <div class="modal fade" id="payee{{ $booking->id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div
                                                    class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                                    <div class="modal-content p-3 p-md-5">
                                                        <div class="modal-body">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                            <div class="text-center mb-4">
                                                                <h3 class="mb-2">Pay <span
                                                                        class="text-danger">{{ $booking->trains->price }}
                                                                        Rwf </span> To be Enrolled in
                                                                    <span
                                                                        class="text-primary">{{ $booking->trains->title }}</span>
                                                                </h3>
                                                            </div>
                                                            <form method="POST" class="row g-3"
                                                                action="{{ route('paytraining') }}">
    
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="id" value="{{ $booking->id }}">
                                                                <div class="col-12 d-flex justify-content-center">
                                                                    <button type="submit"
                                                                        class="btn btn-primary waves-effect waves-light">Make
                                                                        payment</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <a href="" class="text-danger" data-bs-toggle="modal"
                                                data-bs-target="#removetraion{{ $booking->id }}"><i
                                                    class='ti-xs ti ti-trash me-1'></i></a>
                                            <div class="modal modal-top fade" id="removetraion{{ $booking->id }}"
                                                tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-md" role="document">
                                                    <div class="modal-content">
                                                        <form method="POST" action="{{ route('book_remove') }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="id" value="{{ $booking->id }}" />
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel2">Are you
                                                                    sure you want Remove this ?</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-label-secondary"
                                                                    data-bs-dismiss="modal">no</button>
                                                                <button type="submit" class="btn btn-danger">Yes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
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
            <div class="card invoice-preview-card">
                <div class="card-body">
                    <div
                        class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">

                        <div>
                            <h4>Attendence List</h4>
                            <p>Please choose Training Day to generate eAttendance List for <strong>
                                </strong></p>

                        </div>

                    </div>


                </div>
                <hr class="my-0" />


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

@endsection