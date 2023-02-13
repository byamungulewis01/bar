@extends('layouts.app')

@section('page_name')
Probono Details
@endsection

@section('contents')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-6 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5>`Probono Case Information</h5>
                    {{-- {{ $case->case_number }} --}}
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>Case Number</td>
                                    <td>{{ $probono->referral_case_no }}</td>
                                </tr>

                                <tr>
                                    <td>Created On</td>
                                    <td>{{ $probono->created_at }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td> @switch($probono->status)
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
                                </tr>
                                <tr>
                                    <td>Hearing day </td>
                                    <td>{{ $probono->hearing_date }}</td>
                                </tr>
                                <tr>
                                    <td>Case Nature</td>
                                    <td>{{ $probono->case_nature }}</td>
                                </tr>
                                <tr>
                                    <td>Jurisdiction</td>
                                    <td>{{ $probono->jurisdiction }}</td>
                                </tr>
                                <tr>
                                    <td>Court</td>
                                    <td>{{ $probono->court }} </td>
                                </tr>
                                <tr>
                                    <td>LEGAL AIDS SEEKER</td>
                                    <td><strong>{{ $probono->fname }} {{ $probono->lname }} </strong><br>
                                        <span class="badge bg-label-info me-2">Phone</span>{{ $probono->phone }}</td>
                                </tr>
                                <tr>
                                    <td>REFERRER</td>
                                    <td>{{ $probono->referrel }}</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
        <div class="col-xl-6 col-lg-7 col-md-7">
            <div class="card card-action mb-4">
                <div class="card-header align-items-center">
                    <h5 class="card-action-title mb-0">Probono Case Files</h5>

                </div>
                <div class="card-body">

                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>File</th>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @php
                                $count = 1;
                                @endphp
                                @forelse ($files as $file)
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $file->case_title }}</td>
                                    <td>{{ $file->case_type }}</td>
                                    <td><a href="{{ route('Download-files',$file->case_file) }}">Download</a></td>
                                    <td> <a href="" data-bs-toggle="modal" data-bs-target="#delete{{ $file->id }}"
                                            class="text-danger"><i class="ti ti-trash me-0 me-sm-1 ti-xs"></i></a>
                                        <div class="modal modal-top fade" id="delete{{ $file->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <form method="POST" action="{{ route('probono.DeleteFile') }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="id" value="{{ $file->id }}" />
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel2">Are you
                                                                sure you want Delete this?</h5>
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

                                    </td>
                                </tr>
                                @php
                                $count++
                                @endphp
                                @empty
                                <tr>
                                    <td>No file uploaded</td>
                                </tr>

                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>

                <!--/ Teams -->
            </div>
        </div>
    </div>

</div>

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