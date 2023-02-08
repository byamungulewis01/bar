@extends('layouts.app')

@section('page_name')
Users
@endsection

@section('contents')
<!-- Content -->
        
<div class="container-xxl flex-grow-1 container-p-y">
            
            

            <div class="row g-4 mb-4">
              <div class="col-sm-6 col-xl-2">
                <div class="card">
                  <div class="card-body">
                    <div  class="d-flex align-items-start justify-content-between">
                      <div class="content-left">
                        <span>Total </span>
                        <div class="d-flex align-items-center my-1">
                          <h4 class="mb-0 me-2">{{ $allUsers }}</h4>
                        </div>
                      </div>
                      <span class="badge bg-label-info rounded p-2">
                        <i class="ti ti-users ti-sm"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-2">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                      <a href="{{ route('activepage') }}">
                      <div class="content-left">
                        <span>Active </span>
                        <div class="d-flex align-items-center my-1">
                        
                            <h4 class="mb-0 me-2">{{ $activeUsers }}</h4>   
                        </div>
                      </a>
                      </div>
                      <span class="badge bg-label-success rounded p-2">
                        <i class="ti ti-user-check ti-sm"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-2">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                      <a href="{{ route('inactivepage') }}">
                      <div class="content-left">
                        <span>Inactive </span>
                        <div class="d-flex align-items-center my-1">
                          <h4 class="mb-0 me-2">{{ $inactiveUsers }}</h4>
                        </div>
                      </div>
                      </a>
                      <span class="badge bg-label-primary rounded p-2">
                        <i class="ti ti-user-minus ti-sm"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-2">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                      <a href="{{ route('suspendedpage') }}">
                      <div class="content-left">
                        <span>Suspended&nbsp;</span>
                        <div class="d-flex align-items-center my-1">
                          <h4 class="mb-0 me-2">{{ $suspendedUsers }}</h4>
                        </div>
                      </div>
                      </a>
                      <span class="badge bg-label-warning rounded p-2">
                        <i class="ti ti-user-exclamation ti-sm"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-2">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                      <a href="{{ route('struckOffpage') }}">
                      <div class="content-left">
                        <span>Struck&nbsp;Off&nbsp;</span>
                        <div class="d-flex align-items-center my-1">
                          <h4 class="mb-0 me-2">{{ $struckoffUsers }}</h4>
                        </div>
                      </div>
                      </a>
                      <span class="badge bg-label-danger rounded p-2">
                        <i class="ti ti-user-x ti-sm"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-xl-2">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                      <a href="{{ route('deseacedpage') }}">
                      <div class="content-left">
                        <span>Deseaced&nbsp;</span>
                        <div class="d-flex align-items-center my-1">
                          <h4 class="mb-0 me-2">{{ $deseacedUsers }}</h4>
                        </div>
                      </div>
                      </a>
                      <span class="badge bg-label-secondary rounded p-2">
                        <i class="ti ti-user-off ti-sm"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Users List Table -->
            <div class="card">
              <div class="card-header border-bottom">
                <h5 class="card-title mb-0">Users <a class="btn btn-dark text-white pull-left float-end" data-bs-toggle="modal" data-bs-target="#newUser"><i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add New User</span></a><a class="d-none" id="edit" data-bs-toggle="modal" data-bs-target="#editUser"></a>
                  {{-- <a class="btn btn-info text-white pull-left float-end"><span class="d-none d-sm-inline-block">Excel Expo</span></a> &nbsp; &nbsp; --}}
                </h5>
                
              </div>
              <div class="card-datatable table-responsive">
                <table class="datatables-users table border-top">
                  <thead>
                    <tr>
                      <th></th>
                      <th>User</th>
                      <th>Roll Number</th>
                      <th>Phone</th>
                      <th>District</th>
                      <th>Gender</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>

            <!-- New User Modal -->
            <div class="modal fade" id="newUser" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                <div class="modal-content p-3 p-md-5">
                  <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                      <h3 class="mb-2">New User Information</h3>
                      @if($errors->any())
                      <div class="alert alert-danger">
                        <p><strong>Opps Something went wrong</strong></p>
                        <ul>
                        @foreach ($errors->all() as $error)
                          <li>* {{ $error }}</li>
                        @endforeach
                        </ul>
                      </div>
                        @endif
                    </div>
                    <form id="newUserForm" class="row g-3" method="post"  enctype="multipart/form-data">
                      @csrf
                      <div class="col-12 col-md-6">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                          <img src="{{ asset('assets/img/avatars/placeholder.jpg') }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                          <div class="button-wrapper">
                            <label for="uploadAvatar" class="btn btn-sm btn-primary me-2 mb-3" tabindex="0">
                              <i class="ti ti-upload"></i>
                              <input type="file" id="uploadAvatar" name="profile" class="user-avatar-input" hidden accept="image/png, image/jpeg" />
                            </label>
                            <button type="button" class="btn btn-sm btn-label-secondary user-avatar-reset mb-3 waves-effect">
                              <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                              <span class="d-none d-sm-block">Reset</span>
                            </button>
                            <div class="text-muted">Profile Picture</div>
                            <div class="text-muted d-none">Allowed JPG, GIF or PNG. Max size of 800K</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                          <img src="{{ asset('assets/img/avatars/diploma.jpg') }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedDiploma" />
                          <div class="button-wrapper">
                            <label for="uploadDiploma" class="btn btn-sm  btn-primary me-2 mb-3" tabindex="0">
                              <i class="ti ti-upload"></i>
                              <input type="file" id="uploadDiploma" name="diploma" class="user-diploma-input" hidden accept="image/png, image/jpeg" />
                            </label>
                            <button type="button" class="btn btn-sm btn-label-secondary user-diploma-reset mb-3 waves-effect">
                              <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                              <span class="d-none d-sm-block">Reset</span>
                            </button>
                            <div class="text-muted">Diploma</div>
                            <div class="text-muted d-none">Allowed JPG, GIF or PNG. Max size of 800K</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="name">Full Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="John" value="{{ old('name') }}"/>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="example@domain.com"  value="{{ old('email') }}"/>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="phone">Phone Number</label>
                        <div class="input-group">
                          <span class="input-group-text">RW (+250)</span>
                          <input type="text" id="phone" name="phone" class="form-control phone-number-mask" maxLength="10" placeholder="xxx xxx xxxx"  value="{{ old('phone') }}"/>
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="gender">Gender</label>
                        <select id="gender" name="gender" class="form-select">
                          <option value="" selected> - Select - </option>
                          <option @if(old('gender')=="Male") selected @endif value="Male">Male</option>
                          <option @if(old('gender')=="Male") selected @endif value="Female">Female</option>
                        </select>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="marital">Martial Status</label>
                        <select id="marital" name="marital" class="form-select">
                          <option value="">Select</option>
                          @foreach($marital as $status)
                          <option @if(old('marital')==$status->id) selected @endif value="{{ $status->id }}">{{ $status->title }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="country">District</label>
                        <select id="country" name="district" class="select2 form-select" data-allow-clear="true">
                          <option value="">Select</option>
                          <option value="Bugesera" @if(old('district')=="Bugesera") selected @endif>Bugesera</option>
                          <option value="Burera" @if(old('district')=="Burera") selected @endif>Burera</option>
                          <option value="Gakenke" @if(old('district')=="Gakenke") selected @endif>Gakenke</option>
                          <option value="Gasabo" @if(old('district')=="Gasabo") selected @endif>Gasabo</option>
                          <option value="Gatsibo" @if(old('district')=="Gatsibo") selected @endif>Gatsibo</option>
                          <option value="Gicumbi" @if(old('district')=="Gicumbi") selected @endif>Gicumbi</option>
                          <option value="Gisagara" @if(old('district')=="Gisagara") selected @endif>Gisagara</option>
                          <option value="Huye" @if(old('district')=="Huye") selected @endif>Huye</option>
                          <option value="Kamonyi" @if(old('district')=="Kamonyi") selected @endif>Kamonyi</option>
                          <option value="Karongi" @if(old('district')=="Karongi") selected @endif>Karongi</option>
                          <option value="Kayonza" @if(old('district')=="Kayonza") selected @endif>Kayonza</option>
                          <option value="Kicukiro" @if(old('district')=="Kicukiro") selected @endif>Kicukiro</option>
                          <option value="Kirehe" @if(old('district')=="Kirehe") selected @endif>Kirehe</option>
                          <option value="Muhanga" @if(old('district')=="Muhanga") selected @endif>Muhanga</option>
                          <option value="Musanze" @if(old('district')=="Musanze") selected @endif>Musanze</option>
                          <option value="Ngoma" @if(old('district')=="Ngoma") selected @endif>Ngoma</option>
                          <option value="Ngororero" @if(old('district')=="Ngororero") selected @endif>Ngororero</option>
                          <option value="Nyabihu" @if(old('district')=="Nyabihu") selected @endif>Nyabihu</option>
                          <option value="Nyagatare" @if(old('district')=="Nyagatare") selected @endif>Nyagatare</option>
                          <option value="Nyamagabe" @if(old('district')=="Nyamagabe") selected @endif>Nyamagabe</option>
                          <option value="Nyamasheke" @if(old('district')=="Nyamasheke") selected @endif>Nyamasheke</option>
                          <option value="Nyanza" @if(old('district')=="Nyanza") selected @endif>Nyanza</option>
                          <option value="Nyarugenge" @if(old('district')=="Nyarugenge") selected @endif>Nyarugenge</option>
                          <option value="Nyaruguru" @if(old('district')=="Nyaruguru") selected @endif>Nyaruguru</option>
                          <option value="Rubavu" @if(old('district')=="Rubavu") selected @endif>Rubavu</option>
                          <option value="Ruhango" @if(old('district')=="Ruhango") selected @endif>Ruhango</option>
                          <option value="Rulindo" @if(old('district')=="Rulindo") selected @endif>Rulindo</option>
                          <option value="Rusizi" @if(old('district')=="Rusizi") selected @endif>Rusizi</option>
                          <option value="Rutsiro" @if(old('district')=="Rutsiro") selected @endif>Rutsiro</option>
                          <option value="Rwamagana" @if(old('district')=="Rwamagana") selected @endif>Rwamagana</option>
                        </select>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="category">User Category</label>
                        <select id="category" name="category" class="form-select">
                          <option value="" selected> - Select - </option>
                          <option @if(old('category')=="Advocate") selected @endif value="Advocate">Advocate</option>
                          <option @if(old('category')=="Staff") selected @endif value="Staff">Staff</option>
                        </select>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="flatpickr-date">Admission Date</label>
                        <input type="text" id="flatpickr-date" name="date" placeholder="Month DD, YYYY" class="form-control" />
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="status">Admission Status</label>
                        <select id="status" name="status" class="form-select">
                          <option value="" selected> - Select - </option>
                          <option @if(old('status')=="1") selected @endif value="1">Advocate</option>
                          <option @if(old('status')=="2") selected @endif value="2">Intern Advocate</option>
                          <option @if(old('status')=="3") selected @endif value="3">Support Staff</option>
                          <option @if(old('status')=="4") selected @endif value="4">Technical Staff</option>
                        </select>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="practicing">Practicing</label>
                        <select id="practicing" name="practicing" class="form-select">
                          <option value="" selected> - Select - </option>
                          <option @if(old('practicing')=="2") selected @endif value="2">Active</option>
                          <option @if(old('practicing')=="3") selected @endif value="3">Inactive</option>
                          <option @if(old('practicing')=="4") selected @endif value="4">Suspended</option>
                          <option @if(old('practicing')=="5") selected @endif value="5">Struck Off</option>
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

            <!-- Edit User Modal -->
            <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                <div class="modal-content p-3 p-md-5">
                  <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                      <h3 class="mb-2">Update User Information</h3>
                    </div>
                    <form id="editUserForm" class="row g-3 needs-validation @if($errors->any()) validated @endif" novalidate="" method="post"  enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <input type="hidden" id="is" name="express"/>
                      <div class="col-12 col-md-6">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                          <img src="{{ asset('assets/img/avatars/placeholder.jpg') }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="updatedAvatar" />
                          <div class="button-wrapper">
                            <label for="updateAvatar" class="btn btn-sm btn-primary me-2 mb-3" tabindex="0">
                              <i class="ti ti-upload"></i>
                              <input type="file" id="updateAvatar" name="profile" class="user-avatar-updated" hidden accept="image/png, image/jpeg" />
                            </label>
                            <button type="button" class="btn btn-sm btn-label-secondary updated-avatar-reset mb-3 waves-effect">
                              <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                              <span class="d-none d-sm-block">Reset</span>
                            </button>
                            <div class="text-muted">Profile Picture</div>
                            <div class="text-muted d-none">Allowed JPG, GIF or PNG. Max size of 800K</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                          <img src="{{ asset('assets/img/avatars/diploma.jpg') }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="updatedDiploma" />
                          <div class="button-wrapper">
                            <label for="updateDiploma" class="btn btn-sm  btn-primary me-2 mb-3" tabindex="0">
                              <i class="ti ti-upload"></i>
                              <input type="file" id="updateDiploma" name="diploma" class="user-diploma-updated" hidden accept="image/png, image/jpeg" />
                            </label>
                            <button type="button" class="btn btn-sm btn-label-secondary updated-diploma-reset mb-3 waves-effect">
                              <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                              <span class="d-none d-sm-block">Reset</span>
                            </button>
                            <div class="text-muted">Diploma</div>
                            <div class="text-muted d-none">Allowed JPG, GIF or PNG. Max size of 800K</div>
                          </div>
                        </div>
                      </div>

                      <div class="col-12 col-md-6">
                        <label class="form-label" for="updateName">Full Name</label>
                        <input type="text" id="updateName" name="name" class="form-control" placeholder="John" value="{{ old('name') }}"/>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="updateEmail">Email</label>
                        <input type="text" id="updateEmail" name="email" class="form-control" placeholder="example@domain.com"  value="{{ old('email') }}"/>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="updatePhone">Phone Number</label>
                        <div class="input-group">
                          <span class="input-group-text">RW (+250)</span>
                          <input type="text" id="updatePhone" name="phone" class="form-control phone-number-mask" maxLength="10" placeholder="xxx xxx xxxx"  value="{{ old('phone') }}"/>
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="updateGender">Gender</label>
                        <select id="updateGender" name="gender" class="form-select">
                          <option value="" selected> - Select - </option>
                          <option @if(old('gender')=="Male") selected @endif value="Male">Male</option>
                          <option @if(old('gender')=="Male") selected @endif value="Female">Female</option>
                        </select>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="updateMarital">Martial Status</label>
                        <select id="updateMarital" name="marital" class="form-select">
                          <option value="">Select</option>
                          @foreach($marital as $status)
                          <option @if(old('marital')==$status->id) selected @endif value="{{ $status->id }}">{{ $status->title }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="updateDistrict">District</label>
                        <select id="updateDistrict" name="district" class="select2 form-select" data-allow-clear="true">
                          <option value="">Select</option>
                          <option value="Bugesera" @if(old('district')=="Bugesera") selected @endif>Bugesera</option>
                          <option value="Burera" @if(old('district')=="Burera") selected @endif>Burera</option>
                          <option value="Gakenke" @if(old('district')=="Gakenke") selected @endif>Gakenke</option>
                          <option value="Gasabo" @if(old('district')=="Gasabo") selected @endif>Gasabo</option>
                          <option value="Gatsibo" @if(old('district')=="Gatsibo") selected @endif>Gatsibo</option>
                          <option value="Gicumbi" @if(old('district')=="Gicumbi") selected @endif>Gicumbi</option>
                          <option value="Gisagara" @if(old('district')=="Gisagara") selected @endif>Gisagara</option>
                          <option value="Huye" @if(old('district')=="Huye") selected @endif>Huye</option>
                          <option value="Kamonyi" @if(old('district')=="Kamonyi") selected @endif>Kamonyi</option>
                          <option value="Karongi" @if(old('district')=="Karongi") selected @endif>Karongi</option>
                          <option value="Kayonza" @if(old('district')=="Kayonza") selected @endif>Kayonza</option>
                          <option value="Kicukiro" @if(old('district')=="Kicukiro") selected @endif>Kicukiro</option>
                          <option value="Kirehe" @if(old('district')=="Kirehe") selected @endif>Kirehe</option>
                          <option value="Muhanga" @if(old('district')=="Muhanga") selected @endif>Muhanga</option>
                          <option value="Musanze" @if(old('district')=="Musanze") selected @endif>Musanze</option>
                          <option value="Ngoma" @if(old('district')=="Ngoma") selected @endif>Ngoma</option>
                          <option value="Ngororero" @if(old('district')=="Ngororero") selected @endif>Ngororero</option>
                          <option value="Nyabihu" @if(old('district')=="Nyabihu") selected @endif>Nyabihu</option>
                          <option value="Nyagatare" @if(old('district')=="Nyagatare") selected @endif>Nyagatare</option>
                          <option value="Nyamagabe" @if(old('district')=="Nyamagabe") selected @endif>Nyamagabe</option>
                          <option value="Nyamasheke" @if(old('district')=="Nyamasheke") selected @endif>Nyamasheke</option>
                          <option value="Nyanza" @if(old('district')=="Nyanza") selected @endif>Nyanza</option>
                          <option value="Nyarugenge" @if(old('district')=="Nyarugenge") selected @endif>Nyarugenge</option>
                          <option value="Nyaruguru" @if(old('district')=="Nyaruguru") selected @endif>Nyaruguru</option>
                          <option value="Rubavu" @if(old('district')=="Rubavu") selected @endif>Rubavu</option>
                          <option value="Ruhango" @if(old('district')=="Ruhango") selected @endif>Ruhango</option>
                          <option value="Rulindo" @if(old('district')=="Rulindo") selected @endif>Rulindo</option>
                          <option value="Rusizi" @if(old('district')=="Rusizi") selected @endif>Rusizi</option>
                          <option value="Rutsiro" @if(old('district')=="Rutsiro") selected @endif>Rutsiro</option>
                          <option value="Rwamagana" @if(old('district')=="Rwamagana") selected @endif>Rwamagana</option>
                        </select>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="updateStatus">User Category</label>
                        <select id="updateStatus" name="category" class="form-select">
                          <option value="" selected> - Select - </option>
                          <option @if(old('status')=="Advocate") selected @endif value="Advocate">Advocate</option>
                          <option @if(old('status')=="Staff") selected @endif value="Staff">Staff</option>
                        </select>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="flatpickr-date-up">Admission Date</label>
                        <input type="text" id="flatpickr-date-up" name="date" placeholder="Month DD, YYYY" class="form-control" />
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="updateCategory">Admission Status</label>
                        <select id="updateCategory" name="status" class="form-select">
                          <option value="" selected> - Select - </option>
                          <option @if(old('category')=="1") selected @endif value="1">Advocate</option>
                          <option @if(old('category')=="2") selected @endif value="2">Intern Advocate</option>
                          <option @if(old('category')=="3") selected @endif value="3">Support Staff</option>
                          <option @if(old('category')=="4") selected @endif value="4">Technical Staff</option>
                        </select>
                      </div>
                      <div class="col-12 col-md-6">
                        <label class="form-label" for="updatePracticing">Practicing</label>
                        <select id="updatePracticing" name="practicing" class="form-select">
                          <option value="" selected> - Select - </option>
                          <option @if(old('practicing')=="2") selected @endif value="2">Active</option>
                          <option @if(old('practicing')=="3") selected @endif value="3">Inactive</option>
                          <option @if(old('practicing')=="4") selected @endif value="4">Suspended</option>
                          <option @if(old('practicing')=="5") selected @endif value="5">Struck Off</option>
                        </select>
                      </div>
                      <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Update</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!--/ Edit User Modal -->

                      </div>
                      <!-- / Content -->
            
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
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
<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>

<script>

"use strict";
$(function(){
    var dtt=document.querySelector("#flatpickr-date"),dtu=document.querySelector("#flatpickr-date-up");
    dtt&&dtt.flatpickr({altInput:!0,altFormat:"F j, Y",dateFormat:"Y-m-d", maxDate: 'today'}),
    dtu&dtu.flatpickr({altInput:!0,altFormat:"F j, Y",dateFormat:"Y-m-d", maxDate: 'today'})
    let t,a,s;
    s=(isDarkStyle?(t=config.colors_dark.borderColor,a=config.colors_dark.bodyBg,config.colors_dark):(t=config.colors.borderColor,a=config.colors.bodyBg,config.colors)).headingColor;
    var e,n=$(".datatables-users"),i=$(".select3"),r="/profile/",o={
        1:{
            title:"n/a",
            class:"bg-label-info"
        },
        2:{
            title:"Active",
            class:"bg-label-success"
        },
        3:{
            title:"Inactive",
            class:"bg-label-primary"
        },
        4:{
            title:"Suspended",
            class:"bg-label-warning"
        },
        5:{
            title:"Struck Off",
            class:"bg-label-danger"
        },
        6:{
            title:"Deceased",
            class:"bg-label-secondary"
        }
    };
    i.length&&(i=i).wrap('<div class="position-relative"></div>').select2({
        placeholder:"Select District",
        dropdownParent:i.parent()
    }),
    n.length&&(e=n.DataTable({
        ajax:"/api/users/individual",
        columns:[
            {data:""},
            {data:"name"},
            {data:"regNumber"},
            {data:"phone"},
            {data:"district"},
            {data:"gender"},
            {data:"practicing"},
            {data:"action"}
        ],
        columnDefs:[
            {
                className:"control",
                searchable:!1,
                orderable:!1,
                responsivePriority:2,
                targets:0,
                render:function(e,t,a,s){
                    return""
                }
            },
            {
                targets:1,
                responsivePriority:4,
                render:function(e,t,a,s){
                    var n=a.name, i=a.email, o=a.photo, j=a.id;
                    return'<div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar avatar-sm me-3">'+(o?'<img src="'+assetsPath+"img/avatars/"+o+'" alt="Avatar" class="rounded-circle">':'<span class="avatar-initial rounded-circle bg-label-'+["success","danger","warning","info","primary","secondary"][Math.floor(6*Math.random())]+'">'+(o=(((o=(n=a.name).match(/\b\w/g)||[]).shift()||"")+(o.pop()||"")).toUpperCase())+"</span>")+'</div></div><div class="d-flex flex-column"><a href="'+r+j+'" class="text-body text-truncate"><span class="fw-semibold">'+n+'</span></a><small class="text-muted">'+i+"</small></div></div>"
                }
            },
            {
                targets:3,
                render:function(e,t,a,s){
                    a=a.phone;
                    return'<span class="fw-semibold">'+a[0].phone+"</span>"
                    }
                },
                {
                    targets:4,
                    render:function(e,t,a,s){
                        return'<span class="fw-semibold">'+a.district+"</span>"
                    }
                },
                {
                    targets:6,
                    render:function(e,t,a,s){
                        a=a.practicing;
                        return'<span class="badge '+o[a].class+'" text-capitalized>'+o[a].title+"</span>"
                    }
                },
                {
                    targets:-1,
                    title:"Actions",
                    searchable:!1,
                    orderable:!1,
                    render:function(e,t,a,s){
                        return'<div class="d-flex align-items-center"><a href="javascript:;" class="text-body edit-record "><i class="ti ti-edit ti-sm me-2" data-id="'+a.id+'" data-name="'+a.name+'" data-photo="'+a.photo+'" data-diplome="'+a.diplome+'" data-phone="'+a.phone[0].phone+'" data-email="'+a.email+'" data-district="'+a.district+'" data-gender="'+a.gender+'" data-marital="'+a.marital+'" data-regNumber="'+a.regNumber+'" data-status="'+a.status+'" data-practicing="'+a.practicing+'" data-category="'+a.category+'"  data-date="'+a.date+'"></i></a><a href="'+r+a.id+'" class="text-body"><i class="ti ti-eye ti-sm mx-2"></i></a><a href="javascript:;" class="text-body delete-record '+a.id+'"><i class="ti ti-trash ti-sm mx-2"></i></a></div></div>'
                    }
                }
            ],
            order:[
                [1,"desc"]
            ],
            dom:'<"row me-2"<"col-md-2"<"me-3"l>><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            language:{
                sLengthMenu:"_MENU_",
                search:"",
                searchPlaceholder:"Search.."
            },
            buttons:[
                {
                    extend:"collection",
                    className:"btn btn-label-secondary dropdown-toggle mx-3",
                    text:'<i class="ti ti-screen-share me-1 ti-xs"></i>Export',
                    buttons:[
                        {
                            extend:"print",
                            text:'<i class="ti ti-printer me-2" ></i>Print',
                            className:"dropdown-item",
                            exportOptions:{
                                columns:[1,2,3,4,5],
                                format:{
                                    body:function(e,t,a){
                                        var s;
                                        return e.length<=0?e:(e=$.parseHTML(e),s="",$.each(e,function(e,t){
                                            void 0!==t.classList&&t.classList.contains("user-name")?s+=t.lastChild.firstChild.textContent:void 0===t.innerText?s+=t.textContent:s+=t.innerText
                                        }),s)
                                    }
                                }
                            },
                            customize:function(e){
                                $(e.document.body).css("color",s)
                                .css("border-color",t)
                                .css("background-color",a),
                                $(e.document.body).find("table").addClass("compact")
                                .css("color","inherit")
                                .css("border-color","inherit")
                                .css("background-color","inherit")
                            }
                        },
                        {
                            extend:"csv",
                            text:'<i class="ti ti-file-text me-2" ></i>Csv',
                            className:"dropdown-item",
                            exportOptions:{
                                columns:[1,2,3,4,5],
                                format:{
                                    body:function(e,t,a){
                                        var s;
                                        return e.length<=0?e:(e=$.parseHTML(e),s="",
                                        $.each(e,function(e,t){
                                            void 0!==t.classList&&t.classList.contains("user-name")?s+=t.lastChild.firstChild.textContent:void 0===t.innerText?s+=t.textContent:s+=t.innerText
                                        }),s)
                                    }
                                }
                            }
                        },
                        {
                            extend:"excel",
                            text:'<i class="ti ti-file-spreadsheet me-2"></i>Excel',
                            className:"dropdown-item",
                            exportOptions:{
                                columns:[1,2,3,4,5],
                                format:{
                                    body:function(e,t,a){
                                        var s;
                                        return e.length<=0?e:(e=$.parseHTML(e),
                                        s="",
                                        $.each(e,function(e,t){
                                            void 0!==t.classList&&t.classList.contains("user-name")?s+=t.lastChild.firstChild.textContent:void 0===t.innerText?s+=t.textContent:s+=t.innerText
                                        }),s)
                                    }
                                }
                            }
                        },
                        {
                            extend:"pdf",
                            text:'<i class="ti ti-file-code-2 me-2"></i>Pdf',
                            className:"dropdown-item",
                            exportOptions:{
                                columns:[1,2,3,4,5],
                                format:{
                                    body:function(e,t,a){
                                        var s;
                                        return e.length<=0?e:(e=$.parseHTML(e),
                                        s="",
                                        $.each(e,function(e,t){
                                            void 0!==t.classList&&t.classList.contains("user-name")?s+=t.lastChild.firstChild.textContent:void 0===t.innerText?s+=t.textContent:s+=t.innerText}),s)
                                        }
                                    }
                                }
                            },
                            {
                                extend:"copy",
                                text:'<i class="ti ti-copy me-2" ></i>Copy',
                                className:"dropdown-item",
                                exportOptions:{
                                    columns:[1,2,3,4,5],
                                    format:{
                                        body:function(e,t,a){
                                            var s;
                                            return e.length<=0?e:(e=$.parseHTML(e),
                                            s="",
                                            $.each(e,function(e,t){
                                                void 0!==t.classList&&t.classList.contains("user-name")?s+=t.lastChild.firstChild.textContent:void 0===t.innerText?s+=t.textContent:s+=t.innerText
                                            }),s)
                                        }
                                    }
                                }
                            }
                        ]
                    },
                    
                ],
                // responsive:{
                //     details:{
                //         display:$.fn.dataTable.Responsive.display.modal({
                //             header:function(e){
                //                 return"Details of "+e.data().name
                //             }
                //         }),
                //         type:"column",
                //         renderer:function(e,t,a){
                //             a=$.map(a,function(e,t){
                //                 return""!==e.title?'<tr data-dt-row="'+e.rowIndex+'" data-dt-column="'+e.columnIndex+'"><td>'+e.title+":</td> <td>"+e.data+"</td></tr>":""
                //             }).join("");
                //             return!!a&&$('<table class="table"/><tbody />').append(a)
                //         }
                //     }
                // },
                initComplete:function(){
                  this.api().columns(2).every(function(){
                    var t=this,
                    a=$('<select id="UserRole" class="form-select text-capitalize"><option value=""> Select Role </option></select>').appendTo(".user_role")
                    .on("change",function(){
                        var e=$.fn.dataTable.util.escapeRegex($(this).val());
                        t.search(e?"^"+e+"$":"",!0,!1).draw()
                    });
                    t.data().unique().sort().each(function(e,t){
                        a.append('<option value="'+e+'">'+e+"</option>")
                    })
                  }),
                  this.api().columns(3).every(function(){
                      var t=this,
                      a=$('<select id="UserPlan" class="form-select text-capitalize"><option value=""> Select Plan </option></select>').appendTo(".user_plan")
                      .on("change",function(){
                          var e=$.fn.dataTable.util.escapeRegex($(this).val());
                          t.search(e?"^"+e+"$":"",!0,!1).draw()
                      });
                      t.data().unique().sort().each(function(e,t){
                          a.append('<option value="'+e+'">'+e+"</option>")
                      })
                  }),
                  this.api().columns(5).every(function(){
                      var t=this,a=$('<select id="FilterTransaction" class="form-select text-capitalize"><option value=""> Select Status </option></select>').appendTo(".user_status")
                      .on("change",function(){
                          var e=$.fn.dataTable.util.escapeRegex($(this).val());
                          t.search(e?"^"+e+"$":"",!0,!1).draw()
                      });
                      t.data().unique().sort().each(function(e,t){
                          a.append('<option value="'+o[e].title+'" class="text-capitalize">'+o[e].title+"</option>")
                      })
                  })
                }
        })),
        $(".datatables-users tbody").on("click",".suspend-record",function(event){
            let id = event.currentTarget.classList[2];
            Swal.fire({
              title:"Are you sure?",
              text:"",
              icon:"warning",
              showCancelButton:!0,
              confirmButtonText:"Yes, suspend!",
              customClass:{
                confirmButton:"btn btn-primary me-3",
                cancelButton:"btn btn-label-secondary"
              },
              buttonsStyling:!1,
              showLoaderOnConfirm: true,
              preConfirm: () => {
                return fetch('/api/users/individual/'+id,  {
                    method: 'PUT'
                  })
                  .then(response => {
                    if (!response.ok) {
                      throw new Error(response.statusText)
                    }
                    return response.json()
                  })
                  .catch(error => {
                    Swal.showValidationMessage(
                      `Request failed: ${error}`
                    )
                  })
              },
              allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
              if (result.isConfirmed) {
                Swal.fire(
                  'Deleted!',
                  'User has been deleted.',
                  'success'
                )
                e.row($(this).parents("tr")).remove().draw()
              }
            })
        }),
        $(".datatables-users tbody").on("click",".delete-record",function(event){
            let id = event.currentTarget.classList[2];
            Swal.fire({
              title:"Are you sure?",
              text:"You won't be able to revert this!",
              icon:"warning",
              showCancelButton:!0,
              confirmButtonText:"Yes, delete it!",
              customClass:{
                confirmButton:"btn btn-danger me-3",
                cancelButton:"btn btn-label-secondary"
              },
              buttonsStyling:!1,
              showLoaderOnConfirm: true,
              preConfirm: () => {
                return fetch('/api/users/individual/'+id,  {
                    method: 'DELETE',
                    headers: new Headers({
                      'Accept' : 'application/json',
                      'Content-Type':'application/json; charset=UTF-8',
                      'X-CSRF-Token' : "<?php echo csrf_token() ?>"
                    })
                  })
                  .then(response => {
                    if (!response.ok) {
                      throw new Error(response.statusText)
                    }
                    return response.json()
                  })
                  .catch(error => {
                    Swal.showValidationMessage(
                      `Request failed: ${error}`
                    )
                  })
              },
              allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
              if (result.isConfirmed) {
                Swal.fire({
                  title:'Deleted!',
                  text:'User has been deleted.',
                  icon:'success',
                  showCancelButton:0,
                  confirmButtonText:"Close",
                  customClass:{
                    confirmButton:"btn btn-label-secondary",
                    cancelButton:"btn btn-label-secondary d-none"
                  },
                  buttonsStyling:!1,
                })
                e.row($(this).parents("tr")).remove().draw()
              }
            })
        }),
        $(".datatables-users tbody").on("click",".edit-record",function(event){
          let a = event.target;
          let id = a.getAttribute('data-id'),name = a.getAttribute('data-name'),email = a.getAttribute('data-email'),phone = a.getAttribute('data-phone'),district = a.getAttribute('data-district'),gender = a.getAttribute('data-gender'),marital = a.getAttribute('data-marital'),photo = a.getAttribute('data-photo'),diplome = a.getAttribute('data-diplome'),regNumber = a.getAttribute('data-regNumber'),status = a.getAttribute('data-status'),practicing = a.getAttribute('data-practicing'),category = a.getAttribute('data-category'),date = a.getAttribute('data-date'),edit=document.getElementById('edit');
          $("#is").val(id),$("#updateName").val(name),$("#updateEmail").val(email);$("#updatePhone").val(phone);$("#updateDistrict").val(district);$("#updateGender").val(gender);$("#updateMarital").val(marital);$("#updateStatus").val(category);$("#updateCategory").val(status);$("#updatePracticing").val(practicing);document.querySelector("#flatpickr-date-up").flatpickr({altInput:!0,altFormat:"F j, Y",dateFormat:"Y-m-d", maxDate: 'today'}).setDate(new Date(date.split('-')[0],parseInt(date.split('-')[1])-1,date.split('-')[2].split('T')[0]));
          let ee=document.getElementById("updatedAvatar");
          let f=document.getElementById("updatedDiploma");
          const l=document.querySelector(".user-avatar-updated"),m=document.querySelector(".user-diploma-updated"),c=document.querySelector(".updated-avatar-reset"),d=document.querySelector(".updated-diploma-reset");
          if(ee){
            const r = ee.src = assetsPath+"img/avatars/"+photo;
            l.onchange=()=>{
              l.files[0]&&(ee.src=window.URL.createObjectURL(l.files[0]))
            },
            c.onclick=()=>{
                l.value="",
                ee.src=r
            }
          }
          if(f){
              const s= f.src = assetsPath+"img/diploma/"+diplome;
              m.onchange=()=>{
                m.files[0]&&(f.src=window.URL.createObjectURL(m.files[0]))
              },
              d.onclick=()=>{
                  l.value="",
                  f.src=s
              }
          }
          edit.click();
        }),
        setTimeout(()=>{
            $(".dataTables_filter .form-control").removeClass("form-control-sm"),
            $(".dataTables_length .form-select").removeClass("form-select-sm")
        },300)

        let ee=document.getElementById("uploadedAvatar");
        let f=document.getElementById("uploadedDiploma");
        const l=document.querySelector(".user-avatar-input"),m=document.querySelector(".user-diploma-input"),c=document.querySelector(".user-avatar-reset"),d=document.querySelector(".user-diploma-reset");
        if(ee){
          const r=ee.src;
          l.onchange=()=>{
              l.files[0]&&(ee.src=window.URL.createObjectURL(l.files[0]))
          },
          c.onclick=()=>{
              l.value="",
              ee.src=r
          }
        }
        if(f){
            const s=f.src;
            m.onchange=()=>{
                m.files[0]&&(f.src=window.URL.createObjectURL(m.files[0]))
            },
            d.onclick=()=>{
                l.value="",
                f.src=s
            }
        }
    }),
    //   function(){
    //     var e=document.querySelectorAll(".phone-mask"),
    //     t=document.getElementById("addNewUserForm");
    //     e&&e.forEach(function(e){
    //         new Cleave(e,{
    //             phone:!0,phoneRegionCode:"EN"
    //         })
    //     }),
    //     FormValidation.formValidation(t,{
    //         fields:{
    //             userFullname:{
    //                 validators:{
    //                     notEmpty:{
    //                         message:"Please enter fullname "
    //                     }
    //                 }
    //             },
    //             userEmail:{
    //                 validators:{
    //                     notEmpty:{
    //                         message:"Please enter your email"
    //                     },
    //                     emailAddress:{
    //                         message:"The value is not a valid email address"
    //                     }
    //                 }
    //             }
    //         },
    //         plugins:{
    //             trigger:new FormValidation.plugins.Trigger,bootstrap5:new FormValidation.plugins.Bootstrap5({
    //                 eleValidClass:"",
    //                 rowSelector:function(e,t){
    //                     return".mb-3"
    //                 }
    //             }),
    //             submitButton:new FormValidation.plugins.SubmitButton,
    //             autoFocus:new FormValidation.plugins.AutoFocus
    //         }
    //     })
      
    // }();

    document.addEventListener("DOMContentLoaded",function(e){
    {
        const o=document.querySelector("#newUserForm"),
        p=document.querySelector("#editUserForm"),
        t=document.querySelector("#phone");
        t&&new Cleave(t,{
            phone:!0,
            phoneRegionCode:"RW"
        });
        const s=(o&&FormValidation.formValidation(o,{
            fields:{
              // profile:{
              //       validators:{
              //           notEmpty:{
              //               message:"Upload profile picture"
              //           }
              //       }
              //   },
                // diploma:{
                //     validators:{
                //         notEmpty:{
                //             message:"Upload diploma"
                //         }
                //     }
                // },
                name:{
                    validators:{
                        notEmpty:{
                            message:"Please enter full name"
                        }
                    }
                },
                email:{
                    validators:{
                        notEmpty:{
                            message:"Please enter your email"
                        },
                        emailAddress:{
                            message:"The value is not a valid email address"
                        }
                    }
                },
                phone:{
                    validators:{
                        notEmpty:{
                            message:"Please enter phone number"
                        },
                    }
                },
                gender:{
                    validators:{
                        notEmpty:{
                            message:"Select gender"
                        }
                    }
                },
                marital:{
                    validators:{
                        notEmpty:{
                            message:"Select martial status"
                        }
                    }
                },
                district:{
                    validators:{
                        notEmpty:{
                            message:"Select district"
                        }
                    }
                },
                category:{
                    validators:{
                        notEmpty:{
                            message:"Select user category"
                        }
                    }
                },
                practicing:{
                    validators:{
                        notEmpty:{
                            message:"Select practicing status"
                        }
                    }
                },
            },
            plugins:{
                trigger:new FormValidation.plugins.Trigger,
                bootstrap5:new FormValidation.plugins.Bootstrap5(
                    {
                        eleValidClass:"",
                        rowSelector:".col-md-6"
                    }
                ),
                submitButton:new FormValidation.plugins.SubmitButton,
                defaultSubmit:new FormValidation.plugins.DefaultSubmit,
                autoFocus:new FormValidation.plugins.AutoFocus
            },
            init:e=>{
                e.on("plugins.message.placed",function(e){
                    e.element.parentElement.classList.contains("input-group")&&e.element.parentElement.insertAdjacentElement("afterend",e.messageElement)
                })
            }
        }));
        const u=(p&&FormValidation.formValidation(p,{
            fields:{
                
                name:{
                    validators:{
                        notEmpty:{
                            message:"Please enter full name"
                        }
                    }
                },
                email:{
                    validators:{
                        notEmpty:{
                            message:"Please enter your email"
                        },
                        emailAddress:{
                            message:"The value is not a valid email address"
                        }
                    }
                },
                phone:{
                    validators:{
                        notEmpty:{
                            message:"Please enter phone number"
                        },
                    }
                },
                gender:{
                    validators:{
                        notEmpty:{
                            message:"Select gender"
                        }
                    }
                },
                marital:{
                    validators:{
                        notEmpty:{
                            message:"Select martial status"
                        }
                    }
                },
                district:{
                    validators:{
                        notEmpty:{
                            message:"Select district"
                        }
                    }
                },
                category:{
                    validators:{
                        notEmpty:{
                            message:"Select user category"
                        }
                    }
                },
                practicing:{
                    validators:{
                        notEmpty:{
                            message:"Select practicing status"
                        }
                    }
                },
            },
            plugins:{
                trigger:new FormValidation.plugins.Trigger,
                bootstrap5:new FormValidation.plugins.Bootstrap5(
                    {
                        eleValidClass:"",
                        rowSelector:".col-md-6"
                    }
                ),
                submitButton:new FormValidation.plugins.SubmitButton,
                defaultSubmit:new FormValidation.plugins.DefaultSubmit,
                autoFocus:new FormValidation.plugins.AutoFocus
            },
            init:e=>{
                e.on("plugins.message.placed",function(e){
                    e.element.parentElement.classList.contains("input-group")&&e.element.parentElement.insertAdjacentElement("afterend",e.messageElement)
                })
            }
        }));
      }
      @if($errors->any())
        var myModal = new bootstrap.Modal(document.getElementById('newUser'), {
          keyboard: false
        })
        myModal.show()
      @endif
    })
   
    
    

</script>

@endsection