@extends('layouts.dashboard')

@section('title', 'Edit Response Date | DIANNE')

@section('content')
    <div class="container-fluid" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

            <h3 style="text-align: center">Edit Response Date</h3>
                <div class="row justify-content-center">
                    <div class="card col-lg-6 text-center">
                        <form method="POST">
                            @csrf
                            <br>
                            <div class="form-group">
                                <h4>Response Date:</h4>
                                <br>
                                <input type="date" class="form-control" id="response_date" name="response_date"
                                    value="{{ $profiles->response_date }}"/>
                            </div>

                            <div class="form-group">
                                <a class="btn button_1" role="button" href="/guestlist">Back</a>
                                <button type="submit" class="btn button_1">Update Response Date</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection