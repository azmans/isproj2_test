@extends('layouts.dashboard')

@section('title', 'Edit Profile | DIANNE')

@section('content')
    <div class="row col-lg-offset-3">
        <div class="col-lg-12">
            <div class="card">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

                <form method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-header">
                        <br>
                        <h5 class="card-title">My Profile</h5>
                    </div>

                    <div class="card-body">
                        <div class="form-group col-lg-5">
                            <label for="bride_first_name">Bride's First Name:</label>
                            <input type="text" class="form-control" id="bride_first_name" name="bride_first_name"
                                   value="{{ $profile->bride_first_name }}"/>
                        </div>

                        <div class="form-group col-lg-5">
                            <label for="bride_last_name">Bride's Last Name:</label>
                            <input type="text" class="form-control" id="bride_last_name" name="bride_last_name"
                                   value="{{ $profile->bride_last_name }}"/>
                        </div>

                        <div class="form-group col-lg-5">
                            <label for="groom_first_name">Groom's First Name:</label>
                            <input type="text" class="form-control" id="groom_first_name" name="groom_first_name"
                                   value="{{ $profile->groom_first_name }}"/>
                        </div>

                        <div class="form-group col-lg-5">
                            <label for="groom_last_name">Groom's Last Name:</label>
                            <input type="text" class="form-control" id="groom_last_name" name="groom_last_name"
                                   value="{{ $profile->groom_last_name }}"/>
                        </div>

                        <div class="form-group col-lg-5">
                            <label for="name">Getting Married on:</label>
                            <input type="date" class="form-control" id="wedding_date" name="wedding_date" placeholder="Wedding Date"
                                   value="{{ $profile->wedding_date }}">
                        </div>

                        <div class="form-group col-lg-5">
                            <div class="row">
                                <button type="submit" href="/dashboard/edit/{{ Auth::id() }}" class="btn button_1" id="updateProfile">Save Profile</button>
                            </div>
                            <div class="row">
                                <a class="btn button_1" href="/dashboard" id="cancel">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection