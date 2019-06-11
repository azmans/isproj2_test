@extends('layouts.dashboard')

@section('title', 'Pay Vendor | DIANNE')

@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3>Pay Vendor</h3>
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <hr/>
                <form method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input type="number" min="0" max="9999999999.99" placeholder="0.00"/>
                    </div>

                    <div class="form-group">
                        <a class="btn btn-lg button_1" href="#" role="button">Pay with Paypal</a>
                    </div>
                </form>
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