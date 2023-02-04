@extends('layouts.app')

@section('page_name')
Disciplene info
@endsection

@section('contents')
<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    <h4 class="fw-bold py-3 mb-5">
        <span class="text-muted fw-light">Disciplinary case /</span> Profile
    </h4>


    @include('myprofile.navigation')

    <!-- User Profile Content -->
    <!-- Basic Bootstrap Table -->
    <div class="card">
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
                    <th></th>
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
                      @if ($probono->status == 'OPEN')
                      <span class="badge bg-label-info me-2">{{ $probono->status }}</span>
                      @else
                      <span class="badge bg-label-danger me-2">{{ $probono->status }}</span>
                      @endif
        
                    </td>
                    <td>
                      {{ \Carbon\Carbon::parse($probono->hearing_date)->locale('fr')->format('F j, Y') }}
                    </td>
                    <td><a href="" class="btn btn-sm btn-primary">Details</a></td>
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

@endsection