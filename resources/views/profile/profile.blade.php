@extends('layouts.app')

@section('page_name')
User Profile
@endsection

@section('contents')
        <!-- Content -->
        
<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-5">
      <span class="text-muted fw-light">User Profile /</span> Profile
    </h4>
  
    <!-- Header -->
    <div class="row">
      <div class="col-12 mt-4">
        <div class="card mb-4 mt-5">
          <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
            <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
              <img src="{{ asset('assets/img/avatars/')}}/{{$user->photo}}" alt="user image" class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
            </div>
            <div class="flex-grow-1 mt-5 pt-5 mt-sm-5">
              <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                <div class="user-profile-info mt-3">
                  <h4>{{ $user->name }}</h4>
                  <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                    <li class="list-inline-item">
                      <i class='ti ti-id'></i> ROLL NUMBER: <span class="fw-bold">{{$user->regNumber}}</span>
                    </li>
                    <li class="list-inline-item">
                      <i class='ti ti-map-pin'></i> DISTRICT: <span class="fw-bold">{{$user->district}}</span>
                    </li>
                    <li class="list-inline-item">
                      <i class='ti ti-sitemap'></i> CATEGORY: <span class="fw-bold">{{$user->category}}</span></li>
                  </ul>
                </div>
                <a href="javascript:void(0)" class="btn btn-{{ badge($user->practicing) }}">
                  {{ userStatus($user->practicing) }} <i class="ti ti-{{ icon($user->practicing) }} ps-2"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Header -->
    
    @include('profile.navigation')

<!-- User Profile Content -->
<div class="row">
  <div class="col-xl-4 col-lg-5 col-md-5">
    <!-- About User -->
    <div class="card mb-4">
      <div class="card-body">
        <div class="user-avatar-section">
          <div class=" d-flex align-items-center flex-column">
            {!! QrCode::size(200)->margin(0)->generate("$user->regNumber") !!}
          </div>
        </div>
        <small class="card-text text-uppercase">About</small>
        <ul class="list-unstyled mb-4 mt-3">
          <li class="d-flex align-items-center mb-3"><i class="ti ti-user"></i><span class="fw-bold mx-2">Full Name:</span> <span>{{$user->name}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-check"></i><span class="fw-bold mx-2">Status:</span> <span class="badge bg-label-{{ badge($user->practicing) }}">{{ userStatus($user->practicing) }}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-crown"></i><span class="fw-bold mx-2">Role:</span> <span @if(!$user->getRoleNames()->count()) class="fst-italic" @endif>{{ $user->getRoleNames()->count() == 0 ? 'No Role Assigned' : $user->getRoleNames() }}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-flag"></i><span class="fw-bold mx-2">District:</span> <span>{{$user->district}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-file-description"></i><span class="fw-bold mx-2">Admission Status:</span> <span>{{ userCategory($user->status) }}</span></li>
        </ul>
        <small class="card-text text-uppercase">Contacts</small>
        <ul class="list-unstyled mb-4 mt-3">
          <li class="d-flex align-items-center mb-3"><i class="ti ti-phone-call"></i><span class="fw-bold mx-2">Contact:</span> <span>{{$user->phone[0]->phone}}</span></li>
          <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span class="fw-bold mx-2">Email:</span> <span>{{$user->email}}</span></li>
        </ul>
        <small class="card-text text-uppercase"></small>
        <div class="d-flex justify-content-center">
          <a href="javascript:;" data-bs-target="#assignRole" data-bs-toggle="modal" class="btn btn-primary me-3 waves-effect waves-light">Assign Role</a>
          <a href="javascript:;" data-bs-target="#changeStatus" data-bs-toggle="modal"class="btn btn-label-danger suspend-user waves-effect">Change Status</a>
          <div class="modal fade" id="assignRole" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form method="post" action="{{ route('assignRole',$user->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="text-center mb-4">
                      <h3 class="mb-2">Assign Role to {{ $user->name }}</h3>
                      <p class="text-muted">{{ $user->name }} will have permissions according to role assigned to</p>
                    </div>
                    <div class="row">
                      <div class="col mb-3">
                        <label for="roles" class="form-label">Select Roles to assign</label>
                        <input id="roles" name="roles" class="form-control" placeholder=" - Select Roles -" value="@foreach($user->getRoleNames() as $role){{$role}},@endforeach" required>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal fade" id="changeStatus" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form method="post">
                  @csrf
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Change user status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    @if($errors->any())
                      <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <span class="alert-icon text-danger me-2">
                          <i class="ti ti-ban ti-xs"></i>
                        </span>
                        <ul class="p-0 m-0">
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                      </div>
                    @endif
                    <div class="row">
                      <div class="col mb-3">
                        <label for="nameBasic" class="form-label">Name</label>
                        <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" disabled value="{{ $user->name }}">
                      </div>
                    </div>
                    <div class="row g-2">
                      <div class="col mb-0">
                        <label for="regNumber" class="form-label">Reg Number</label>
                        <input type="text" id="regNumber" class="form-control" value="{{ $user->regNumber }}" disabled>
                      </div>
                      <div class="col mb-0">
                        <label for="date" class="form-label">Admission Date</label>
                        <input type="text" id="date" name="date" class="form-control" placeholder="Month day, Year">
                      </div>
                    </div>
                    <div class="row g-2 mt-2">
                      <div class="col mb-0">
                        <label for="status" class="form-label">Admission Status</label>
                        <select id="status" name="status" class="form-select">
                            <option value="" selected> - Select - </option>
                            <option @if($user->status=="1") selected @endif value="1">Advocate</option>
                            <option @if($user->status=="2") selected @endif value="2">Intern Advocate</option>
                            <option @if($user->status=="3") selected @endif value="3">Support Staff</option>
                            <option @if($user->status=="4") selected @endif value="4">Technical Staff</option>
                          </select>
                      </div>
                      <div class="col mb-0">
                        <label for="practicing" class="form-label">Practicing Status</label>
                        <select id="practicing" name="practicing" class="form-select">
                            <option value="" selected> - Select - </option>
                            <option @if($user->practicing=="1") selected @endif value="1">N/A</option>
                            <option @if($user->practicing=="2") selected @endif value="2">Active</option>
                            <option @if($user->practicing=="3") selected @endif value="3">Inactive</option>
                            <option @if($user->practicing=="4") selected @endif value="4">Suspended</option>
                            <option @if($user->practicing=="5") selected @endif value="5">Struck Off</option>
                            <option @if($user->practicing=="6") selected @endif value="6">Deceased</option>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer d-flex justify-content-between">
                    <button type="button" data-bs-target="#deleteModal" data-bs-toggle="modal" data-bs-dismiss="modal" class="btn btn-danger waves-effect waves-light float-start">Deactivate User</button>
                    <div>
                      <button type="button" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="modal fade" id="deleteModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form method="post">
                  @csrf
                  @method('DELETE')
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Please confirm that you would like to deactivate this user?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary waves-effect" data-bs-target="#changeStatus" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Yes, Deactivate</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ About User -->
    <!-- Profile Overview -->
    <div class="card mb-4">
      <div class="card-body">
        <p class="card-text text-uppercase">Area Of Practice</p>
        <ul class="list-unstyled mb-0">
          @foreach($user->areas as $area)
          <li class="d-flex align-items-center mb-3"><i class="ti ti-chevron-right"></i><span>{{ $area->laws->title }}</span></li>
          @endforeach
        </ul>
      </div>
    </div>
    <!--/ Profile Overview -->
  </div>
  <div class="col-xl-8 col-lg-7 col-md-7">
    <div class="card mb-4">
      <h5 class="card-header">Recent Devices</h5>
      <div class="table-responsive">
        <table class="table border-top">
          <thead>
            <tr>
              <th class="text-truncate">Browser</th>
              <th class="text-truncate">IP Address</th>
              <th class="text-truncate">Log in success</th>
              <th class="text-truncate">Logout</th>
              <th class="text-truncate">Recent Activities</th>
            </tr>
          </thead>
          <tbody>
            @foreach($logs as $log)
            @if($loop->index < 10)
            <tr>
              <td class="text-truncate"><i class="ti {{ browserIcon($log->user_agent)}} ti-xs me-2"></i> <strong>{{ browserName($log->user_agent).' on '. platformName($log->user_agent)}}</strong></td>
              <td class="text-truncate">{{ $log->ip_address }}</td>
              <td class="text-truncate"><span class="badge bg-label-{{ $log->login_successful ? 'success' : 'danger'}}">{{ $log->login_successful ? 'Success' : 'Failed'}}</span></td>
              <td class="text-truncate"><span class="badge bg-label-{{ $log->logout_at ? 'success' : 'danger'}}">{{ $log->logout ? 'Yes' : 'No'}}</span></td>
              <td class="text-truncate">{{ $log->login_at->format('d, M Y H:i')}}</td>
            </tr>
            @endif
            @endforeach
            
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <!-- Connections -->
      <div class="col-lg-12 col-xl-6">
        <div class="card card-action mb-4">
          <div class="card-header align-items-center">
            <h5 class="card-action-title mb-0">Phone Numbers</h5>
            <div class="card-action-element">
              <div class="dropdown d-none">
                <button class="btn p-0" type="button" data-bs-toggle="modal" data-bs-target="#addPhone">
                  <i class="ti ti-plus ti-sm text-muted"></i> New
                </button>
              </div>
              <div class="modal fade" id="addPhone" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                  <form method="post" action="{{ route('phone') }}">
                    @csrf
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel2">New Phone</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col mb-3">
                          <label for="nameSmall" class="form-label">Mobile, Home, Office (specify)</label>
                          <input type="text" id="nameSmall" name="name" class="form-control" required>
                        </div>
                      </div>
                      <div class="row g-2">
                        <div class="col mb-0">
                          <label class="form-label" for="phone">Phone Number</label>
                          <input type="text" class="form-control" name="phone" id="phone" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" required>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary waves-effect waves-light">Add Phone</button>
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <ul class="list-unstyled mb-0">
              @foreach($user->phone as $phone)
              <li class="mb-3">
                <div class="d-flex align-items-start">
                  <div class="d-flex align-items-start">
                    <div class="me-2 ms-1">
                      <h6 class="mb-0">{{$phone->phone}}</h6>
                      <small class="text-muted">{{$phone->name}}</small>
                    </div>
                  </div>
                  @if($loop->index > 0)
                  <div class="ms-auto">
                    <form method="post" action="{{ route('phone.delete', $phone->id) }}">@csrf @method('DELETE')
                      <button type="submit" class="btn btn-label-danger btn-icon btn-sm"><i class="ti ti-trash ti-xs"></i></button>
                    </form>
                  </div>
                  @endif
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <!--/ Connections -->
      <!-- Teams -->
      <div class="col-lg-12 col-xl-6">
        <div class="card card-action mb-4">
          <div class="card-header align-items-center">
            <h5 class="card-action-title mb-0">Address</h5>
            <div class="card-action-element">
              <div class="dropdown d-none">
                <button class="btn p-0" type="button" data-bs-toggle="modal" data-bs-target="#addaddress">
                  <i class="ti ti-plus ti-sm text-muted"></i> New
                </button>
              </div>
              <div class="modal fade" id="addaddress" tabindex="-1" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                <form method="post" action="{{ route('address') }}">
                    @csrf
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel2">New Address</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col mb-3">
                          <label for="addname" class="form-label">Home, Office (specify)</label>
                          <input type="text" id="addname" name="title" class="form-control" required>
                        </div>
                      </div>
                      <div class="row g-2">
                        <div class="col mb-0">
                          <label class="form-label" for="address">Address</label>
                          <input type="text" class="form-control" name="address" id="address" required>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary waves-effect waves-light">Save Address</button>
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <ul class="list-unstyled mb-0">
              @foreach($user->address as $address)
              <li class="mb-3">
                <div class="d-flex align-items-start">
                  <div class="d-flex align-items-start">
                    <div class="me-2 ms-1">
                      <h6 class="mb-0">{{$address->address}}</h6>
                      <small class="text-muted">{{$address->title}}</small>
                    </div>
                  </div>
                  <div class="ms-auto">
                    <form method="post" action="{{ route('address.delete', $address->id) }}">@csrf @method('DELETE')
                      <button type="submit" class="btn btn-label-danger  btn-sm">Delete</button>
                    </form>
                  </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      <!--/ Teams -->
    </div>
    <div class="card mb-4">
      <h5 class="card-header pb-1">Social Accounts</h5>
      <div class="card-body">
        <p class="mb-4">Your profile from search result will include your social medias</p>
        <div class="modal fade" id="socialModal" tabindex="-1" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
            <form method="post" action="{{ route('social') }}">
              @csrf
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalTitle"></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col">
                      <label for="link" id="socialTitle" class="form-label"></label>
                      <div class="input-group">
                        <span class="input-group-text" id="basic-addon11"></span>
                        <input type="text" id="link" name="link" class="form-control" required>
                      </div>
                      <input type="hidden" name="social" id="social" class="form-control" required>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="modal fade" id="deleteModal" tabindex="-1" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
            <form method="post" action="{{ route('social') }}">
              @csrf
              @method('DELETE')
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteTitle"></h5>
                  <input type="hidden" name="social" id="socialDelete" class="form-control" required>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal">Abort</button>
                  <button type="submit" class="btn btn-danger waves-effect waves-light">Yes, unlink</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="d-flex mb-3">
          <div class="flex-shrink-0">
            <img src="{{ asset('assets/img/icons/brands/facebook.png') }}" alt="facebook" class="me-3" height="38">
          </div>
          <div class="flex-grow-1 row">
            <div class="col-sm-7 mb-sm-0 mb-2">
              <h6 class="mb-0">Facebook</h6>
              @if(empty($facebook['link']))
              <small class="text-muted">Not Connected</small>
              @else
              <a href="https://facebook.com/{{$facebook['link']}}" target="_blank">{{'@'.$facebook['link']}}</a>
              @endif
            </div>
            <div class="col-sm-5 text-sm-end d-none">
              <button class="btn btn-label-{{$facebook['btn']}} btn-icon waves-effect social-btn" data-name="facebook" data-role="{{$facebook['label']}}"><i class="ti {{$facebook['icon']}} ti-sm" data-name="facebook" data-role="{{$facebook['label']}}"></i></button>
            </div>
          </div>
        </div>
        <div class="d-flex mb-3">
          <div class="flex-shrink-0">
            <img src="{{ asset('assets/img/icons/brands/twitter.png') }}" alt="twitter" class="me-3" height="38">
          </div>
          <div class="flex-grow-1 row">
            <div class="col-sm-7 mb-sm-0 mb-2">
              <h6 class="mb-0">Twitter</h6>
              @if(empty($twitter['link']))
              <small class="text-muted">Not Connected</small>
              @else
              <a href="https://twitter.com/{{$twitter['link']}}/" target="_blank">{{'@'.$twitter['link']}}</a>
              @endif
            </div>
            <div class="col-sm-5 text-sm-end d-none">
              <button class="btn btn-label-{{$twitter['btn']}} btn-icon waves-effect social-btn" data-name="twitter" data-role="{{$twitter['label']}}"><i class="ti {{$twitter['icon']}} ti-sm" data-name="twitter" data-role="{{$twitter['label']}}"></i></button>
            </div>
          </div>
        </div>
        <div class="d-flex mb-3">
          <div class="flex-shrink-0">
            <img src="{{ asset('assets/img/icons/brands/instagram.png') }}" alt="instagram" class="me-3" height="38">
          </div>
          <div class="flex-grow-1 row">
            <div class="col-sm-7 mb-sm-0 mb-2">
              <h6 class="mb-0">instagram</h6>
              @if(empty($instagram['link']))
              <small class="text-muted">Not Connected</small>
              @else
              <a href="https://instagram.com/{{$instagram['link']}}/" target="_blank">{{'@'.$instagram['link']}}</a>
              @endif
            </div>
            <div class="col-sm-5 text-sm-end d-none">
              <button class="btn btn-label-{{$instagram['btn']}} btn-icon waves-effect social-btn" data-name="instagram" data-role="{{$instagram['label']}}"><i class="ti {{$instagram['icon']}} ti-sm" data-name="instagram" data-role="{{$instagram['label']}}"></i></button>
            </div>
          </div>
        </div>
        <div class="d-flex mb-3">
          <div class="flex-shrink-0">
            <img src="{{ asset('assets/img/icons/brands/whatsapp.jpg') }}" alt="whatsapp" class="me-3" height="38">
          </div>
          <div class="flex-grow-1 row">
            <div class="col-sm-7 mb-sm-0 mb-2">
              <h6 class="mb-0">Whatsapp</h6>
              @if(empty($whatsapp['link']))
              <small class="text-muted">Not Connected</small>
              @else
              <a href="https://whatsapp.com/{{$whatsapp['link']}}" target="_blank">{{'+'.$whatsapp['link']}}</a>
              @endif
            </div>
            <div class="col-sm-5 text-sm-end d-none">
              <button class="btn btn-label-{{$whatsapp['btn']}} btn-icon waves-effect social-btn" data-name="whatsapp" data-role="{{$whatsapp['label']}}"><i class="ti {{$whatsapp['icon']}} ti-sm" data-name="whatsapp" data-role="{{$whatsapp['label']}}"></i></button>
            </div>
          </div>
        </div>
      </div>
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
!function(){
    var a=(new Tagify(a),document.querySelector("#roles")),
    date='{{ $user->date }}',
    dtt=document.querySelector("#date"),
    t=[@foreach($roles as $role)"{{ $role }}",@endforeach],
    a=(new Tagify(a,{
        whitelist:t,
        maxTags:10,
        dropdown:{
            maxItems:20,
            classname:"tags-inline",
            enabled:0,
            closeOnSelect:!1
        }
    }));
    dtt&&dtt.flatpickr({altInput:!0,altFormat:"F j, Y",dateFormat:"Y-m-d", maxDate: 'today', defaultDate:new Date(date.split('-')[0],parseInt(date.split('-')[1])-1,date.split('-')[2].split(' ')[0])})
    @if($errors->any())
        var myModal = new bootstrap.Modal(document.getElementById('changeStatus'), {
          keyboard: false
        })
        myModal.show()
      @endif
  }();  
</script>
@endsection