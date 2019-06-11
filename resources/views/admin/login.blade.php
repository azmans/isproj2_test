@extends('layouts.index')

@section('content')
    <section id="login">
        <div class="col-sm-8 main-section container">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="/img/diannelogo.png" width="70" height ="70" alt="Dianne Logo" href="index">
                </div>
                <br>
                <h2>Admin Login</h2>
                <br>
                <form action="{{ route('admin.login') }}" class="col-12" method="POST">
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
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <center><div class="g-recaptcha" id="recaptcha" data-sitekey="6LcFFagUAAAAAAUNiiiwLXHqUS9DHY1raXDXTmFq">
                             data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
                            </div></center>
                    </div>

                    <br>
                    <div class="row">
                        <button type="reset" class="button_1" value="Reset" id ="resetLogin">Reset</button>
                    </div>
                    <div class="row">
                        <button type="submit" class="button_1" value="Submit" id="formLogin">Login</button>
                    </div>

                    <div class="col-12 forgot">
                        @if (Route::has('admin.password.request'))
                            <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        var _captchaTries = 0;
        function recaptchaOnload() {
            _captchaTries++;
            if (_captchaTries > 9)
                return;
            if ($('.g-recaptcha').length > 0) {
                grecaptcha.render("recaptcha", {
                    sitekey: '6LcFFagUAAAAAAUNiiiwLXHqUS9DHY1raXDXTmFq',
                    callback: function() {
                        console.log('recaptcha callback');
                    }
                });
                return;
            }
            window.setTimeout(recaptchaOnload, 1000);
        }
    </script>
@endsection
