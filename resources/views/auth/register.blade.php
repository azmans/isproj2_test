@extends('layouts.index')

@section('title', 'Soon-To-Wed Sign Up | DIANNE')

@section('content')
<section class="main">
    <div class="container">
        <div class="row justify-content-center">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <h3>Sign up as a Soon-to-Wed!</h3>
                <br>
                <h5>Tell us about yourself</h5>
                <br>

                <div class="form-group row">
                    <label for="bride_first_name">Bride's First Name</label>
                    <input type="text" id="bride_first_name" name="bride_first_name" class="form-control @error('bride_first_name') is-invalid @enderror" value="{{ old('bride_first_name') }}" maxlength="30" required autocomplete="bride_first_name" autofocus>

                    @error('bride_first_name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="bride_last_name">Bride's Last Name</label>
                    <input type="text" id="bride_last_name" name="bride_last_name" class="form-control @error('bride_last_name') is-invalid @enderror" value="{{ old('bride_last_name') }}" maxlength="30" required autocomplete="bride_last_name" autofocus>

                    @error('bride_last_name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="groom_first_name">Groom's First Name</label>
                    <input type="text" id="groom_first_name" name="groom_first_name" class="form-control" value="{{ old('groom_first_name') }}" maxlength="30" autocomplete="groom_first_name" autofocus>

                    @error('groom_first_name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="groom_last_name">Groom's Last Name</label>
                    <input type="text" id="groom_last_name" name="groom_last_name" class="form-control" value="{{ old('groom_last_name') }}" maxlength="30" autocomplete="groom_last_name" autofocus>

                    @error('groom_last_name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" minlength="8" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="password-confirm">Confirm Password</label>
                    <input name="password_confirmation" id="password-confirm" type="password" class="form-control" required>
                </div>

                <div class="form-group row">
                    <label for="dob">Date of Birth</label>
                    <input class="form-control" type="date" id="dob" name="dob" min="01-01-2001" required>

                    @error('dob')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message('You must be above 18 to register.') }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="wedding_date">Wedding Date</label>
                    <input class="form-control" type="date" id="wedding_date" name="wedding_date"  min="01-07-2019" required>
                    <p>*You can change this later</p>
                </div>

                <div class="form-group row">
                    <label for="profile_picture">Profile Picture</label>
                    <input type="file" accept="image/png, image/jpg, image/jpeg, image/gif" id="profile_picture" class="form-control-file @error('profile_picture') is-invalid @enderror" name="profile_picture" required>

                    @error('profile_picture')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-sm">
                        <button type="submit" class="button_1" value="Submit">Sign Up</button>
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
