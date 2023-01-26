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
                    <h3>{{ $probono->referral_case_no }} </h3>
                    <small class="card-text text-uppercase">About Probono</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-check"></i><span
                                class="fw-bold mx-2">Status:</span>
                            @if ($probono->case_status == 'OPEN')
                            <span class="badge bg-label-info me-2">{{ $probono->case_status }}</span>
                            @else
                            <span class="badge bg-label-danger me-2">{{ $probono->case_status }}</span>
                            @endif
                            <a href=""><i class="ti ti-edit"></i></a>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-crown"></i><span
                                class="fw-bold mx-2">Created:</span>{{ $probono->created_at; }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-crown"></i><span
                                class="fw-bold mx-2">category:</span>{{ $probono->category; }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-crown"></i><span
                                class="fw-bold mx-2">Case nature:</span>{{ $probono->case_nature; }}</span></li>



                        <li class="d-flex align-items-center mb-3"><i class="ti ti-check"></i><span
                                class="fw-bold mx-2">Hearing Date:</span>
                            {{ $probono->hearing_date; }}
                            <a href=""><i class="ti ti-edit"></i></a>
                        </li>

                    </ul>
                    <small class="card-text text-uppercase">REFERRAL INFO</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-user"></i><span
                                class="fw-bold mx-2">name:</span> {{ $probono->referral_name }}<span></span></li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span
                                class="fw-bold mx-2">Gender:</span> <span> {{ $probono->referral_gender }}</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-phone"></i><span
                                class="fw-bold mx-2">Mobile:</span> <span> {{ $probono->referral_mobile }}</span></li>

                    </ul>

                </div>
            </div>
            <!--/ About User -->

            <!--/ Profile Overview -->
        </div>
        <div class="col-xl-6 col-lg-7 col-md-7">
            <div class="card mb-2">
                <h5 class="card-header">CREATED BY</h5>
                <div class="d-flex align-items-center" style="padding: 2%">
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
            </div>

            <div class="card card-action mb-4">
                <div class="card-header align-items-center">
                    <h5 class="card-action-title mb-0">Participant</h5>

                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">

                        @foreach ($members as $member)
                        <li class="mb-3">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-start">
                                    <div class="avatar me-2">
                                        <img src="{{ asset('assets/img/avatars/')}}/{{$member->user->photo}}"
                                            alt="Avatar" class="rounded-circle" />
                                    </div>
                                    <div class="me-2 ms-1">
                                        <h6 class="mb-0">{{ $member->user->name }}</h6>
                                        <small class="text-muted">{{ $member->user->email }}</small>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <a href="javascript:;"><span class="badge bg-label-primary">Support</span></a>
                                    <a href=""><i class="ti ti-trash ti-sm me-2"></i></a>
                                </div>
                            </div>
                        </li>
                        @endforeach


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
                        <p class="text-muted">Add new Disciplene Case Member for followup Every Days</p>
                    </div>
<form method="POST" class="row g-3" action="{{ route('probono.addmember') }}">
    @csrf
    <div class="col-12">
        <label class="form-label w-100" for="modalAddCard">Name</label>
        <div class="input-group input-group-merge">
            <input type="hidden" name="probono" value="{{ $probono->id }}">
            <select id="user" name="advcate_id" class="form-select" required>
                <option value="" selected> - Select - </option>
                @foreach ($users as $user)
                <option @if(old('advcate_id')==$user->name) selected @endif
                    value="{{ $user->id }}">{{ $user->name}}</option>
                @endforeach

            </select>
        </div>
    </div>
    <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
        <button type="reset" class="btn btn-label-secondary btn-reset" data-bs-dismiss="modal"
            aria-label="Close">Cancel</button>
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