@extends('layouts.app')

@section('page_name')
Pro Bono Cases
@endsection

@section('contents')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

  <!-- Users List Table -->
  <div class="card">
    <div class="card-header border-bottom">
      <h5 class="card-title mb-0">Pro Bono Cases
        <a class="btn btn-dark text-white pull-left float-end" data-bs-toggle="modal" data-bs-target="#newCase"><i
            class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">New case</span></a><a
          class="d-none" id="edit" data-bs-toggle="modal" data-bs-target="#editmeetings"></a></h5>

    </div>
   
    <div class="card-datatable table-responsive">
      <table class="datatables-probono table border-top">
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
              @if ($probono->status == 'OPEN')
              <span class="badge bg-label-info me-2">{{ $probono->status }}</span>
              @else
              <span class="badge bg-label-danger me-2">{{ $probono->status }}</span>
              @endif

            </td>
            <td>
              {{ \Carbon\Carbon::parse($probono->hearing_date)->locale('fr')->format('F j, Y') }}
            </td>
            <td><a href="javascript:" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                data-bs-target="#addNewAddress{{ $probono->id }}">Edit </a>
              <!-- Add New Address Modal -->
              <div class="modal fade" id="addNewAddress{{ $probono->id }}" tabindex="-1" aria-hidden="true">
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
                      <form action="{{ route('probono.update') }}" class="row g-3" method="post">
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
                              name="phone" class="form-control phone-number-mask" minlength="10" maxLength="10"
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
                          <input required type="text" class="form-control" id="date" name="hearing_date"
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
                        <div class="col-12 col-md-12">
                          <label class="form-label" for="status">Advocate</label>
                          <select required name="advocate" class="form-select">
                            <option value="">No Advocate Assigned</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}"  @if ($user->id == $probono->advocate) selected @endif> {{ $user->name }} </option>           
                            @endforeach
                         
                          </select>
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
            </td>
          </tr>
          <tr>
            <td>
              <i class="menu-icon tf-icons ti ti-gavel"></i>
            </td>
            <td colspan="6">
              <h6 class="text-warning">
                You can upload defferent documents regarding this case for advocate
              </h6>
            </td>
            <td>
              <a href="javascript:" data-bs-toggle="modal" data-bs-target="#addNewCCModal{{ $probono->id }}"
                class="btn btn-info btn-sm">Upload </a>
              <!-- Add New Credit Card Modal -->
              <div class="modal fade" id="addNewCCModal{{ $probono->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-md modal-simple modal-add-new-cc">
                  <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      <div class="text-center mb-4">
                        <h3 class="mb-2">Upload Document Related to RC</h3>
                        <p class="text-muted">{{ $probono->referral_case_no }}</p>

                      </div>
                      <form class="row g-3" method="POST" action="{{ route('probono.file_store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="probono_id" value="{{ $probono->id }}">
                        <div class="col-12">
                          <label class="form-label w-100" for="title">File title</label>
                          <div class="input-group input-group-merge">
                            <input id="title" name="case_title" class="form-control" type="text"
                              placeholder="File title" value="{{ old('case_title') }}" />
                            @error('case_title')<span class="text-danger">
                              {{ $message }}
                            </span>@enderror
                          </div>
                        </div>
                        <div class="col-12">
                          <label class="form-label w-100" for="type">File Type</label>
                          <div class="input-group input-group-merge">
                            <select required name="case_type" class="form-select">
                              <option value="" selected> - Select - </option>
                              <option @if(old('case_type')=="Letter" ) selected @endif value="Letter">Letter</option>
                              <option @if(old('case_type')=="Assignation" ) selected @endif value="Assignation">
                                Assignation</option>
                              <option @if(old('case_type')=="Imyanzuro" ) selected @endif value="Imyanzuro">Imyanzuro
                              </option>
                              <option @if(old('case_type')=="Icyemezo" ) selected @endif value="Icyemezo">Icyemezo
                              </option>
                              <option @if(old('case_type')=="Evidances" ) selected @endif value="Evidances">Evidances
                              </option>
                              <option @if(old('case_type')=="Other" ) selected @endif value="Other">Other</option>
                            </select>
                            @error('case_type')<span class="text-danger">
                              {{ $message }}
                            </span>@enderror
                          </div>
                        </div>
                        <div class="col-12">
                          <label class="form-label w-100" for="title">Case File</label>
                          <div class="input-group input-group-merge">
                            <input accept=".pdf" name="case_file" class="form-control" type="file" />
                            @error('case_file')<span class="text-danger">
                              {{ $message }}
                            </span>@enderror
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
              <!--/ Add New Credit Card Modal -->
            </td>
          </tr>
          <tr>
            <td>
              <i class="menu-icon tf-icons ti ti-gavel"></i>
            </td>
            <td colspan="7">
              @if ($probono->advocate == NULL)
              <h6 class="text-danger">
                Please assign this case to an advocate via Edit
              </h6>
              @else
              <h6 class="text-primary">
                Case assigned to <a href="{{ route('profile',$probono->advocate) }}" class="text-dark">{{ $probono->user->name }}</a>
                <a href="javascript:" class="btn btn-dark btn-sm"> Notify </a>
              </h6>
              @endif

            </td>

          </tr>
          
        </tbody>

        @php
        $count++
        @endphp
        @empty

        @endforelse

      </table>
    </div>
  </div>

