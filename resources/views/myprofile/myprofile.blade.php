@extends('layouts.app')

@section('page_name')
 My profile
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

    
@include('myprofile.navigation')

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
      </div>
    </div>
    <!--/ About User -->
    <!-- Profile Overview -->
    <div class="card mb-4">
      <div class="card-body">
        <p class="card-text text-uppercase">Area Of Practice <a href="javascript:void(0)" class="btn btn-label-info btn-sm float-end" data-bs-toggle="modal" data-bs-target="#areas">Modify</a></p>
        <div class="modal fade" id="areas" tabindex="-1" style="display: none;" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('areas') }}">
              @csrf
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Area of practice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <label for="area" class="form-label">Select your area of practice</label>
                <select id="area" class="select2 form-select" name="areas[]" multiple required>
                  @foreach($laws as $law)
                  <option @if(in_array($law->id, $userlaws)) selected @endif value="{{ $law->id }}">{{ $law->title }}</option>
                  @endforeach
                </select> 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
              </div>
            </div>
          </form>
          </div>
        </div>
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
              <div class="dropdown">
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
              <div class="dropdown">
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
            <div class="col-sm-5 text-sm-end">
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
            <div class="col-sm-5 text-sm-end">
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
            <div class="col-sm-5 text-sm-end">
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
            <div class="col-sm-5 text-sm-end">
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
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection


@section('js')
<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
<script>
  "use strict";
  $(function(){
    var t=$(".select2");
    t.length&&t.each(function(){
        var e=$(this);
        e.wrap('<div class="position-relative"></div>').select2({
            placeholder:"Select value",
            dropdownParent:e.parent()
        })
    });
    $(".social-btn").on("click",function(event){
      let {name, role } = event.target.dataset;
      if(role== 'link'){
        let title = name == "whatsapp" ? 'number' : 'account';
        let handle = name == "whatsapp" ? 'number' : 'handle';
        let icon = name == "whatsapp" ? '+' : '@';
        $('#modalTitle').html(`link your ${name} ${title}`);
        $('#socialTitle').html(`${name} ${handle}`);
        $('#basic-addon11').html(icon);
        $('#social').val(name);
        $('#socialModal').modal('show');
      }
      if(role== 'unlink'){
        let title = name == "whatsapp" ? 'number' : 'account';
        $('#deleteTitle').html(`do you wish to remove your ${name} ${title}`);
        $('#socialDelete').val(name);
        $('#deleteModal').modal('show');
      }
    });
  });
</script>
@endsection
