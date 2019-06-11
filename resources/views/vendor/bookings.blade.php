@extends('layouts.vendordashboard')

@section('title', 'Bookings | DIANNE')

@section('content')
    <div class="container" style="margin-top: 10%">
    <div class="row col-lg-offset-3">
        <div class="col-lg-12">
            @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>Soon-to-weds</th>
                            <th>Date and Time of Requested Appointment</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        @forelse($lists as $list)
                        <tr>
                            <td>{{ $list->bride_first_name }} {{ $list->bride_last_name }} & {{ $list->groom_first_name }} {{ $list->groom_last_name }}</td>
                            <td>{{ $list->date }} {{ $list->time }}</td>
                            <td>{{ $list->status }}</td>
                            <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#booking_details">Details</a></td>
                            <td><a href="/vendor/bookings/{{ Auth::id() }}/accept" class="btn btn-success btn-sm">Accept</a></td>
                            <td><a href="#" class="btn btn-danger btn-sm">Reject</a></td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="4">No requests found at the moment.</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal -->
    @if (!$lists->isEmpty())
    <div class="modal fade" id="booking_details" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="details">Booking Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @foreach($lists as $list)
                        <p><b>Clients: </b>{{ $list->bride_first_name }} {{ $list->bride_last_name }} & {{ $list->groom_first_name }} {{ $list->groom_last_name }}</p>
                        <p><b>Date and Time of Appointment: </b>{{ $list->date }} {{ $list->time }}</p>
                        <p><b>Details: </b>{{ $list->details }}</p>
                        <p><i>Requested at: </i> {{ $list->created_at }}</p>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection