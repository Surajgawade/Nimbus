<!DOCTYPE html>
<html lang="en">

<head>
  <title>{{ config('app.name') }} || Login Page</title>
  @include('admin.layouts.head')

</head>

<body>
      <div class="main-wrapper login-body">
         <div class="login-wrapper">
            <div class="container">
               <img class="img-fluid logo-dark mb-2" src="{{asset('public/backend/images/logo.png')}}" alt="Logo">
               <div class="loginbox">
                  <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Login</h1>
                        <p class="account-subtitle">Access to our dashboard</p>

                          <form class="user"  method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                              <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..."  required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                              <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password"  name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                            </div>
                            <div class="form-group">
                              <div class="row">
                                  <div class="col-6">
                                          <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="cb1">
                                            <label class="custom-control-label" for="cb1">Remember me</label>
                                          </div>
                                  </div>
                                  <div class="col-6 text-end">
                                    @if (Route::has('password.request'))
                                        <a class="forgot-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                  </div>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-lg btn-block btn-primary w-100">
                              Login
                            </button>
                          </form>
                      
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <script src="{{asset('public/backend/js/jquery-3.6.0.min.js')}}"></script>
      <script src="{{asset('public/backend/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('public/backend/js/feather.min.js')}}"></script>
      <script src="{{asset('public/backend/js/script.js')}}"></script>
    
</body>

</html>
