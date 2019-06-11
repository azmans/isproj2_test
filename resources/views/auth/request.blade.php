@extends('layouts.home')

@section('title', 'Request Booking | DIANNE')

@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

            <h3 style="text-align: center">Request a Booking</h3>
            <hr>
                <form method="POST" id="book_appointment" action="/request/profile/{{ $profile->id }}/book">
                 @csrf

                    <div class="form-group">
                        <label for="date">Date of Appointment</label>
                        <input class="form-control" type="date" id="date" name="date" required>
                    </div>

                    <div class="form-group">
                        <label for="time">Time of Appointment</label>
                        <input class="form-control" type="time" id="time" name="time" value="07:00" min="07:00" max="22:00" step="600" required>
                    </div>

                    <div class="form-group">
                        <label for="details">Details</label>
                        <br><textarea class="form-control" id="details" name="details" placeholder="Ex. Location, contact number..." rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <a href="/view/profile/{{ $profile->id }}" role="button" class="btn button_1">Back</a>
                        </div>
                        <div class="col-sm">
                            <button type="button" class="button_1" id="submit_request" data-toggle="modal" data-target="#confirm_booking">Request</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirm_booking" tabindex="-1" role="dialog" aria-labelledby="confirmation" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmation">Confirm Booking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to book this appointment with the following details?
                    <br>
                    <table class="table">
                        <tr>
                            <th>Date</th>
                        </tr>
                        <tr>
                            <td id="date1"></td>
                        </tr>
                        <tr>
                            <th>Time</th>
                        </tr>
                            <td id="time1"></td>
                        <tr>
                            <th>Details</th>
                        </tr>
                        <tr>
                            <td id="details1"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="submit" class="btn btn-success" href="/request/profile/{{ $profile->id }}/book">Book Appointment</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('#submit_request').click(function() {
            $('#date1').text($('#date').val());
            $('#time1').text($('#time').val());
            $('#details1').text($('#details').val());
        });

        $('#submit').click(function(){
            alert('Book this appointment');
            $('#book_appointment').submit();
        });
    </script>
@endsection