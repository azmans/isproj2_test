@extends('layouts.dashboard')

@section('title', 'Guest List Manager | DIANNE')

@section('content')
    <div class="container-fluid" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
            <h3 style="text-align: center">Manage Guests</h3>
                <div class="row justify-content-center">
                    <div class="card col-lg-6">
                        @if(!$details->isEmpty())
                            @foreach($details as $detail)
                            <br>
                            <p>Response by Date: {{ $detail->response_date }}</p>
                            <br>
                            <p>Guests Attending:</p>
                            <p>Plus Ones:</p>
                            <p>Total Guests:</p>
                            <br>
                            <p>Did not RSVP:</p>
                            <p>Guests Not Attending:</p>
                            <a class="btn button-1" role="button" href="#">Edit Response Date</a>
                            @endforeach
                        @else
                                <br>
                                <p>Response by Date:</p>
                                <br>
                                <p>Guests Attending:</p>
                                <p>Plus Ones:</p>
                                <p>Total Guests:</p>
                                <br>
                                <p>Did not RSVP:</p>
                                <p>Guests Not Attending:</p>
                                <a class="btn button-1" role="button" href="/guestlist/{{ Auth::id() }}/response-date/add">Set Response Date</a>
                        @endif
                    </div>
                </div>
            <h4>Total Guests Listed</h4>
            <a role="button" class="btn button_1 float-right" href="/guestlist/{{ Auth::id() }}/meal">Set Meals</a>
            <a role="button" class="btn button_1 float-right" href="#">Add Guest</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>RSVP</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!$details->isEmpty())
                    <tr>
                        @foreach($details as $detail)
                        <td>{{ $detail->first_name }} {{ $detail->first_name }}</td>
                        <td>
                            @if ($detail->is_attending == 0)
                                Not Attending
                            @elseif ($detail->is_attending == 1)
                                Attending
                            @elseif (is_null($detail->is_attending))
                                Pending Response
                            @endif
                        </td>
                        <td><a href="#" class="btn btn-primary btn-sm">Details</a></td>
                        <td><a href="#" class="btn btn-primary btn-sm">Edit</a></td>
                        <td><a href="#" class="btn btn-danger btn-sm">Delete</a></td>
                        @endforeach
                    </tr>
                    @else
                    <tr>
                        <td colspan="4">You have not added any guests to your list yet.</td>
                    </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection