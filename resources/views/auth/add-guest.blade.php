@extends('layouts.home')

@section('title', 'Add Guest | DIANNE')

@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

            <h3 style="text-align: center">Add a Guest</h3>
            <hr>
                <form method="POST" action="#">
                 @csrf

                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input class="form-control" type="text" id="first_name" name="first_name" required>
                    </div>

                    <div class="form-group">
                        <label for="time">Last Name</label>
                        <input class="form-control" type="text" id="last_name" name="last_name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>

                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <a href="/guestlist" role="button" class="btn button_1">Back</a>
                        </div>
                        <div class="col-sm">
                            <button type="submit" class="btn button_1">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection