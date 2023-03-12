<div class="card mb-2">
    <div class="card-body">
        <h5>Active Enrolments</h5>
        <div class="card-datatable table-responsive">
            <table class="datatables table">
                <thead>
                    <tr>
                        <th style="width: 3px;">#</th>
                        <th>Trainings</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                @php
                $count = 1;
                @endphp
                @forelse ($bookings as $booking)
                <tbody>
                    <tr>
                        <td>{{ $count }}</td>
                        <td><strong>{{ $booking->trains->title }}</strong><br>
                            <span class="badge bg-label-info me-2">Price</span>{{ $booking->trains->price }}
                            Rwf
                        </td>
                        <td>
                            @switch($booking->status)
                                @case(1)
                                     <span class="badge bg-label-primary me-2">Booking</span>
                                    @break
                                @case(2)
                                     <span class="badge bg-label-secondary me-2">Confirm</span>
                                    @break
                                @case(3)
                                     <span class="badge bg-label-warning me-2">Attending</span>
                                    @break
                                @case(4)
                                    <span class="badge bg-label-info me-2">Attended</span>
                                    @break
                                @default
                                    <span class="badge bg-label-warning me-2">N/A</span>
                            @endswitch

                        </td>
                        <td>
                            @if (in_array($booking->status, [3,4]))
                            <a href="{{ route('mytraings_detail' , $booking->training) }}"
                                class="btn btn-sm btn-primary"><i class='ti-xs ti ti-list me-1'></i></a>

                            @else
                          
                            <a href="" class="text-danger" data-bs-toggle="modal"
                                data-bs-target="#removetraion{{ $booking->id }}"><i
                                    class='ti-xs ti ti-trash me-1'></i></a>
                            <div class="modal modal-top fade" id="removetraion{{ $booking->id }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ route('book_remove') }}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="id" value="{{ $booking->id }}" />
                                            <input type="hidden" name="price" value="{{ $booking->price }}" />
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel2">Are you
                                                    sure you want Remove this ?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-label-secondary"
                                                    data-bs-dismiss="modal">no</button>
                                                <button type="submit" class="btn btn-danger">Yes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </td>

                    </tr>

                </tbody>
                @php
                $count++
                @endphp
                @empty
                <tr><td></td><td>No Active Enrollement Available</td></tr>
                @endforelse

            </table>
        </div>
    </div>
</div>
<div class="card invoice-preview-card">
    <div class="card-body">
        <h5>Attendances</h5>
        <div class="card-datatable table-responsive">
            <table class="datatables table">
                <thead>
                    <tr>
                        <th style="width: 3px;">#</th>
                        <th>Training & Attandance day</th>
                        <th style="width: 3px;"></th>
                    </tr>
                </thead>
                @php
                $count = 1;
                @endphp
                @forelse ($attendances as $attendance)
                <tbody>
                    <tr>
                        <td>{{ $count }}</td>
                        <td><strong>{{ $attendance->trains->title }}</strong><br>
                            {{ \Carbon\Carbon::parse($attendance->attendanceDay)->locale('fr')->format('F j, Y') }}
                        </td>
                        <td>
                            <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                data-bs-target="#makeAttendence{{ $attendance->id }}"><i
                                    class='ti-xs ti ti-check me-1'></i></a>
                                    <div class="modal fade" id="makeAttendence{{ $attendance->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                            <div class="modal-content p-3 p-md-5">
                                                <div class="modal-body">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                    <div class="text-center mb-4">
                                                        <h3 class="mb-2">Make Attandance </h3>
                                                    </div>
                                                    <form method="POST" class="row g-3" action="{{ route('makeAttendence') }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="training" value="{{ $attendance->training }}">
                                                        <div class="col-12">
                                                            <label class="form-label">Provide Your Voucher Number</label>
                                                            <input required type="number" name="voucher" class="form-control"
                                                                placeholder="01234567" />
                                                        </div>    
                                                        <div class="col-12 d-flex justify-content-center">
                                                            <button type="submit"
                                                                class="btn btn-primary waves-effect waves-light">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </td>

                    </tr>

                </tbody>
                @php
                $count++
                @endphp
                @empty
                <tbody>
                    <tr>
                        <td>

                        </td>
                        <td>
                            There is no Attandance list
                        </td>
                    </tr>
                </tbody>
                @endforelse

            </table>
        </div>
    </div>
</div>