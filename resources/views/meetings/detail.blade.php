@extends('layouts.app')

@section('page_name')
Meetings
@endsection

@section('contents')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">



    <div class="row invoice-preview">
        <!-- Invoice -->
        <div class="col-xl-12 col-md-8 col-12 mb-md-0 mb-4">
            <div class="card invoice-preview-card">
                <div class="card-body">
                    @include('layouts.flash_message')
                    <div
                        class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column m-sm-3 m-0">

                        <div>
                            <h4 class="fw-semibold mb-2">{{ $meeting->title }}</h4>
                            <p>It has Credit: {{ $meeting->credits }}. Date: {{ \Carbon\Carbon::parse($meeting->date)->locale('fr')->format('F j, Y') }}, Venue: <strong>{{ $meeting->venue }}</strong>, Starting at {{ $meeting->start }} to End at {{ $meeting->end }}</p>
                     
                        </div>
                    </div>
                    

                </div>
                <hr class="my-0" />
                <div class="card-header border-bottom">
                    <h5 class="card-title mb-0">Meetings <a href="" data-bs-toggle="modal" data-bs-target="#invite"
                            class="btn btn-dark text-white pull-left float-end"><i
                                class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Invite new</span></a></h5>

                </div>
                <div class="row p-4">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Names</th>
                                    <th>Attended</th>
                                    <th style="width: 40ch">Setting</th>
                                </tr>
                            </thead>
                            @php
                                $count = 1;
                            @endphp
                            <tbody> 
                                @forelse ($invitations as $invitation)
                                   <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ $invitation->user->name }}</td>
                                    <td>
                                        @if ($invitation->status == 1)
                                     
                                        <span class="badge bg-label-warning"><i class="fa-solid fa-xmark"></i></span>
                                        @else
                                        <span class="badge bg-label-info"><i class="fa-solid fa-check"></i></span>
                                        @endif
                                    </td>
                                    <td><a href="#"
                                        class="btn btn-success btn-sm text-white"><i
                                            class="ti ti-check me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Accept power of Attomey</span></a>
                                    <a data-bs-toggle="modal" data-bs-target="#delete{{ $invitation->id }}" href="" class="btn btn-danger btn-sm text-white"><i
                                            class="ti ti-trash me-0 me-sm-1 ti-xs"></i></a>
                                        </td>
                                </tr> 
                                <div class="modal modal-top fade" id="delete{{ $invitation->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-sm" role="document">
                                      <div class="modal-content">
                                        <form action="{{ route('meetings.removeInviter') }}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <input type="hidden" name="id" value="{{ $invitation->id }}" />
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel2">Are you sure to delete?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                @php
                                $count++;
                            @endphp
                                @empty
                                <tr>
                                    <td></td>
                                    <td><h4>No invitation <a href="" data-bs-toggle="modal" data-bs-target="#invite">invite</a></h4></td>
                                    <td></td>
                                    <td></td>
                                </tr>   
                              
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- /Invoice -->
    <div class="modal fade" id="invite" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">Invite Advocate to Meeting</h3>
                    </div>
                    <form method="POST" class="row g-3" action="{{ route('meetings.invite') }}">
                        @csrf
                        <div class="col-12">
                            <label for="exampleFormControlSelect2" class="form-label">Example multiple select</label>
                           <input type="hidden" name="meeting" value="{{ $meeting->id }}">
                            <select required name="user[]" multiple class="form-select" id="exampleFormControlSelect2"
                            aria-label="Multiple select example">
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select> 
                            
                           
                        </div>

                        <div class="col-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Invite</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection



@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />

@endsection

@section('js')
<script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>


@endsection