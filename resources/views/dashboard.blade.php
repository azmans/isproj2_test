@extends('layouts.dashboard')

@section('title', 'Dashboard | DIANNE')

@section('content')
<div class="row col-lg-offset-3">
    <div class="col-lg-12">
        <div class="card">
            @foreach($profiles as $profile)
            <div class="card-header">
                <br>
                <h5 class="card-title">My Profile</h5>
                <p class="card-category">{{ $profile->bride_first_name }} {{ $profile->bride_last_name }}</p>
                <p class="card-category">&</p>
                <p class="card-category">{{ $profile->groom_first_name }} {{ $profile->groom_last_name }}</p>
            </div>

            <div class="card-body" style="position:relative">
                <p>Getting Married on: {{ $profile->wedding_date }}</p>
            </div>

            <div class="card-footer">
                <img class="profile-pic img-responsive" src="storage/images/{{ $profile->profile_picture }}">

                <form method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="upload-pic">
                        <input type="file" accept="image/png, image/jpg, image/jpeg, image/gif" class="form-control-file" name="profile_picture" id="profile_picture">
                    </div>
                    <div class="row">
                        <button type="submit" class="btn button_1">Update Picture</button>
                    </div>
                </form>

                <div class="buttons row">
                    <a href="/dashboard/edit/{{ Auth::id() }}" class="btn button_1">Edit Profile</a>
                </div>
                <!--<div class="buttons row">
                    <a href="#" class="button_1">Delete Profile</a>
                </div>-->
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection