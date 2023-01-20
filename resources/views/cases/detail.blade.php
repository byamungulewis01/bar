@extends('layouts.app')

@section('page_name')
Discipline Details
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
                    <h3>{{ $case->complaint }} <small class="card-text text-uppercase text-danger">{{ $case->case_number }}</small></h3>
                    <small class="card-text text-uppercase">About Discipline</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-check"></i><span
                                class="fw-bold mx-2">Status:</span> <span
                                class="badge bg-label-info">{{ $case->status }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-crown"></i><span
                                class="fw-bold mx-2">Created:</span>{{ $case->created_at; }}</span></li>

                    </ul>
                    <small class="card-text text-uppercase">PLAINTIFF</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        @if ($case->case_type == 'advcate')
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-user"></i><span
                                class="fw-bold mx-2">name:</span> {{ $case->name }}<span></span></li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span
                                class="fw-bold mx-2">Email:</span> <span> {{ $case->email }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-phone"></i><span
                                class="fw-bold mx-2">Mobile:</span> <span> {{ $case->phone }}</span></li>
                        @else
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-user"></i><span
                                class="fw-bold mx-2">name:</span>{{ $case->user->name }} <span><span
                                    class="badge bg-label-warning me-1">Advocate</span></span></li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span
                                class="fw-bold mx-2">Email:</span> <span>{{ $case->user->email }} </span></li>
                        @endif

                    </ul>
                    <small class="card-text text-uppercase">DEFENDANT</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        @if ($case->case_type == 'advcate')
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-user"></i><span
                                class="fw-bold mx-2">name:</span>{{ $case->user->name }} <span><span
                                    class="badge bg-label-warning me-1">Advocate</span></span></li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span
                                class="fw-bold mx-2">Email:</span> <span>{{ $case->user->email }} </span></li>
                        @else
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-user"></i><span
                                class="fw-bold mx-2">name:</span> {{ $case->name }}<span></span></li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span
                                class="fw-bold mx-2">Email:</span> <span> {{ $case->email }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-phone"></i><span
                                class="fw-bold mx-2">Mobile:</span> <span> {{ $case->phone }}</span></li>
                        @endif
                    </ul>

                </div>
            </div>
            <!--/ About User -->

            <!--/ Profile Overview -->
        </div>
        <div class="col-xl-6 col-lg-7 col-md-7">
            <div class="card mb-4">
                <h5 class="card-header">CREATED BY</h5>
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
                    <ul class="list-unstyled mb-0">
                        <li class="mb-3">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-start">
                                    <div class="avatar me-2">
                                        <img src="../../assets/img/icons/brands/react-label.png" alt="Avatar"
                                            class="rounded-circle" />
                                    </div>
                                    <div class="me-2 ms-1">
                                        <h6 class="mb-0">{{ $host->name }}</h6>
                                        <small class="text-muted">{{ $host->email }}</small>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <a href="javascript:;"><span class="badge bg-label-danger">host</span></a>
                                </div>
                            </div>
                        </li>
                        <hr>
                        <li class="mb-3">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-start">
                                    <div class="avatar me-2">
                                        <img src="../../assets/img/icons/brands/support-label.png" alt="Avatar"
                                            class="rounded-circle" />
                                    </div>
                                    <div class="me-2 ms-1">
                                        <h6 class="mb-0">Support Team</h6>
                                        <small class="text-muted">122 Members</small>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <a href="javascript:;"><span class="badge bg-label-primary">Support</span></a>
                                </div>
                            </div>
                        </li>
                        <li class="mb-3">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-start">
                                    <div class="avatar me-2">
                                        <img src="../../assets/img/icons/brands/figma-label.png" alt="Avatar"
                                            class="rounded-circle" />
                                    </div>
                                    <div class="me-2 ms-1">
                                        <h6 class="mb-0">UI Designers</h6>
                                        <small class="text-muted">7 Members</small>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <a href="javascript:;"><span class="badge bg-label-info">Designer</span></a>
                                </div>
                            </div>
                        </li>
                       
                        <li class="text-center">
                            <a href="" data-bs-toggle="modal" data-bs-target="#partipant">Add new</a>
                        </li>
                    </ul>
                </div>

                <!--/ Teams -->
            </div>
        </div>
    </div>
    <!--/ User Profile Content -->
    <div class="modal fade" id="partipant" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Add Participant</h3>
                        <p class="text-muted">Add new card to complete payment</p>
                    </div>
                    <form method="POST" class="row g-3" action="{{ route('cases.store') }}">
                        @csrf
                        <div class="col-12">
                            <label class="form-label w-100" for="modalAddCard">Name</label>
                            <div class="input-group input-group-merge">
                                <select id="user" name="advcate_id" class="form-select">
                                    <option value="" selected> - Select - </option>
                                    @foreach ($users as $user)
                                    <option @if(old('user')==$user->name) selected @endif
                                        value="{{ $user->id }}">{{ $user->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset"
                                data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </form>
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