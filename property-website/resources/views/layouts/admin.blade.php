<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('admin/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png') }}" type="image/x-icon">
    <title>@yield('title')</title>
   
 
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> --}}
    <!-- Google font-->


    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/feather-icon.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/datatables.css')}}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/date-picker.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('admin/assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/responsive.css') }}">

  <!-- sweetalert2 css-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- font-awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>


      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-YOUR-INTEGRITY-VALUE" crossorigin="anonymous" />

      {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"> --}}

    <style>
      .footer {
    
         padding: 2rem -0.5rem 6rem !important;
      }

      .ck-editor__editable[role="textbox"] {
                /* editing area */
                min-height: 200px;
            }
      
      </style>



{{-- datatable.net css --}}

{{-- Cke editor start  --}}
<style>
  #container {
      width: 1000px;
      margin: 20px auto;
  }
  .ck-editor__editable[role="textbox"] {
      /* editing area */
      min-height: 200px;
  }
  .ck-content .image {
      /* block images */
      max-width: 80%;
      margin: 20px auto;
  }


  .country_error {
      border: 2px solid red!important;
    }



    .error {
            border: 2px solid red;
        }
</style>
{{-- Cke editor end  --}}

    {{-- <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css> --}}

{{-- datatable.net css --}}




  </head>
  <body onLoad="startTime()">
    <div class="loader-wrapper">
      <div class="loader-index"><span></span></div>
      <svg>
        <defs></defs>
        <filter id="goo">
          <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
          <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
        </filter>
      </svg>
    </div>
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
 <!-- Page Header start   -->
        @include('layouts.backend.navbar')
         <!-- Page Header Ends   -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
 <!-- Page Sidebar start-->
        @include('layouts.backend.sidebar')
 <!-- Page Sidebar Ends-->
        <div class="page-body">
          
                {{-- <div class="container-fluid">        
                      <div class="page-title">
                                <div class="row">
                                          <div class="col-6">
                                            <h3>Default</h3>
                                          </div>
                                          <div class="col-6">
                                            <ol class="breadcrumb">
                                              <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                                              <li class="breadcrumb-item">Dashboard</li>
                                              <li class="breadcrumb-item active">Default      </li>
                                            </ol>
                                          </div>
                                </div>
                      </div>
                </div> --}}

            <main>
                @yield('content')
            </main>

     </div>
       
        @include('layouts.backend.footer')

      </div>
    </div>
   
    <!-- latest jquery-->
    <script src="{{ asset('admin/assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('admin/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('admin/assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- scrollbar js-->
    <script src="{{ asset('admin/assets/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('admin/assets/js/scrollbar/custom.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('admin/assets/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('admin/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart/chartist/chartist.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart/knob/knob.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart/knob/knob-chart.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('admin/assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dashboard/default.js') }}"></script>
    <script src="{{ asset('admin/assets/js/notify/index.js') }}"></script>
    <script src="{{ asset('admin/assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('admin/assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('admin/assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('admin/assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('admin/assets/js/typeahead-search/typeahead-custom.js') }}"></script>


    {{-- <script src="{{ asset('admin/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script> --}}
  
    <script src="{{ asset('admin/assets/js/product-list-custom.js')}}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>
 
    <script src="{{ asset('admin/assets/js/theme-customizer/customizer.js') }}"></script>
    <!-- login js-->
    <!-- Plugin used-->


{{-- datatable.net js --}}
{{-- 
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
  let table = new DataTable('#developer_table');


</script> --}}

{{-- datatable.net js --}}



<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

{{-- CKE Editor JS Start  --}}
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/super-build/ckeditor.js"></script>
{{-- CKE Editor JS END  --}}
<script src="{{ asset('admin/js/cke_editor.js') }}"></script>



    @yield('custom_js')
  </body>
</html>