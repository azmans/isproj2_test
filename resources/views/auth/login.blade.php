@extends('layouts.index')

@section('title', 'Soon-to-wed Login | DIANNE')

@section('content')
<section id="login">
    <div class="col-sm-8 main-section container">
        <div class="modal-content">
            <div class="col-12 user-img">
                <img src="img/diannelogo.png" width = "70" height = "70" alt="Dianne Logo" href="index">
            </div>
                <br>
                <h2>Login</h2>
                <br>
            <form action="{{ route('login') }}" class="col-12" method="POST">
                    @csrf

                <div class="form-group">
                    <input type="text" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                </div>

                <div class="form-group">
                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>
                </div>

                <br>
                <div class="row">
                    <button type="reset" class="button_1" value="Reset" id ="resetLogin">Reset</button>
                </div>
                <div class="row">
                    <button type="submit" class="button_1" value="Submit" id="formLogin">Login</button>
                </div>


                <!--<div class="col-12 forgot">
                    @if (Route::has('auth.password.request'))
                        <a class="btn btn-link" href="{{ route('auth.password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>-->
            </form>
        </div>
    </div>
</section>
@endsection