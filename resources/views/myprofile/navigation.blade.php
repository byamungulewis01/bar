<!-- Navbar pills -->
<div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills flex-column flex-sm-row mb-4">
        <li class="nav-item"><a class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class='ti-xs ti ti-user-check me-1'></i> General Info</a></li>
        <li class="nav-item"><a class="nav-link {{ Request::routeIs('mydiscipline') ? 'active' : '' }} {{ Request::routeIs('discipline_delails') ? 'active' : '' }}" href="{{ route('mydiscipline') }}"><i class='ti-xs ti ti-users me-1'></i> Disciplinary Records</a></li>
        <li class="nav-item"><a class="nav-link {{ Request::routeIs('mymeetings') ? 'active' : '' }}" href="{{ route('mymeetings') }}"><i class='ti-xs ti ti-layout-grid me-1'></i> R.B.A Meetings</a></li>
        <li class="nav-item"><a class="nav-link {{ Request::routeIs('mytraings') ? 'active' : (Request::routeIs('mytraings_detail') ? 'active' : '') }}" href="{{ route('mytraings') }}"><i class='ti-xs ti ti-link me-1'></i> Legal Education</a></li>
        <li class="nav-item"><a class="nav-link {{ Request::routeIs('myprobono') ? 'active' : '' }} {{ Request::routeIs('probono-details') ? 'active' : '' }}" href="{{ route('myprobono') }}"><i class='ti-xs ti ti-gavel me-1'></i> Pro Bono Publico</a></li>
        <li class="nav-item"><a class="nav-link" href=""><i class='ti-xs ti ti-gavel me-1'></i> Compliances</a></li>
      </ul>
    </div>
  </div>
  <!--/ Navbar pills -->