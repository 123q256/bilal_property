<!-- Header start  -->
<div class="first_main_row">
  <div class="container test_contain">
    
      <div class="row">
          <div class="col-md-6  header_call">
              <ul>
                  <li><a href="#">Whatsapp/Call</a></li>
                  <li><a href="#">+341235487695</a></li>
              
              </ul>
          </div>
          <div class="col-md-6  test_contain_two">
              <ul>
                @guest
                    @if (Route::has('login'))
                        <li >
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else

            
                
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div style=" position: relative!important; z-index: 999!important;" class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a style="color: #000000" class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                  <li><a class="b_sec_icons" href="#"><i class="bi bi-person"></i></a></li>
                  <!-- <li><a   class="b_iconses"  href="#"><i class="bi bi-search"></i></a></li> -->
                
                  <li><a href="#" ><i class="bi bi-building"></i>&nbsp;All Projects</a></li>
                  
              </ul>
             
           
                
                
            
          </div>
      </div>

</div>
</div>





<div class="second_main_row">
  <div class="container">
     
      <div class="row">
          <div class="col-md-12">



            

            <div class="container" id="pakistancontainer">
                <div class="logo">
                 <a href="{{ url('/') }}"><img src="{{asset("logo-image/image_2.png")}}" width="80%" alt="Logo"></a> 
                </div>
                <div class="menu">
                  <div class="mobile-icon" onclick="toggleMenu()">&#9776;</div>
                  <ul class="menu-list" id="menuList">
                    <li><a  class="b_sub_menus" href="{{ url('/') }}">Home</a></li>
                    <li><a class="b_sub_menus"  href="{{ url('/developers') }}">Developers</a></li>
                    <li><a  class="b_sub_menus" href="#">Project Area</a></li>
                    <li><a class="b_sub_menus"  href="{{ url('/propert_types') }}">Property Types</a></li>
                    <li><a class="b_sub_menus"  href="{{ url('/contacts') }}">Contact Us</a></li>
                  </ul>
                  <div class="close-btn" id="closeBtn" onclick="closeMenu()"></div>
                </div>
              </div>
            

         
              {{-- <nav class="navbar navbar-expand-lg navbar-light" style="margin-bottom: -30px;margin-top:-20px;">

                  <a class="navbar-brand" href="{{ url('/') }}"><img src="{{asset("logo-image/image_2.png")}}" alt="Property-website-Logo" width="80%"></a>
              
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                   aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                
                  <div class="collapse navbar-collapse justify-content-end navbae_set" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0"  style="text-align: center;" >
                      <li class="nav-item">
                          <a class="nav-link b_sub_menus"  href="{{ url('/') }}">Home</a>
                        </li>
                                    <!-- Authentication Links -->
           
                        <li class="nav-item">
                          <a class="nav-link b_sub_menus" href="{{ url('/developers') }}">Developers</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link b_sub_menus" href="#">Project Area</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link b_sub_menus"  href="{{ url('/propert_types') }}">Property Types</a>
                        </li>
                        <li style="padding-right: 45px;" class="nav-item">
                          <a class="nav-link b_sub_menus"  href="{{ url('/contacts') }}">Contact Us</a>
                        </li>
                    </ul>
                 
            
                    
                  </div>
                  
                </nav>  --}}
  
          </div>
      </div>
  
</div>
</div>
<!-- Header End  -->