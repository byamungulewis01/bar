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
  @include('layouts.flash_message')
    <div class="card-datatable table-responsive">
      <table class="datatables-probono table border-top">
        <thead>
          <tr>
            <th>#</th>
            <th>Referrer</th>
            <th>Category</th>
            <th>Case Number</th>
            <th>Gender</th>
            <th>Nature</th>
            <th>Status</th>
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
        <td>{{ $count }}</td>
        <td>{{ $probono->referral_name }}</td>
        <td>{{ $probono->category }}</td>
        <td>{{ $probono->referral_case_no }}</td>
        <td>{{ $probono->referral_gender }}</td>
        <td>{{ $probono->case_nature }}</td>
        <td>
         @if ($probono->case_status == 'OPEN')
             <span class="badge bg-label-info me-2">{{ $probono->case_status }}</span>
         @else
         <span class="badge bg-label-danger me-2">{{ $probono->case_status }}</span>
         @endif
          
        </td>
        <td>{{ $probono->hearing_date }}</td>
        <td><a href="{{ route('probono.show',$probono->id) }}" class="btn btn-sm btn-info">( = )</button></td>
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
          <form accept="{{ route('probono.store') }}" class="row g-3" method="post"  enctype="multipart/form-data">
            @csrf

            <div class="col-12 col-md-6">
              <label class="form-label" for="name">First Name</label>
              <input required type="text" id="name" name="name" class="form-control" placeholder="John" value="{{ old('fname') }}"/>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="email">Last name</label>
              <input required type="text" name="lname" class="form-control" placeholder="doe"  value="{{ old('lname') }}"/>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="email">Referral Case No</label>
              <input required type="text" name="referral_case_no" class="form-control" placeholder="RC 0004B77/2022/TB/009"  value="{{ old('referralcaseno') }}"/>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="email">Referral Case No</label>
              <input required type="text" name="referral_case_no" class="form-control" placeholder="RC 0004B77/2022/TB/009"  value="{{ old('referralcaseno') }}"/>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="phone">Referral Phone Number</label>
              <div class="input-group">
                <span class="input-group-text">RW (+250)</span>
                <input required type="text" id="phone" name="referral_mobile" class="form-control phone-number-mask" maxLength="10" placeholder="xxx xxx xxxx"  value="{{ old('phone') }}"/>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="gender">Gender</label>
              <select required id="gender" name="referral_gender" class="form-select">
                <option value="" selected> - Select - </option>
                <option @if(old('referral_gender')=="Male") selected @endif value="Male">Male</option>
                <option @if(old('referral_gender')=="Male") selected @endif value="Female">Female</option>
              </select>
            </div>
         
           
            <div class="col-12 col-md-6">
              <label class="form-label" for="category">Case nature</label>
              <select required name="case_nature" class="form-select">
                <option value="" selected> - Select - </option>
                <option @if(old('nature')=="Criminal") selected @endif value="Criminal">Criminal</option>
                <option @if(old('nature')=="Civil") selected @endif value="Civil">Civil</option>
                <option @if(old('nature')=="Social") selected @endif value="Social">Social</option>
                <option @if(old('nature')=="Commercial") selected @endif value="Commercial">Commercial</option>
              </select>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="flatpickr-date">Hearing Day</label>
              <input required type="date" name="hearing_date" placeholder="Month DD, YYYY" class="form-control" />
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="status">Category</label>
              <select required id="status" name="category" class="form-select">
                <option value="" selected> - Select - </option>
                <option @if(old('category')=="Case Agaist RBA") selected @endif value="Case Agaist RBA">Case Agaist RBA</option>
                <option @if(old('category')=="Legal Aid to General Public") selected @endif value="Legal Aid to General Public">Legal Aid to General Public</option>
                <option @if(old('category')=="Minors") selected @endif value="Minors">Minors</option>
                <option @if(old('category')=="Supreme count") selected @endif value="Supreme count">Supreme count</option>
                <option @if(old('category')=="Count") selected @endif value="count">Count</option>
                <option @if(old('category')=="Prosecutor") selected @endif value="Prosecutor">Prosecutor</option>
                <option @if(old('category')=="Police") selected @endif value="Police">Police</option>
                <option @if(old('category')=="Prison") selected @endif value="Prison">Prison</option>
                <option @if(old('category')=="Other") selected @endif value="Other">Other</option>
              </select>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="practicing">Concerned</label>
              <select required name="user" class="form-select">
                <option value="" disabled selected> - Select - </option>
                @foreach ($users as $user)
                <option @if(old('user')=="{{ $user->name }}") selected @endif value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach

              </select>
            </div>
            
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
              <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
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
