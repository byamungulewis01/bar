@extends('layouts.app')

@section('page_name')
Disciplinary Cases
@endsection

@section('contents')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">



    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-0">Disciplinary Cases
                <a class="btn btn-dark text-white pull-left float-end" data-bs-toggle="modal"
                    data-bs-target="#twoFactorAuth">
                    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                    <span class="d-none d-sm-inline-block">New Case</span></a></h5>

            <!-- Two Factor Auth Modal -->

            <div class="modal fade" id="twoFactorAuth" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-simple">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">New Discipline case</h3>
                                <p class="text-muted">You also need to select one of three choise meeting to case Category</p>
                            </div>
                            <div class="form-check custom-option custom-option-basic mb-3">
                                <label class="form-check-label custom-option-content ps-3" for="customRadioTemp1"
                                    data-bs-target="#twoFactorAuthOne" data-bs-toggle="modal">
                                    <input name="customRadioTemp" class="form-check-input d-none" type="radio" value=""
                                        id="customRadioTemp1" />
                                    <div class="d-flex align-items-start">
                                        <i class="ti ti-message ti-xl me-3"></i>
                                        <div>
                                            <span class="custom-option-header">
                                                <span class="h4 mb-2">(Layman Or Institution) => (Advocate)</span>
                                            </span>
                                            <span class="custom-option-body">
                                                <p class="mb-0">Plaintiff is a Layman Or Institution => Defendant is an Advocate</p>
                                            </span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="form-check custom-option custom-option-basic mb-3">
                                <label class="form-check-label custom-option-content ps-3" for="customRadioTemp2"
                                    data-bs-target="#twoFactorAuthTwo" data-bs-toggle="modal">
                                    <input name="customRadioTemp" class="form-check-input d-none" type="radio" value=""
                                        id="customRadioTemp2" />
                                    <div class="d-flex align-items-start">
                                        <i class="ti ti-message ti-xl me-3"></i>
                                        <div>
                                            <span class="custom-option-header">
                                                <span class="h4 mb-2">(Advocate) => (Layman Or Institution)</span>
                                            </span>
                                            <span class="custom-option-body">
                                                <p class="mb-0">Plaintiff is an Advocate => Defendant is a Layman Or Institution</p>
                                            </span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="form-check custom-option custom-option-basic">
                                <label class="form-check-label custom-option-content ps-3" for="customRadioTemp3"
                                    data-bs-target="#twoFactorAuthThree" data-bs-toggle="modal">
                                    <input name="customRadioTemp" class="form-check-input d-none" type="radio" value=""
                                        id="customRadioTemp3" />
                                    <div class="d-flex align-items-start">
                                        <i class="ti ti-message ti-xl me-3"></i>
                                        <div>
                                            <span class="custom-option-header">
                                                <span class="h4 mb-2">(Advocate) => (Advocate)</span>
                                            </span>
                                            <span class="custom-option-body">
                                                <p class="mb-0">Plaintiff is an Advocate and Defendant is an Advocate .</p>
                                            </span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Authentication App -->
            <div class="modal fade" id="twoFactorAuthOne" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">Add New Case</h3>
                                <p class="text-muted">Add new Discipline Case by compliting Each field bellow</p>
                            </div>
                            <form method="POST" class="row g-3" action="{{ route('cases.store') }}">
                                @csrf
                                <div class="col-12">
                                    <label class="switch">
                                        <span class="switch-label">Layman Or Institution Plaintiff</span>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="form-label w-100" for="modalAddCard">Name</label>
                                    <div class="input-group input-group-merge">
                                        <input pattern="[A-Za-z0-9 ]{6,}" title="Name Must have at least 6 characters" required name="name" value="{{ old('name') }}"
                                            class="form-control credit-card-mask" type="text" placeholder="John Doe" />
                                        <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span
                                                class="card-type"></span></span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6">
                                    <label class="form-label" for="modalAddCardExpiryDate">Email</label>
                                    <input type="email" id="modalAddCardExpiryDate" name="email" required
                                        value="{{ old('email') }}" class="form-control expiry-date-mask"
                                        placeholder="johndoe@gmail.com" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalAddCardName">Mobile Number</label>
                                    <input name="phone" pattern="[0-9]{10}" required maxlength="10" value="{{ old('phone') }}"
                                        class="form-control" placeholder="XXX-XXX-XXXX" />
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
                                            <option value="" selected> - Select - </option>
                                            @foreach ($users as $user)
                                            <option @if(old('advocate')==$user->name) selected @endif
                                                value="{{ $user->id }}">{{ $user->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="modalAddCardName">complaint</label>
                                    <input pattern="[A-Za-z0-9 ]{10,}" title="complaint must have at least 10 characters" required type="text" value="{{ old('complaint') }}" name="complaint" class="form-control" placeholder="Subject here" />
                                    <input type="hidden" name="case_type" value="1" />
                                </div>
                                <div class="col-12">
                                    <label for="exampleFormControlTextarea1" class="form-label">Case Sammary</label>
                                    <textarea required name="sammary" class="form-control" id="exampleFormControlTextarea1"
                                        rows="3">Cupcake ipsum dolor sit amet. Halvah cheesecake chocolate bar gummi bears cupcake. Pie macaroon bear claw. Soufflé I love candy canes I love cotton candy I love.
                                    </textarea>
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

            <!-- Modal Authentication via SMS -->
            <div class="modal fade" id="twoFactorAuthTwo" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">Add New Case</h3>
                                <p class="text-muted">Add new Discipline Case by compliting Each field bellow</p>
                            </div>
                            <form method="POST" class="row g-3" action="{{ route('cases.store') }}">
                                @csrf
                                <div class="col-12">
                                    <label class="switch">
                                        <span class="switch-label">Advocate Plaintiff</span>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="form-label w-100" for="modalAddCard">Advocate name</label>
                                    <div class="input-group input-group-merge">
                                        <select required name="advocate" class="form-select">
                                            <option value="" selected> - Select - </option>
                                            @foreach ($users as $user)
                                            <option @if(old('user')==$user->name) selected @endif
                                                value="{{ $user->id }}">{{ $user->name}}</option>
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
                                        <input pattern="[A-Za-z0-9 ]{6,}" title="Name Must have at least 6 characters" required name="name" value="{{ old('name') }}"
                                            class="form-control credit-card-mask" type="text" placeholder="John Doe" />
                                        <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span
                                                class="card-type"></span></span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6">
                                    <label class="form-label" for="modalAddCardExpiryDate">Email</label>
                                    <input type="email" id="modalAddCardExpiryDate" name="email" required
                                        value="{{ old('email') }}" class="form-control expiry-date-mask"
                                        placeholder="johndoe@gmail.com" />
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="modalAddCardName">Mobile Number</label>
                                    <input  name="phone" pattern="[0-9]{10}" required maxlength="10" value="{{ old('phone') }}"
                                        class="form-control" placeholder="XXX-XXX-XXXX" />
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="modalAddCardName">complaint</label>
                                    <input pattern="[A-Za-z0-9 ]{10,}" title="complaint must have at least 10 characters" required type="text" value="{{ old('complaint') }}" name="complaint" class="form-control" placeholder="Subject here" />
                                    <input type="hidden" name="case_type" value="2" />
                                </div>
                                <div class="col-12">
                                    <label for="exampleFormControlTextarea1" class="form-label">Case Sammary</label>
                                    <textarea required name="sammary" class="form-control" id="exampleFormControlTextarea1"
                                        rows="3">Cupcake ipsum dolor sit amet. Halvah cheesecake chocolate bar gummi bears cupcake. Pie macaroon bear claw. Soufflé I love candy canes I love cotton candy I love.
                                    </textarea>
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
            <!--/ Two Factor Auth Modal -->
            <!-- Modal Authentication via SMS -->
            <div class="modal fade" id="twoFactorAuthThree" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                    <div class="modal-content p-3 p-md-5">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="text-center mb-4">
                                <h3 class="mb-2">Add New Case</h3>
                                <p class="text-muted">Add new Discipline Case by compliting Each field bellow</p>
                            </div>
                            <form method="POST" class="row g-3" action="{{ route('cases.store') }}">
                                @csrf
                                <div class="col-12">
                                    <label class="switch">
                                        <span class="switch-label">Advocate Plaintiff</span>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="form-label w-100" for="modalAddCard">Name</label>
                                    <div class="input-group input-group-merge">
                                        <select required name="plaintiff" class="form-select">
                                            <option value="" selected> - Select - </option>
                                            @foreach ($users as $user)
                                            <option @if(old('user')==$user->name) selected @endif
                                                value="{{ $user->id }}">{{ $user->name}}</option>
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
                                            <option value="" selected> - Select - </option>
                                            @foreach ($users as $user)
                                            <option @if(old('user')==$user->name) selected @endif
                                                value="{{ $user->id }}">{{ $user->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="modalAddCardName">complaint</label>
                                    <input pattern="[A-Za-z0-9 ]{10,}" title="complaint must have at least 10 characters" required type="text" value="{{ old('complaint') }}" name="complaint" class="form-control" placeholder="Subject here" />
                                    <input type="hidden" name="case_type" value="3" />
                                </div>
                                <div class="col-12">
                                    <label for="exampleFormControlTextarea1" class="form-label">Case Sammary</label>
                                    <textarea required name="sammary" class="form-control" id="exampleFormControlTextarea1"
                                        rows="3">Cupcake ipsum dolor sit amet. Halvah cheesecake chocolate bar gummi bears cupcake. Pie macaroon bear claw. Soufflé I love candy canes I love cotton candy I love.
                                    </textarea>
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
            <!--/ Two Factor Auth Modal -->

  
        </div>
       @include('layouts.flash_message')
       
        <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Case number</th>
                  <th>Complaint</th>
                  <th>Plaintiff</th>
                  <th>Defendant</th>
                  <th>Authority</th>
                  <th>Status</th>
                  <th>Next Sitting</th>
                  <th>Manage</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php
                    $count = 1;
                @endphp
               @foreach ($cases as $case)
                   <tr>

                    <td>{{ $count }}</td>
                    <td>{{ $case->case_number }}</td>
                    <td>{{ $case->complaint }}</td>
                    <td>{{ $case->p_name }}
                    @if ($case->case_type != 1)
                    <span class="badge bg-label-warning me-2">Advocate</span>
                    @endif
                    </td>
                    <td>{{ $case->d_name }}
                      @if ($case->case_type != 2)
                      <span class="badge bg-label-warning me-2">Advocate</span>
                      @endif
                    </td>
                    <td>{{ $case->authority }}</td>
                    <td>
                      @if ($case->case_status == 'OPEN')
                      <span class="badge bg-label-info me-2">{{ $case->case_status }}</span>
                      @else
                      <span class="badge bg-label-danger me-2">{{ $case->case_status }}</span>
                      @endif
                    </td>
                    <td>{{ $case->sittingDay }}</td>
                    <td><a href="{{ route('cases.show',$case->id) }}" class="btn btn-sm btn-primary">Manage</button></td>
                   </tr>
                   @php
                       $count++;
                   @endphp
               @endforeach
              </tbody>
            </table>
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
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor.css') }}" />

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
<script src="{{ asset('assets/js/forms-editors.js') }}"></script>

@endsection
<script>
    function formatPhoneNumber(phone) {
        phone.value = phone.value.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
    }
</script>