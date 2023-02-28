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