<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <title>Cuba - Premium Admin Template</title>
    <!-- Google font-->

   <!-- Google font-->
   <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="{{ asset('loginss/assets/css/font-awesome.css')}}">
   <!-- ico-font-->
   <link rel="stylesheet" type="text/css" href="{{ asset('loginss/assets/css/vendors/icofont.css')}}">
   <!-- Themify icon-->
   <link rel="stylesheet" type="text/css" href="{{ asset('loginss/assets/css/vendors/themify.css')}}">
   <!-- Flag icon-->
   <link rel="stylesheet" type="text/css" href="{{ asset('loginss/assets/css/vendors/flag-icon.css')}}">
   <!-- Feather icon-->
   <link rel="stylesheet" type="text/css" href="{{ asset('loginss/assets/css/vendors/feather-icon.css')}}">
   <!-- Plugins css start-->
   <link rel="stylesheet" type="text/css" href="{{ asset('loginss/assets/css/vendors/scrollbar.css')}}">
   <!-- Plugins css Ends-->
   <!-- Bootstrap css-->
   <link rel="stylesheet" type="text/css" href="{{ asset('loginss/assets/css/vendors/bootstrap.css')}}">
   <!-- App css-->
   <link rel="stylesheet" type="text/css" href="{{ asset('loginss/assets/css/style.css')}}">
   <link id="color" rel="stylesheet" href="{{ asset('loginss/assets/css/color-1.css')}}" media="screen">
   <!-- Responsive css-->
   <link rel="stylesheet" type="text/css" href="{{ asset('loginss/assets/css/responsive.css')}}">


   
  </head>
  <body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

<div class="page-wrapper">
    <div class="container-fluid p-0">
      <div class="row">
        <div class="col-12">     
          <div class="login-card">
            <div>
              <div><a class="logo" href="{{ asset('/') }}"><img class="img-fluid for-light" src="{{ asset('admin/logo-image/image_2.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{ asset('admin/logo-image/image_2.png')}}" alt="looginpage"></a></div>
              <div class="login-main"> 
               
                    <form  class="theme-form" method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                  <h4>Reset Your Password</h4>
                 
                  <div class="form-group">
                  <h6 class="mt-4">Create Your Password</h6>
                  <div class="form-group">
                    <label class="col-form-label">{{ __('Email Address') }}</label>
                    <div class="form-input position-relative">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                   
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password"  class="col-form-label">New Password</label>
                    <div class="form-input position-relative">
                      {{-- <input class="form-control" type="password" name="login[password]" required="" placeholder="*********"> --}}
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                     
                      <div class="show-hide"><span class="show"></span></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password-confirm" class="col-form-label ">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password"  class="form-control" name="password_confirmation" required autocomplete="new-password">
                 
                </div>

                  <div class="form-group mb-0 mt-3">
                   
                    <button class="btn btn-primary btn-block w-100" type="submit">{{ __('Reset Password') }} </button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

    <!-- latest jquery-->
    <script src="{{ asset('/loginss/assets/js/jquery-3.5.1.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('/loginss/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('/loginss/assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{ asset('/loginss/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- scrollbar js-->
    <script src="{{ asset('/loginss/assets/js/scrollbar/simplebar.js')}}"></script>
    <script src="{{ asset('/loginss/assets/js/scrollbar/custom.js')}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('/loginss/assets/js/config.js')}}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('/loginss/assets/js/sidebar-menu.js')}}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('/loginss/assets/js/script.js')}}"></script>
    <!-- login js-->
    <!-- Plugin used-->

  </body>
  </html>