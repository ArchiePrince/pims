<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
  <head>
             <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no, maximum-scale=1.0, user-scalable=no" >
	<link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/ico" />

    <title>{{ config('app.name', 'PIMS') }}</title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="login d-flex flex-column h-100" data-new-gr-c-s-check-loaded="14.1034.0" data-gr-ext-installed="">


  <!-- MAIN CONTENT BEGINS -->
  <main role="main" class="flex-shrink-0">
    <div class="container-fluid">
      <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-8 d-none d-md-flex bg-image"></div>


        <!-- The content half -->
        <div class="col-md-4 bg-light">
          <div class="login d-flex align-items-center py-5">

            <!-- Demo content-->
            <div class="container">
              <div class="row">
                <div class="col-lg-10 col-xl-9 mx-auto">
                  <p><a href="../"><img src="{{ asset('images/eugap3.png') }}" alt="EU GAP" width="180px"></a></p>
                  <h3 class="display-5">{{ __('Sign up') }}</h3>
                  <p class="text-muted mb-4">{{ __('New here? Signing up is easy. It only takes a few steps') }}</p>
                  <p class="errorMessage"></p>
                  <form method="POST" action="{{ route('register') }}" class="pt-3">
                    @csrf

                    <div class="form-group mb-3">
                      <input name="name" id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror rounded-pill border-0 shadow-custom px-4" value="{{ old('name') }}" autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group mb-3">
                      <input name="email" id="email" type="email" placeholder="Email address" class="form-control @error('email') is-invalid @enderror rounded-pill border-0 shadow-custom px-4" value="{{ old('email') }}" autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                     <div class="form-group mb-3">
                      <input name="username" id="username" type="text" placeholder="Username" class="form-control @error('username') is-invalid @enderror rounded-pill border-0 shadow-custom px-4" value="{{ old('username') }}" autocomplete="username" autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    {{--
                <div class="form-group">
                  <select class="form-control form-control-lg" id="exampleFormControlSelect2">
                    <option>Country</option>
                    <option>United States of America</option>
                    <option>United Kingdom</option>
                    <option>India</option>
                    <option>Germany</option>
                    <option>Argentina</option>
                  </select>
                </div> --}}

{{--                <div class="form-group mb-3">--}}
{{--                      <input name="u_dpt" id="u_dpt" type="text" placeholder="Department" class="form-control @error('u_dpt') is-invalid @enderror rounded-pill border-0 shadow-custom px-4" value="{{ old('u_dpt') }}" autocomplete="u_dpt" autofocus>--}}
{{--                                @error('u_dpt')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                </div>--}}


                    <div class="form-group mb-3">
                      <input name="password" id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror rounded-pill border-0 shadow-custom px-4 text-primary"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <div class="form-group mb-3">
                      <input name="password_confirmation" id="password-confirm" type="password" placeholder="Password Confirmation" class="form-control @error('password') is-invalid @enderror rounded-pill border-0 shadow-custom px-4 text-primary"   autocomplete="new-password">
                    </div>

                    <button name="submit" type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">{{ __('Register') }}</button>
                    <div class="text-center d-flex justify-content-between mt-4">
                      <p>Already have existing account?
                         @if (Route::has('login'))
                        <a href="{{ route('login') }}">{{ __('Login here!') }}</a>
                        @endif
                      </p>
                      <!-- error message -->
                    </div>
                  </form>
                </div>
              </div>
            </div><!-- End -->

          </div>
        </div><!-- End -->

      </div>
    </div>

  </main>
  </body>
</html>
