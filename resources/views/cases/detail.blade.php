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
            @include('layouts.flash_message')
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5>Case Information</h5>
                    {{-- {{ $case->case_number }} --}}

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
                    <div class="m-2 mr-4">
                        @if ($case->case_status =='CLOSED')
                        <a href="javascript:" data-bs-toggle="modal" data-bs-target="#edit"
                            class="btn btn-warning btn-sm">Edit </a>
                        @else
                        <a href="javascript:" data-bs-toggle="modal" data-bs-target="#edit"
                            class="btn btn-warning btn-sm">Edit </a>
                        <a href="javascript:" data-bs-toggle="modal" data-bs-target="#schedule"
                            class="btn btn-primary btn-sm">Schedule Next Sitting</a>
                        <a href="javascript:" data-bs-toggle="modal" data-bs-target="#notift"
                            class="btn btn-dark btn-sm">Notify
                        </a>
                        @endif

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
            <!-- Modal Authentication App -->
            <div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">Update case</h3>
                            </div>
                         @if ($case->case_type == 1)
                         <form method="POST" class="row g-3" action="{{ route('cases.update') }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="case" value="{{ $case->id }}">
                            <div class="col-12">
                                <label class="switch">
                                    <span class="switch-label">Layman Or Institution Plaintiff</span>
                                </label>
                            </div>
                            <div class="col-12">
                                <label class="form-label w-100" for="modalAddCard">Name</label>
                                <div class="input-group input-group-merge">
                                    <input pattern="[A-Za-z0-9 ]{6,}" title="Name Must have at least 6 characters" required name="name" value="{{ $case->p_name }}"
                                        class="form-control credit-card-mask" type="text"/>
                                    <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span
                                            class="card-type"></span></span>
                                </div>
                            </div>
                            <div class="col-6 col-md-6">
                                <label class="form-label" for="modalAddCardExpiryDate">Email</label>
                                <input type="email" id="modalAddCardExpiryDate" name="email" required
                                    value="{{ $case->p_email }}" class="form-control expiry-date-mask"/>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalAddCardName">Mobile Number</label>
                                <input name="phone" pattern="[0-9]{10}" required maxlength="10" value="{{ $case->p_phone }}"
                                    class="form-control"/>
                            </div>

                            <div class="col-12">
                                <label class="switch">
                                    <span class="switch-label">Advocate defendant</span>
                                </label>
                            </div>
                            <div class="col-12">
                                <label class="form-label w-100" for="modalAddCard">Name</label>
                                <div class="input-group input-group-merge">
                                    <select required name="advocate" class="form-select">
                                        <option value="{{ $case->d_advocate }}" selected>{{ $case->d_name }}</option>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="modalAddCardName">complaint</label>
                                <input pattern="[A-Za-z0-9 ]{10,}" title="complaint must have at least 10 characters" required type="text" value="{{ $case->complaint }}" name="complaint" class="form-control" placeholder="Subject here" />
                                <input type="hidden" name="case_type" value="1" />
                            </div>
                            <div class="col-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Case Sammary</label>
                                <textarea required name="sammary" class="form-control" id="exampleFormControlTextarea1"
                                    rows="3">
                                    {{ $case->sammary }}
                                </textarea>
                            </div>
                            
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                <button type="reset" class="btn btn-label-secondary btn-reset"
                                    data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </form>
                         @endif
                         @if ($case->case_type == 2)
                         <form method="POST" class="row g-3" action="{{ route('cases.update') }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="case" value="{{ $case->id }}">
                            <div class="col-12">
                                <label class="switch">
                                    <span class="switch-label">Advocate Plaintiff</span>
                                </label>
                            </div>
                            <div class="col-12">
                                <label class="form-label w-100" for="modalAddCard">Advocate name</label>
                                <div class="input-group input-group-merge">
                                    <select required name="advocate" class="form-select">
                                        <option value="{{ $case->p_advocate }}" selected>{{ $case->p_name }} </option>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="switch">
                                    <span class="switch-label"> Layman Or Institution defendant</span>
                                </label>
                            </div>
                            <div class="col-12">
                                <label class="form-label w-100" for="modalAddCard">Name</label>
                                <div class="input-group input-group-merge">
                                    <input pattern="[A-Za-z0-9 ]{6,}" title="Name Must have at least 6 characters" required name="name" value="{{ $case->d_name }}"
                                        class="form-control credit-card-mask" type="text"/>
                                    <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span
                                            class="card-type"></span></span>
                                </div>
                            </div>
                            <div class="col-6 col-md-6">
                                <label class="form-label" for="modalAddCardExpiryDate">Email</label>
                                <input type="email" id="modalAddCardExpiryDate" name="email" required
                                    value="{{ $case->d_email }}" class="form-control expiry-date-mask" />
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalAddCardName">Mobile Number</label>
                                <input  name="phone" pattern="[0-9]{10}" required maxlength="10" value="{{ $case->d_phone }}"
                                    class="form-control" />
                            </div>

                            <div class="col-12">
                                <label class="form-label" for="modalAddCardName">complaint</label>
                                <input pattern="[A-Za-z0-9 ]{10,}" title="complaint must have at least 10 characters" required type="text" value="{{ $case->complaint }}" name="complaint" class="form-control" placeholder="Subject here" />
                                <input type="hidden" name="case_type" value="2" />
                            </div>
                            <div class="col-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Case Sammary</label>
                                <textarea required name="sammary" class="form-control" id="exampleFormControlTextarea1"
                                    rows="3">{{ $case->sammary }}</textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                <button type="reset" class="btn btn-label-secondary btn-reset"
                                    data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </form>
                         @endif
                         @if ($case->case_type == 3)
                         <form method="POST" class="row g-3" action="{{ route('cases.update') }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="case" value="{{ $case->id }}">
                            <div class="col-12">
                                <label class="switch">
                                    <span class="switch-label">Advocate Plaintiff</span>
                                </label>
                            </div>
                            <div class="col-12">
                                <label class="form-label w-100" for="modalAddCard">Name</label>
                                <div class="input-group input-group-merge">
                                    <select required name="plaintiff" class="form-select">
                                        <option value="{{ $case->p_advocate }}" selected>{{ $case->p_name }}</option>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="switch">
                                    <span class="switch-label">Advocate Defendant</span>
                                </label>
                            </div>
                            <div class="col-12">
                                <label class="switch">
                                    <span class="switch-label">Civilian defendant</span>
                                </label>
                                <div class="input-group input-group-merge">
                                    <select required name="defendant" class="form-select">
                                        <option value="{{ $case->d_advocate }}" selected> {{ $case->d_name }}</option>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label" for="modalAddCardName">complaint</label>
                                <input pattern="[A-Za-z0-9 ]{10,}" title="complaint must have at least 10 characters" required type="text" value="{{ $case->complaint }}" name="complaint" class="form-control" placeholder="Subject here" />
                                <input type="hidden" name="case_type" value="3" />
                            </div>
                            <div class="col-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Case Sammary</label>
                                <textarea required name="sammary" class="form-control" id="exampleFormControlTextarea1"
                                    rows="3">{{ $case->sammary }}   </textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                <button type="reset" class="btn btn-label-secondary btn-reset"
                                    data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                            </div>
                        </form>
                         @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Authentication App -->
            <div class="modal fade" id="schedule" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">Next schedule Sitting</h3>
                            </div>
                            <form method="POST" class="row g-3" action="{{ route('cases.sitting') }}">
                                @csrf
                                @method('PUT')
                                <div class="col-12">
                                    <input type="hidden" name="id" value="{{ $case->id }}">
                                    <label class="form-label w-100" for="modalAddCard">Session Category</label>
                                    <div class="input-group input-group-merge">
                                        <select required name="category" class="form-select">
                                            <option value="" selected> - Select - </option>
                                            <option value="Hearing by BATONIER">Hearing by BATONIER</option>
                                            <option value="Mediation">Mediation</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="modalAddCardName">Date</label>
                                    <input required type="date" min="<?= date("Y-m-d") ?>" name="sittingdate"
                                        class="form-control" />
                                </div>
                                <div class="col-6">
                                    <label class="form-label" for="modalAddCardName">Time</label>
                                    <input required type="time" name="sittingtime" class="form-control" />
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="modalAddCardName">Avenue</label>
                                    <input required type="text" name="sittingAvenue" class="form-control" />
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


            <div class="card card-action mb-4">
                <div class="card-header align-items-center">
                    <h5 class="card-action-title mb-0">Participant</h5>
                    @if ($case->case_status =='OPEN')
                    <a class="btn btn-primary btn-sm text-white pull-left float-end" data-bs-toggle="modal"
                    data-bs-target="#partipant">
                    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                    <span class="d-none d-sm-inline-block">New Case</span></a>
                    @endif
                  
                </div>
                <div class="card-body">

                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Advocate</th>
                                    <th>Role</th>
                                    <th>Remove</th>
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
                                    <td> 
                                        @if ($case->case_status =='OPEN')
                                        <a href="javascript:" data-bs-toggle="modal"
                                        data-bs-target="#deleteStatus{{ $member->table_id }}" class="text-danger"><i
                                            class="ti ti-trash"></i></a> 
                                        @endif
                                     
                                    </td>

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
                                        <li class="d-flex align-items-center"></i><span class="fw-bold mx-2">Sitting
                                                Time:</span>{{  $sitting['sittingVenue']; }}</span></li>
                                        <li class="d-flex align-items-center"><span class="fw-bold mx-2">Scheduled
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
                                    <td>
                                        @if ($case->case_status =='OPEN')
                                        <a href="" data-bs-toggle="modal"
                                        data-bs-target="#decision{{ $sitting->sitting_id }}"
                                        class="btn btn-primary btn-sm"> <i class="ti ti-plus"> Decision</i></a> 
                                        @endif
                                  
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
<div class="modal fade" id="partipant" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Add Participant</h3>
                    <p class="text-muted">Add new Disciplene Case Member for followup Every Days</p>
                </div>
                <form method="POST" class="row g-3" action="{{ route('cases.addmember') }}">
                    @csrf
                    <div class="col-12">
                        <label class="form-label w-100" for="modalAddCard">Name</label>
                        <div class="input-group input-group-merge">
                            <input type="hidden" name="case_id" value="{{ $case->id }}">
                            <select id="user" name="advcate_id" class="form-select" required>
                                <option value="" selected> - Select - </option>
                                @foreach ($users as $user)
                                <option @if(old('user')==$user->name) selected @endif
                                    value="{{ $user->id }}">{{ $user->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label w-100" for="modalAddCard">Role</label>
                        <div class="input-group input-group-merge">
                            <select id="user" name="role" class="form-select" required>
                                <option value="" disabled selected> - Select - </option>
                                <option value="Plaintiff">Plaintiff</option>
                                <option value="Defendant">Defendant</option>

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
<div class="modal fade" id="decision{{ $sitting->sitting_id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="mb-2">Scheduler Desision</h3>
                </div>
                <form method="POST" class="row g-3" action="{{ route('cases.scheduleDecion') }}">
                    @csrf
                    <input type="hidden" name="sittind_id" value="{{ $sitting->sitting_id }}">
                    <input type="hidden" name="case" value="{{ $case->id }}">
                    <div class="col-12">
                        <label class="switch">
                            <span class="switch-label">Advocate Plaintiff</span>
                        </label>
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" name="status" type="checkbox" value="1"
                                id="defaultCheck2" />
                            <label class="form-check-label" for="defaultCheck2">
                                Close case on submition? (Uncheck if "NO")
                            </label>
                        </div>

                    </div>
                    <div class="col-6">
                        <label class="switch">
                            <span class="switch-label">Desision</span>
                        </label>
                        <div class="input-group input-group-merge">
                            <select required name="desision" class="form-select">
                                <option value="" disabled selected> - Select - </option>
                                <option value="Blame">Blame</option>
                                <option value="Warning">Warning</option>
                                <option value="Referral to discipline commitee">Referral to discipline commitee</option>
                                <option value="Authorization to go to cout">Authorization to go to cout</option>
                                <option value="Reinstate / Absolve / Exculpate">Reinstate / Absolve / Exculpate</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="switch">
                            <span class="switch-label">Taget Advocate</span>
                        </label>
                        <div class="input-group input-group-merge">
                            <select required name="tagetAdvocate" class="form-select">
                                <option value="N/A<" selected> N/A</option>
                                @foreach ($members as $member)
                                <option value="{{ $member->user->name }}">{{ $member->user->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="exampleFormControlTextarea1" class="form-label">Comment on Decision</label>
                        <textarea required name="comment" class="form-control" id="exampleFormControlTextarea1"
                            rows="3">Cupcake ipsum dolor sit amet. Halvah cheesecake chocolate bar gummi bears cupcake.
                            </textarea>
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