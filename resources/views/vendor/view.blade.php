@extends('layouts.home')

@section('title', 'Soon To Wed Profile | DIANNE')

@section('content')
    <section id="profile">
        <div class="col-sm-8 main-section container">
            <div class="profile-container">
                <div class="content">
                    <br>
                    <h4>Soon-to-Wed's Profile</h4>
                    <br>
                    <br>
                    <p>{{ $profile->bride_first_name }} {{ $profile->bride_last_name }}</p>
                    <p>&</p>
                    <p>{{ $profile->groom_first_name }} {{ $profile->groom_last_name }}</p>
                    <p>Getting Married on: {{ $profile->wedding_date }}</p>
                </div>

                <!-- make photo mobile responsive-->
                <div class="profile-picture">
                    <img class="profile-pic img-responsive" src="/storage/images/{{ $profile->profile_picture }}">
                </div>
                <div class="stwbuttons">
                    <a href="#">
                        <button type="submit" class="button_1" value="Submit">Add to Clients</button>
                    </a>
                    <a href="#">
                        <button type="submit" class="button_1" value="Submit" id="chatbutton">Chat</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection