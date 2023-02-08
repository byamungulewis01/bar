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

    <!-- User Profile Content -->
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Case number</th>
                        <th>Complaint</th>
                        <th>Plaintiff</th>
                        <th>Defendant</th>
                        <th>Authority</th>
                        <th>Status</th>
                    </tr>
                </thead>
                @php
                $count = 1;
                @endphp
                @foreach ($cases as $case)
                <tbody class="table-border-bottom-0">

                    <tr>

                        <td>{{ $count }}</td>
                        <td><a
                                href="{{ route('discipline_delails',$case->id) }}">{{ $case->case_number }}</a>
                        </td>
                        <td>{{ $case->complaint }}</td>
                        <td>{{ $case->p_name }} <br>
                            @if ($case->case_type != 1)
                            <span class="badge bg-label-warning me-2">Advocate</span>
                            @endif
                        </td>
                        <td>{{ $case->d_name }} <br>
                            @if ($case->case_type != 2)
                            <span class="badge bg-label-warning me-2">Advocate</span>
                            @endif
                        </td>
                        <td>{{ $case->authority }}</td>
                        <td>
                            @if ($case->case_status == 'OPEN')
                            <span class="badge bg-label-info me-2">{{ $case->case_status }}</span>
                            @else
                            <span class="badge bg-label-danger me-2">{{ $case->case_status }}</span>
                            @endif
                        </td>

                    </tr>
                </tbody>

                @php
                $count++;
                @endphp
                @endforeach
            </table>
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