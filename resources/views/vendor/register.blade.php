@extends('layouts.index')

@section('title', 'Vendor Sign Up | DIANNE')

@section('content')
<section class="main">
    <div class="container">
        <div class="row justify-content-center">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form action="{{ route('vendor.register') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <h3>Subscribe to be a Vendor</h3>
                <hr>
                <h5>Tell us about yourself</h5>
                <br>

                <div class="form-group row">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                    @error('first_name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                    @error('last_name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="password-confirm">Confirm Password</label>
                    <input name="password_confirmation" id="password-confirm" type="password" class="form-control" required>
                </div>

                <div class="form-group row">
                    <label for="mobile">Mobile Number</label>
                    <input type="text" id="mobile" name="mobile" min="10" max="11" pattern="[0-9]*" class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>

                    @error('mobile')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <br>
                <br>
                <hr>
                <h5>Tell us about your company</h5>
                <br>
                <br>

                <div class="form-group row">
                    <label for="company_name">Company Name</label>
                    <input type="text" id="company_name" name="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus>

                    @error('company_name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="vendor_type">Vendor Category</label>
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

                <div class="form-group row">
                    <label for="price_range">Price Range</label>
                    <select class="form-control" id="price_range" name="price_range" required>
                        <option>Budget</option>
                        <option>Midrange</option>
                        <option>Highend</option>
                    </select>
                </div>

                <div class="form-group row">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" maxlength="30" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}" required autocomplete="city" autofocus>
                        @error('city')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                </div>

                <div class="form-group row">
                    <label for="tin">TIN (Taxpayer Identification Number)</label>
                    <input type="text" id="tin" name="tin" class="form-control @error('tin') is-invalid @enderror" maxlength="15" value="{{ old('tin') }}" required placeholder="999-999-999-999" autocomplete="tin" autofocus>
                        @error('bir_number')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message('Please enter your TIN in the correct format (XXX-XXX-XXX-XXX).') }}</strong></span>
                        @enderror
                </div>

                <div class="form-group row">
                    <label for="dti_bn">SEC Number or DTI Business Name</label>
                    <input type="text" id="sec_dti_number" name="sec_dti_number" class="form-control @error('sec_dti_number') is-invalid @enderror" value="{{ old('sec_dti_number') }}" required autocomplete="sec_dti_number" maxlength="25" autofocus>

                    @error('sec_dti_number')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="mayors_permit">Mayor's Permit</label>
                    <input type="text" id="mayors_permit" name="mayors_permit" class="form-control @error('mayors_permit') is-invalid @enderror" value="{{ old('mayors_permit') }}" maxlength="20" required autocomplete="mayors_permit" autofocus>
                        @error('mayors_permit')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                </div>

                <div class="form-group row">
                    <label for="profile_picture">Profile Picture</label>
                    <input type="file" accept="image/png, image/jpeg, image/gif, image/jpg" id="profile_picture" name="profile_picture" class="form-control-file" accept="image/jpeg,image/x-png,image/gif">
                </div>

                <div class="row">
                    <div class="col-sm">
                        <button type="submit" class="button_1" value="Submit">Subscribe to be a Vendor</button>
                    </div>
                    <div class="col-sm">
                        <button type="reset" class="button_1" value="Reset">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
