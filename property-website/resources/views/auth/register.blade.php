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
    <title>Login</title>
   <!-- Google font-->
   <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="{{ asset('/logins/assets/css/font-awesome.css')}}">
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

   {{-- Login CSS END  --}}
  </head>
  <body>

     



      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

    <!-- login page start-->
    <div class="container-fluid p-0"> 
      <div class="row m-0">
        <div class="col-xl-7 p-0"><img class="bg-img-cover bg-center" src="{{ asset('/loginss/assets/images/login/1.jpg') }}" alt="looginpage"></div>
        <div class="col-xl-5 p-0"> 
          <div class="login-card">
            <div>
              <div><a class="logo" href="{{ url('/') }}"><img class="img-fluid for-light" src="{{ asset('admin/logo-image/image_2.png')}}" alt="looginpage"><img class="img-fluid for-dark" src="{{ asset('/loginss/assets/images/logo/logo_dark.png') }}" alt="looginpage"></a></div>
              <div class="login-main"> 
                <form class="theme-form" method="POST" action="{{ route('register') }}">
                  @csrf
           
                  <h4>Create your account</h4>
                  <p>Enter your personal details to create account</p>
                  <div class="form-group">
                    <label class="col-form-label pt-0">Name</label>
                    <div class="row g-2">
                      <div class="col-12">
                        <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                     
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Email Address</label>
                    <input id="email" type="email" placeholder="test@gmail.com"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password</label>
                    <div class="form-input position-relative">
                      <input id="password" type="password" placeholder="*********" class="form-control  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      <div class="show-hide"><span class="show"></span></div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Confirm Password</label>
                      <div class="form-input position-relative">
                        {{-- <input class="form-control" type="password" name="" required=""> --}}
                        <input id="password-confirm" type="password"  placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      
                      </div>
                    </div>
                  <div class="form-group mb-0">
                    <div class="checkbox p-0">
                      <input id="checkbox1" type="checkbox">
                      <label class="text-muted" for="checkbox1">Agree with<a class="ms-2" href="#">Privacy Policy</a></label>
                    </div>
                    <button class="btn btn-primary btn-block w-100" type="submit">Create Account</button>
                  </div>
                  <h6 class="text-muted mt-4 or">Or signup with</h6>
                  <div class="social mt-4">
                    <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="txt-fb" data-feather="facebook"></i>facebook</a></div>
                  </div>
                  <p class="mt-4 mb-0 text-center">Already have an account?<a class="ms-2" href="{{ url('/login') }}">Sign in</a></p>
                </form>
 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


        {{-- // Login JS Start  --}}
  
    <!-- latest jquery-->
    <script src="{{ asset('/loginss/assets/js/jquery-3.5.1.min.js')}}"></script>
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
  
  {{-- //   Login JS END  --}}

</body>
</html>
