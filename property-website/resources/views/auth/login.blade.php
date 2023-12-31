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
   <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="{{ asset('/loginss/assets/css/font-awesome.css')}}">
   <!-- ico-font-->
   <link rel="stylesheet" type="text/css" href="{{ asset('/loginss/assets/css/vendors/icofont.css')}}">
   <!-- Themify icon-->
   <link rel="stylesheet" type="text/css" href="{{ asset('/loginss/assets/css/vendors/themify.css')}}">
   <!-- Flag icon-->
   <link rel="stylesheet" type="text/css" href="{{ asset('/loginss/assets/css/vendors/flag-icon.css')}}">
   <!-- Feather icon-->
   <link rel="stylesheet" type="text/css" href="{{ asset('/loginss/assets/css/vendors/feather-icon.css')}}">
   <!-- Plugins css start-->
   <!-- Plugins css Ends-->
   <!-- Bootstrap css-->
   <link rel="stylesheet" type="text/css" href="{{ asset('/loginss/assets/css/vendors/bootstrap.css')}}">
   <!-- App css-->
   <link rel="stylesheet" type="text/css" href="{{ asset('/loginss/assets/css/style.css')}}">
   <link id="color" rel="stylesheet" href="{{ asset('/loginss/assets/css/color-1.css')}}" media="screen">
   <!-- Responsive css-->
   <link rel="stylesheet" type="text/css" href="{{ asset('/loginss/assets/css/responsive.css')}}">


</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

 <!-- login page start-->
 <div class="container-fluid">
    <div class="row">
      <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{ asset('/loginss/assets/images/login/3.jpg') }}" alt="looginpage"></div>
      <div class="col-xl-7 p-0">    
        <div class="login-card">
          <div>
            <div><a class="logo text-start" href="{{ url('/') }}"><img class="img-fluid for-light" src="{{ asset('admin/logo-image/image_2.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{ asset('/loginss/assets/images/logo/logo_dark.png') }}" alt="looginpage"></a></div>
            <div class="login-main"> 
           
                <form class="theme-form" method="POST" action="{{ route('login') }}">
                    @csrf
                <h4>Sign in to account</h4>
                <p>Enter your email & password to login</p>
                <div class="form-group">
                  <label class="col-form-label">Email Address</label>
                  {{-- <input class="form-control" type="email" required="" > --}}
                  <input id="email" type="email" placeholder="test@gmail.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="col-form-label">Password</label>
                  <div class="form-input position-relative">
                    {{-- <input class="form-control" type="password" name="login[password]" required="" > --}}
                    <input id="password" type="password" placeholder="*********" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="show-hide"><span class="show"></span></div>

                  </div>
                </div>
                <div class="form-group mb-0">
                  <div class="checkbox p-0">
                    <input id="checkbox1" type="checkbox">
                    <label class="text-muted" for="checkbox1">Remember password</label>
                  </div>
                  <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                </div>
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
                <h6 class="text-muted mt-4 or">Or Sign in with</h6>
                <div class="social mt-4">
                  <div class="btn-showcase">
                    <a class="btn btn-light" href="{{route('google.login')}}"><i style="color: #50598e ;" class="fa fa-google"></i> Google </a><a class="btn btn-light" href="{{ url('auth/facebook') }}"><i class="txt-fb" data-feather="facebook"></i>facebook</a></div>
                </div>
                <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="{{ url('/register') }}">Create Account</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
</div>

    <!-- latest jquery-->
    <script src="{{ asset('/loginss/assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('/loginss/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('/loginss/assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{ asset('/loginss/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- scrollbar js-->
    <!-- Sidebar jquery-->
    <script src="{{ asset('/loginss/assets/js/config.js')}}"></script>
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('/loginss/assets/js/script.js')}}"></script>
    <!-- login js-->
    <!-- Plugin used-->
</body>
</html>