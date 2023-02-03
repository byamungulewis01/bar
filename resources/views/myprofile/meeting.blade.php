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
                  <th>Meeting</th>
                  <th>Date</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Venue</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php
                $count = 1;
                @endphp
                @foreach ($meetings as $meeting)
      
                <tr>
                  <td>{{ $count }}</td>
                  <td>{{ $meeting->title }} <br>
                    <span>
                      <strong>credit</strong> <span class="badge bg-label-warning me-2">{{ $meeting->credits }}</span>
                    </span>
      
                  </td>
                  <td>{{ \Carbon\Carbon::parse($meeting->date)->locale('fr')->format('F j, Y') }}</td>
                  <td>
                    {{ $meeting->start }}
                  </td>
                  <td>{{ $meeting->end }}</td>
                  <td>{{ $meeting->venue }}</td>
                  <td>
                    @if ($meeting->published == 1)
                    <span class="badge bg-label-warning me-2">Published</span>
      
                    @else
                    <span class="badge bg-label-info me-2">Not Published</span>
                    @endif
      
                  </td>
      
                </tr>
            
      
                @php
                $count++
                @endphp
      
                <div class="modal modal-top fade" id="delete{{ $meeting->id }}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                      <form action="{{ route('marital.delete') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="meeting" value="{{ $meeting->id }}" />
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel2">Are you sure to delete? {{ $meeting->id }}</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-dark">Yes, Delete</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                
                @endforeach
      
      
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