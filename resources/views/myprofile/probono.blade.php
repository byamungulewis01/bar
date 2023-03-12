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
    <div class="card-header border-bottom">
      <h5 class="card-title mb-0">Pro Bono Cases
        <a class="btn btn-dark text-white pull-left float-end" data-bs-toggle="modal" data-bs-target="#newCase"><i
            class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">New case</span></a><a
          class="d-none" id="edit" data-bs-toggle="modal" data-bs-target="#editmeetings"></a></h5>
      <!-- New User Modal -->
      <div class="modal fade" id="newCase" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-user">
          <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="text-center mb-4">
                <h3 class="mb-2">New Probono Case</h3>

              </div>
              <form action="{{ route('probono-store') }}" class="row g-3" method="post" enctype="multipart/form-data">
                @csrf

                <div class="col-12 col-md-6">
                  <label class="form-label" for="name">First Name</label>
                  <input required type="text" name="fname" class="form-control" placeholder="John"
                    value="{{ old('fname') }}" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="email">Last name</label>
                  <input required type="text" name="lname" class="form-control" placeholder="doe"
                    value="{{ old('lname') }}" />
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label" for="gender">Gender</label>
                  <select required id="gender" name="gender" class="form-select">
                    <option value="" selected> - Select - </option>
                    <option @if(old('gender')=="Male" ) selected @endif value="Male">Male</option>
                    <option @if(old('gender')=="Male" ) selected @endif value="Female">Female</option>
                  </select>
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="email">Age</label>
                  <input required type="number" min="1" max="170" name="age" class="form-control" placeholder="Age"
                    value="{{ old('age') }}" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="phone">Phone Number</label>
                  <div class="input-group">
                    <span class="input-group-text">RW (+25)</span>
                    <input required type="text" id="number" title="Phone must have at least 10 Digits" name="phone"
                      class="form-control phone-number-mask" minlength="10" maxLength="10" placeholder="xxx xxx xxxx"
                      value="{{ old('phone') }}" />
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="email">Referral Case No</label>
                  <input required type="text" name="referral_case_no" class="form-control"
                    placeholder="RC 0004B77/2022/TB/009" value="{{ old('referralcaseno') }}" />
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label" for="email">Jurisdiction</label>
                  <input required type="text" name="jurisdiction" class="form-control" placeholder="Jurisdiction"
                    value="{{ old('referralcaseno') }}" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="phone">Court</label>
                  <div class="input-group">
                    <input required type="text" name="court" class="form-control phone-number-mask"
                      placeholder="Court Name" value="{{ old('phone') }}" />
                  </div>
                </div>

                <div class="col-12 col-md-6">
                  <label class="form-label" for="category">Case nature</label>
                  <select required name="case_nature" class="form-select">
                    <option value="" selected> - Select - </option>
                    <option @if(old('nature')=="Criminal" ) selected @endif value="Criminal">Criminal</option>
                    <option @if(old('nature')=="Civil" ) selected @endif value="Civil">Civil</option>
                    <option @if(old('nature')=="Social" ) selected @endif value="Social">Social</option>
                    <option @if(old('nature')=="Commercial" ) selected @endif value="Commercial">Commercial</option>
                  </select>
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="flatpickr-date">Hearing Day</label>
                  <input required type="text" class="form-control" id="date" name="hearing_date"
                    placeholder="Month DD, YYYY" class="form-control" />
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="status">Category</label>
                  <select required id="status" name="category" class="form-select">
                    <option value="" selected> - Select - </option>
                    <option @if(old('category')=="Case Agaist RBA" ) selected @endif value="Case Agaist RBA">Case Agaist
                      RBA
                    </option>
                    <option @if(old('category')=="Legal Aid to General Public" ) selected @endif
                      value="Legal Aid to General Public">Legal Aid to General Public</option>
                    <option @if(old('category')=="Minors" ) selected @endif value="Minors">Minors</option>
                    <option @if(old('category')=="Supreme count" ) selected @endif value="Supreme count">Supreme count
                    </option>
                    <option @if(old('category')=="Count" ) selected @endif value="count">Count</option>
                    <option @if(old('category')=="Prosecutor" ) selected @endif value="Prosecutor">Prosecutor</option>
                    <option @if(old('category')=="Police" ) selected @endif value="Police">Police</option>
                    <option @if(old('category')=="Prison" ) selected @endif value="Prison">Prison</option>
                    <option @if(old('category')=="Other" ) selected @endif value="Other">Other</option>
                  </select>
                </div>
                <div class="col-12 col-md-6">
                  <label class="form-label" for="practicing">Referrel Name</label>
                  <input required type="text" name="referrel" class="form-control" placeholder="Referrel Name"
                    value="{{ old('referrel') }}" />
                </div>
                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                  <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                    aria-label="Close">Cancel</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th style="width: 20%">Legal Aids Seeker</th>
            <th>Referrer</th>
            <th>Case Number</th>
            <th>Case Nature</th>
            <th>Case Status</th>
            <th>Hearing Day</th>
            <th>Manage</th>
          </tr>
        </thead>
        </thead>
        <tbody class="table-border-bottom-0">
          @php
          $count = 1;
          @endphp
          @forelse ($probonos as $probono)
        <tbody>
          <tr>
            <td><span class="badge bg-label-danger me-2">{{ $count }}</span></td>
            <td>{{ $probono->fname }} {{ $probono->lname }} <br>
              <span class="badge bg-label-info me-2">Phone</span>{{ $probono->phone }}
            </td>
            <td>{{ $probono->referrel }} <br>
              <span class="badge bg-label-primary me-2">Category</span>{{ $probono->category }}
            </td>
            <td>{{ $probono->referral_case_no }}</td>
            <td>{{ $probono->case_nature }}</td>
            <td>
              @switch($probono->status)
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
            <td>
              {{ \Carbon\Carbon::parse($probono->hearing_date)->locale('fr')->format('F j, Y') }}
            </td>
            <td>
              @unless ($probono->register == NULL)
              <a class="btn btn-sm btn-primary" href="{{ route('probono-details',$probono->id) }}"><i
                  class="ti ti-eye me-0 me-sm-1 ti-xs"></i>Details</a>

              @else
              <a href="{{ route('probono-details',$probono->id) }}"><i class="ti ti-eye me-0 me-sm-1 ti-xs"></i></a>
              <a href="" data-bs-toggle="modal" data-bs-target="#edit{{ $probono->id}}" class="text-primary"><i
                  class="ti ti-edit me-0 me-sm-1 ti-xs"></i></a>
              <a href="" data-bs-toggle="modal" data-bs-target="#delete{{ $probono->id }}" class="text-danger"><i
                  class="ti ti-trash me-0 me-sm-1 ti-xs"></i></a>
              <div class="modal modal-top fade" id="delete{{ $probono->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                  <div class="modal-content">
                    <form action="{{ route('probono-delete') }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <input type="hidden" name="probono" value="{{ $probono->id }}" />
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Are you sure to delete</h5>
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
              <!-- Add New Address Modal -->
              <div class="modal fade" id="edit{{ $probono->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
                  <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                        <h3 class="address-title mb-2">Edit Probono Case</h3>
                        <p class="text-muted address-subtitle">change New Probono case Desciption in case you make
                          mistakes </p>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                        @endif

                      </div>
                      <form action="{{ route('probono-update') }}" class="row g-3" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $probono->id }}">
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="name">First Name</label>
                          <input required type="text" name="fname" class="form-control" value="{{ $probono->fname }}" />
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="email">Last name</label>
                          <input required type="text" name="lname" class="form-control" value="{{ $probono->lname }}" />
                        </div>

                        <div class="col-12 col-md-6">
                          <label class="form-label" for="gender">Gender</label>
                          <select required id="gender" name="gender" class="form-select">
                            <option value="{{ $probono->gender }}" selected>{{ $probono->gender }}</option>
                            <option @if(old('gender')=="Male" ) selected @endif value="Male">Male</option>
                            <option @if(old('gender')=="Male" ) selected @endif value="Female">Female</option>
                          </select>
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="email">Age</label>
                          <input required type="number" min="1" max="170" name="age" class="form-control"
                            value="{{ $probono->age }}" />
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="phone">Phone Number</label>
                          <div class="input-group">
                            <span class="input-group-text">RW (+25)</span>
                            <input required type="text" pattern="[0-9]{10,}" title="Phone must have at least 10 Digits"
                              name="phone" id="number_update" class="form-control phone-number-mask" minlength="10" maxLength="10"
                              value="{{ $probono->phone }}" />
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="email">Referral Case No</label>
                          <input required type="text" name="referral_case_no" class="form-control"
                            value="{{ $probono->referral_case_no }}" />
                        </div>

                        <div class="col-12 col-md-6">
                          <label class="form-label" for="email">Jurisdiction</label>
                          <input required type="text" name="jurisdiction" class="form-control"
                            value="{{ $probono->jurisdiction }}" />
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="phone">Court</label>
                          <div class="input-group">
                            <input required type="text" id="phone" name="court" class="form-control phone-number-mask"
                              value="{{ $probono->court }}" />
                          </div>
                        </div>

                        <div class="col-12 col-md-6">
                          <label class="form-label" for="category">Case nature</label>
                          <select required name="case_nature" class="form-select">
                            <option value="{{ $probono->case_nature }}" selected>{{ $probono->case_nature }}</option>
                            <option @if(old('nature')=="Criminal" ) selected @endif value="Criminal">Criminal</option>
                            <option @if(old('nature')=="Civil" ) selected @endif value="Civil">Civil</option>
                            <option @if(old('nature')=="Social" ) selected @endif value="Social">Social</option>
                            <option @if(old('nature')=="Commercial" ) selected @endif value="Commercial">Commercial
                            </option>
                          </select>
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="flatpickr-date">Hearing Day</label>
                          <input required type="text" class="form-control" id="date1" name="hearing_date"
                            class="form-control" value="{{ $probono->hearing_date }}" />
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="status">Category</label>
                          <select required id="status" name="category" class="form-select">
                            <option value="{{ $probono->category }}" selected> {{ $probono->category }} </option>
                            <option @if(old('category')=="Case Agaist RBA" ) selected @endif value="Case Agaist RBA">
                              Case Agaist RBA
                            </option>
                            <option @if(old('category')=="Legal Aid to General Public" ) selected @endif
                              value="Legal Aid to General Public">Legal Aid to General Public</option>
                            <option @if(old('category')=="Minors" ) selected @endif value="Minors">Minors</option>
                            <option @if(old('category')=="Supreme count" ) selected @endif value="Supreme count">Supreme
                              count
                            </option>
                            <option @if(old('category')=="Count" ) selected @endif value="count">Count</option>
                            <option @if(old('category')=="Prosecutor" ) selected @endif value="Prosecutor">Prosecutor
                            </option>
                            <option @if(old('category')=="Police" ) selected @endif value="Police">Police</option>
                            <option @if(old('category')=="Prison" ) selected @endif value="Prison">Prison</option>
                            <option @if(old('category')=="Other" ) selected @endif value="Other">Other</option>
                          </select>
                        </div>
                        <div class="col-12 col-md-6">
                          <label class="form-label" for="practicing">Referrel Name</label>
                          <input required type="text" name="referrel" class="form-control"
                            value="{{ $probono->referrel }}" />
                        </div>

                        <div class="col-12 text-center">
                          <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Add New Address Modal -->
              @endunless

            </td>
          </tr>
        </tbody>
        @php
        $count++
        @endphp

        @empty
        <tr>
          <td>
            No Probono Case Assigned
          </td>
        </tr>
        @endforelse

        </tbody>
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
<script>
  "use strict";
  $(function () {
    var dtt = document.querySelector("#date"),
      dte = document.querySelector("#end");
    dtt && dtt.flatpickr({
      enableTime: false,
      altInput: !0,
      altFormat: "F j, Y",
      dateFormat: "Y-m-d",
      minDate: 'today'
    })
    dte && dte.flatpickr({
      enableTime: !0,
      noCalendar: !0
    })
  })
  $(function () {
    var dtt1 = document.querySelector("#date1"),
      dte1 = document.querySelector("#end1");
    dtt1 && dtt1.flatpickr({
      enableTime: false,
      altInput: !0,
      altFormat: "F j, Y",
      dateFormat: "Y-m-d",
      minDate: 'today'
    })
    dte1 && dte1.flatpickr({
      enableTime: !0,
      noCalendar: !0
    })
  })

  $(document).ready(function () {
    $("#number").on("input", function () {
      var value = $(this).val();
      var decimalRegex = /^[0-9]+(\.[0-9]{1,2})?$/;
      if (!decimalRegex.test(value)) {
        $(this).val(value.substring(0, value.length - 1));
      }
    });
    $("#number_update").on("input", function () {
      var value = $(this).val();
      var decimalRegex = /^[0-9]+(\.[0-9]{1,2})?$/;
      if (!decimalRegex.test(value)) {
        $(this).val(value.substring(0, value.length - 1));
      }
    });
  });
</script>

@endsection