</div>


<!-- New User Modal -->
<div class="modal fade" id="newCase" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-simple modal-edit-user">
    <div class="modal-content p-3 p-md-5">
      <div class="modal-body">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="text-center mb-4">
          <h3 class="mb-2">New Probono Case</h3>

        </div>
        <form accept="{{ route('probono.store') }}" class="row g-3" method="post" enctype="multipart/form-data">
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
              <input required type="text" pattern="[0-9]{10,}" title="Phone must have at least 10 Digits" name="phone"
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
              <input required type="text" id="phone" name="court" class="form-control phone-number-mask"
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
              placeholder="Month DD, YYYY H:i" class="form-control" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="status">Category</label>
            <select required id="status" name="category" class="form-select">
              <option value="" selected> - Select - </option>
              <option @if(old('category')=="Case Agaist RBA" ) selected @endif value="Case Agaist RBA">Case Agaist RBA
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
          <div class="col-12 col-md-12">
            <div class="form-check">
              <input class="form-check-input" name="status" type="checkbox" value="1" id="defaultCheck2" />
              <label class="form-check-label" for="defaultCheck2">
                Auto Assign to Advocate ? (Uncheck if "NO")
              </label>
            </div>
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
<!--/ New User Modal -->
<!-- / Content -->

@endsection


@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />

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
<script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<script>


  "use strict";
  $(function () {
    var dtt = document.querySelector("#date"),
      dte = document.querySelector("#end");
    dtt && dtt.flatpickr({
      enableTime: !0,
      altInput: !0,
      altFormat: "F j, Y H:i",
      dateFormat: "Y-m-d H:i",
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
      enableTime: !0,
      altInput: !0,
      altFormat: "F j, Y H:i",
      dateFormat: "Y-m-d H:i",
      minDate: 'today'
    })
    dte1 && dte1.flatpickr({
      enableTime: !0,
      noCalendar: !0
    })
  })

  $(document).ready(function () {
    $("#credit").on("input", function () {
      var value = $(this).val();
      var decimalRegex = /^[0-9.]+(\.[0-9]{1,2})?$/;
      if (!decimalRegex.test(value)) {
        $(this).val(value.substring(0, value.length - 1));
      }
    });
    $("#credit1").on("input", function () {
      var value = $(this).val();
      var decimalRegex = /^[0-9.]+(\.[0-9]{1,2})?$/;
      if (!decimalRegex.test(value)) {
        $(this).val(value.substring(0, value.length - 1));
      }
    });
  });
</script>

@endsection
