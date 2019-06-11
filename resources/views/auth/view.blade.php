@extends('layouts.home')

@section('title', 'Vendor Profile | DIANNE')

@section('content')
    <div class="container" style="margin-top: 10%">
        <section id="profile">
            <div class="col-sm-8 main-section container">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="profile-container">
                    <div class="left">
                        <div class="content" id="vendor-content">
                            <h4>Company Name: {{ $profile->company_name }}</h4>
                            <br>
                            <br>
                            <p>{{ $profile->first_name }} {{ $profile->last_name }}</p>
                            <p>{{ $profile->vendor_type }}</p>
                            <p>Price Range: {{ $profile->price_range }}</p>
                            <p>{{ $profile->city }}</p>
                        </div>

                        <div class="vendorbuttons">
                            <a href="#">
                                <button type="submit" class="viewportfolio" value="Submit">View Portfolio</button>
                            </a>
                            <form method="POST">
                                @csrf
                                <a href="/request/profile/{{ $profile->id }}" role="button" class="btn button_1">Request Booking</a>
                            </form>
                            <a href="#">
                                <button type="submit" class="paybutton" value="Submit">Pay Vendor</button>
                            </a>
                        </div>
                    </div>

                    <div class="right">
                        <div class="profile-picture">
                            <img class="profile-pic" id="vendor-pic" src="/storage/images/{{ $profile->profile_picture }}">
                        </div>

                        <div class="vendor_buttons">
                            <form method="POST" action="/save/profile/{{ $profile->id }}">
                                @csrf

                                <button type="submit" class="btn button_1">Save Vendor</button>
                            </form>
                            <a href="#">
                                <button type="submit" class="button_1" value="Submit">Chat</button>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="vendorratings">
                        <h1>Feedback</h1>
                        <div class="rate">
                            <h5>Overall Rating</h5>
                            <span class="stars">
                                    <span class="fa fa-star checked star"></span>
                                    <span class="fa fa-star checked star"></span>
                                    <span class="fa fa-star checked star"></span>
                                    <span class="fa fa-star star"></span>
                                    <span class="fa fa-star star"></span>
                                </span>
                        </div>

                        <div class="rate" id="value">
                            <h5>Value</h5>
                            <p>Value for money</p>
                            <span class="stars">
                                    <span class="fa fa-star checked star"></span>
                                    <span class="fa fa-star checked star"></span>
                                    <span class="fa fa-star checked star"></span>
                                    <span class="fa fa-star star"></span>
                                    <span class="fa fa-star star"></span>
                            </span>
                        </div>

                        <div class="rate" id="prompt">
                            <h5>Promptness</h5>
                            <p>Ability to cater/serve to</p>
                            <span class="stars">
                                    <span class="fa fa-star checked star"></span>
                                    <span class="fa fa-star checked star"></span>
                                    <span class="fa fa-star checked star"></span>
                                    <span class="fa fa-star star"></span>
                                    <span class="fa fa-star star"></span>
                        </span>
                        </div>

                        <div class="rate" id="prompt">
                            <h5>Quality</h5>
                            <p>Quality of product/service</p>
                            <span class="stars">
                                    <span class="fa fa-star checked star"></span>
                                    <span class="fa fa-star checked star"></span>
                                    <span class="fa fa-star checked star"></span>
                                    <span class="fa fa-star star"></span>
                                    <span class="fa fa-star star"></span>
                        </span>
                        </div>

                        <div class="rate" id="prompt">
                            <h5>Professionalism</h5>
                            <p>Attitude</p>
                            <span class="stars">
                                    <span class="fa fa-star checked star"></span>
                                    <span class="fa fa-star checked star"></span>
                                    <span class="fa fa-star checked star"></span>
                                    <span class="fa fa-star star"></span>
                                    <span class="fa fa-star star"></span>
                        </span>
                        </div>

                        <a href="#">
                            <button type="submit" class="button_1" value="Submit" id="leavereview">Leave Review</button>
                        </a>
                    </div>

                    <form method="POST">
                    @csrf
                        <a class="btn reportbutton" href="/report/profile/{{ $profile->id }}" role="button">Report Vendor</a>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection