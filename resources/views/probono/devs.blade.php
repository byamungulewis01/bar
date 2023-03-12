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
                    <h5>Probono Case Information
                        <a href="" data-bs-toggle="modal" data-bs-target="#development"
                        class="btn btn-success text-white pull-left float-end"><span
                          class="d-none d-sm-inline-block">Report case development</span></a>
                          <div class="modal fade" id="development" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                <div class="modal-content p-3 p-md-5">
                                    <div class="modal-body">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        <div class="text-center mb-4">
                                            <h3 class="mb-2">New Devolopment</h3>
                                        </div>
                                        <form method="POST" class="row g-3" action="{{ route('probono.probono_dev') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-12">
                                                <label class="form-label w-100" for="modalAddCard">New case Status</label>
                                                <input type="hidden" name="probono" value="{{ $probono->id }}">
                                                <div class="input-group input-group-merge">
                                                    <select required name="status" class="form-select">
                                                        <option @if(old('status')=="OPEN" ) selected @endif value="OPEN"
                                                            selected>OPEN</option>
                                                        <option @if(old('status')=="WON" ) selected @endif value="WON">WON
                                                        </option>
                                                        <option @if(old('status')=="LOST" ) selected @endif value="LOST">LOST
                                                        </option>
                                                        <option @if(old('status')=="TRANSACTED" ) selected @endif
                                                            value="TRANSACTED">TRANSACTED</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label" for="modalAddCardName">Event title</label>
                                                <input required type="text" value="{{ old('title') }}" name="title"
                                                    class="form-control" placeholder="Event title" />
        
                                            </div>
                                            <div class="col-12">
                                                <label for="exampleFormControlTextarea1" class="form-label">Event
                                                    Narration</label>
                                                <textarea required name="narration" class="form-control"
                                                    id="exampleFormControlTextarea1" rows="5">Cupcake ipsum dolor sit amet. Halvah cheesecake chocolate bar gummi bears cupcake. Pie macaroon bear claw. Soufflé I love candy canes I love cotton candy I love.
                                            </textarea>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label w-100" for="title">Attach File </label>
                                                <div class="input-group input-group-merge">
                                                    <input accept=".pdf" name="attach_file" class="form-control" type="file" />
        
                                                </div>
                                            </div>
        
                                            <div class="col-12 text-center">
                                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Add</button>
                                                <button type="reset" class="btn btn-label-secondary btn-reset"
                                                    data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </h5>
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
            <div class="row">
                @foreach ($probono_devs as $probono_dev)
                <div class="col-md-12 mb-2">
                    <div class="card">
                        <h6 class="card-header">
                            <span class="badge bg-label-dark">Title:</span>
                                 {{ $probono_dev->title }} 
                            <span class="badge bg-label-dark pull-left float-end">date: <span>  {{ \Carbon\Carbon::parse($probono_dev->created_at )->locale('fr')->format('F j, Y') }}</span></span>
                          
                            </h6>
                        <div class="card-body bg-light" style="padding: 2%">
                            <p>
                                {{ $probono_dev->narration }}
                            </p>
                            @unless ($probono_dev->attach_file == NULL)
                            <p><strong>Attachement file : <a href="{{ route('Download-files',$probono_dev->attach_file) }}">Download</a></strong></p>
                            @endunless
                        </div>
    
        
                    </div>
                </div>
                @endforeach  
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