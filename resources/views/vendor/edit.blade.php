@extends('layouts.dashboard')

@section('title', 'Edit Profile | DIANNE')

@section('content')
    <div class="row col-lg-offset-3">
        <div class="col-lg-12">
            <div class="card">
                <form method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-header">
                        <br>
                        <p class="card-category col-lg-5">
                        <label for="first_name">First Name:</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                               value="{{ $profile->first_name }}"/>
                        </p>

                        <p class="card-category col-lg-5">
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                               value="{{ $profile->last_name }}"/>
                        </p>

                        <p class="card-category col-lg-5">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   placeholder="Email" value="{{ $profile->email }}"/></p>

                        <p class="card-category col-lg-5">
                            <label for="mobile">Mobile:</label>
                            <input type="number" class="form-control" id="mobile" name="mobile"
                                   placeholder="Mobile" value="{{ $profile->mobile }}"/></p>
                    </div>

                    <div class="card-body">
                        <div class="form-group col-lg-5">
                            <label for="name">Company Name:</label>
                            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name"
                                   value="{{ $profile->company_name }}">
                        </div>

                        <div class="form-group col-lg-5">
                            <label for="vendor_type">Vendor Type:</label>
                            <select class="form-control" id="vendor_type" name="vendor_type" required>
                                <option>Bar Service</option>
                                <option>Beauty Salon</option>
                                <option>Bridal Salon</option>
                                <option>Catering Service</option>
                                <option>Decor</option>
                                <option>Entertainment</option>
                                <option>Florist</option>
                                <option>Invitations</option>
                                <option>Jewelers</option>
                                <option>Photographer</option>
                                <option>Transportation</option>
                                <option>Venue</option>
                                <option>Wedding Favors</option>
                                <option>Wedding Planners</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-5">
                            <label for="city">City:</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="City"
                                   value="{{ $profile->city }}">
                        </div>

                        <div class="form-group col-lg-5">
                            <label for="price_range">Price Range:</label>
                            <select class="form-control" id="price_range" name="price_range" required>
                                <option>Budget</option>
                                <option>Midrange</option>
                                <option>Highend</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-5">
                            <label for="profile_picture">Update Profile Picture:</label>
                            <input type="file" accept="image/png, image/jpg, image/jpeg, image/gif" class="form-control-file" name="profile_picture" id="profile_picture">
                        </div>

                        <div class="buttons btn-group btn-group-justified">
                            <button type="submit" class="button_1" id="updateProfile">Save Profile</button>
                            <a class="button_1" href="/vendor/dashboard">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection