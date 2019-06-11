@extends('layouts.vendordashboard')

@section('title', 'Dashboard | DIANNE')

@section('content')
<div class="row col-lg-offset-3" style="margin-top: 5%">
    <div class="col-lg-12">
        <div class="card">
            @foreach($profiles as $profile)
                <div class="card-header">
                    <br>
                    <h5 class="card-title">{{ $profile->first_name }} {{ $profile->last_name }}</h5>
                    <p class="card-category">{{ $profile->email }}
                    <br>{{ $profile->mobile }}</p>
                </div>

                <div class="card-body">
                    <h5>{{ $profile->company_name }}</h5>
                    <p>Vendor Type: {{ $profile->vendor_type }}</p>
                    <p>{{ $profile->city }}</p>
                    <p>Price Range: {{ $profile->price_range }}</p>
                    <br>
                    <p>SEC/DTI Number: {{ $profile->sec_dti_number }}</p>
                    <p>TIN: {{ $profile->tin }}</p>
                    <p>Mayor's Permit: {{ $profile->mayors_permit }}</p>
                </div>

                <!--<div class="buttons btn-group flex-wrap">
                    <a href="/vendor/dashboard/edit/{{ $profile->id }}" class="button_1">Edit Profile</a>
                    <a href="#" class="button_1">Delete Profile</a>
                </div>-->

                <div class="profile-picture">
                    <img class="profile-pic img-responsive" id="vendorprofilepic" src="/storage/images/{{ $profile->profile_picture }}">

                    <div class="buttons row">
                        <a href="/dashboard/edit/{{ $profile->id }}" class="btn button_1">Edit Profile</a>
                    </div>
                </div>

                @endforeach
        </div>
    </div>
</div>
@endsection