@extends('layouts.dashboard')

@section('title', 'Booking Requests | DIANNE')

@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3>My Vendors</h3>
                <div class="table-responsive">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <table class="table">
                        <tr>
                            <th>Vendor</th>
                            <th>Date and Time</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @forelse ($lists as $list)
                            <tr>
                                <td>{{ $list->first_name }} {{ $list->last_name }}</td>
                                <td>{{ $list->date }} {{ $list->time }}</td>
                                <td>{{ $list->status }}</td>
                                <td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#booking_details">Details</a></td>
                                <td><a href="#" class="btn btn-danger btn-sm">Cancel Booking</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No appointments booked.</td>
                            </tr>
                        @endforelse
                    </table>
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
                    <table class="table">
                        <tr>
                            <th>Vendor Name:</th> <td>{{ $lists->first_name }} {{ $lists->last_name }}</td>
                        </tr>
                        <tr>
                            <th>Vendor Type:</th> <td>{{ $lists->vendor_type }}</td>
                        </tr>
                        <tr>
                            <th>Company:</th> <td>{{ $lists->company_name }}</td>
                        </tr>
                        <tr>
                            <th>Mobile:</th> <td>{{ $lists->mobile }}</td>
                        </tr>
                        <tr>
                            <th>Date and Time of Appointment:</th> <td>{{ $lists->date }} {{ $lists->time }}</td>
                        </tr>
                        <tr>
                            <th>Details:</th> <td>{{ $lists->details }}</td>
                        </tr>
                        <tr>
                            <td>Requested at: {{ $lists->created_at }}</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection