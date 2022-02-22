<style type="text/css">
    .container{
        margin-top:10%
    }
    .login{
        font-family: ;
        font-size: 2rem;
        font-weight: 650;
    }
    .btn_color{
        background: #002F34;
        color: #ffffff;
    }
</style>
<form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                         <div class="col-md-12">
                            <label for="email" class="  text-md-end"><i class="fa fa-fw fa-envelope"></i>
                        Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            

                            <div class="col-md-12">
                                <label for="password" class=" text-md-end"><i class="fa fa-fw fa-key"></i>
                        Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-5 ">
                                 @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot  Password?') }}
                                    </a>
                                @endif

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn_color w-100">
                                    {{ __('Login') }}
                                </button>

                               
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12 text-center">
                               
                               @if (Route::has('register'))
                                Not A Member?
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                       <span class="font-weight-bold ">Signin</span>
                                    </a>
                                @endif
                               
                            </div>
                        </div>
                    </form>