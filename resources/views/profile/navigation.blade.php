<!-- Navbar pills -->
<div class="row">
    <div class="col-md-12">
      <ul class="nav nav-pills flex-column flex-sm-row mb-4">
        <li class="nav-item"><a class="nav-link {{ Request::routeIs('profile') ? 'active' : '' }}" href="{{ route('profile',$user_id) }}"><i class='ti-xs ti ti-user-check me-1'></i> General Info</a></li>
        <li class="nav-item"><a class="nav-link {{ Request::routeIs('user.discipline')  ? 'active' : '' }}" href="{{ route('user.discipline' ,$user_id) }}"><i class='ti-xs ti ti-users me-1'></i> Disciplinary Records</a></li>
        <li class="nav-item"><a class="nav-link {{ Request::routeIs('user.meeting-view')  ? 'active' : '' }}" href="{{ route('user.meeting-view' ,$user_id) }}"><i class='ti-xs ti ti-layout-grid me-1'></i> R.B.A Meetings</a></li>
        <li class="nav-item"><a class="nav-link" href="#"><i class='ti-xs ti ti-link me-1'></i> Legal Education</a></li>
        <li class="nav-item"><a class="nav-link" href="pages-profile-connections.html"><i class='ti-xs ti ti-gavel me-1'></i> Pro Bono Publico</a></li>
      </ul>
    </div>
  </div>
  <!--/ Navbar pills -->