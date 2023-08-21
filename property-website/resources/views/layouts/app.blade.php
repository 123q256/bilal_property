<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('front_end/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front_end/css/style_1.css') }}">
{{-- chat box css --}}

    <link rel="stylesheet" href="{{ asset('/front_end/css/chat_box.css') }}">
{{-- chat box css --}}

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

        <!-- Country code Dropdown css -->
        <link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css"/>
        <script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
         <!-- Country code Dropdown css -->
             <!-- Gallert Popup image   css -->
         <link rel="stylesheet" href="{{ asset('front_end/dist/simple-lightbox.css?v2.14.0') }}" />
        
             <!-- Gallert Popup image  css -->
    <!-- Scripts -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> --}}
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    {{-- css links in set in  header --}}
 <!-- YajraTable CSS Link Start -->
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
 <!-- YajraTable CSS Link Start -->

</head>


<style>




/* CLEARFIX */

.cf:before,
.cf:after {
    content: " ";
    display: table;
}

.cf:after {
    clear: both;
}

.cf {
    *zoom: 1;
}



/* ALL LOADERS */

.loader1122{
  width: 100px;
  /* height: 20px; */
  border-radius: 100%;
  position: relative;
  margin: 0 auto;

}

/* LOADER 4 */

#loader-4 span{
  display: inline-block;
  width: 20px;
  height: 20px;
  border-radius: 100%;
  background-color: #3498db;
  margin: 12px 5px;
  opacity: 0;
}

#loader-4 span:nth-child(1){
  animation: opacitychange 1s ease-in-out infinite;
}

#loader-4 span:nth-child(2){
  animation: opacitychange 1s ease-in-out 0.33s infinite;
}

#loader-4 span:nth-child(3){
  animation: opacitychange 1s ease-in-out 0.66s infinite;
}

@keyframes opacitychange{
  0%, 100%{
    opacity: 0;
  }

  60%{
    opacity: 1;
  }
}






    
    .chat_icon{
        position: fixed;
        right: 30px;
        bottom:15px;
        font-size: 45px;
        color: #f1f1f1;
        cursor: pointer;
        z-index: 1000;
    }

    .ctvaRE {

        display: flex;
        width: 6%;
        -moz-box-align: center;
        align-items: center;
        /* -moz-box-pack: center; */
        justify-content: center;
        transition: transform 0.1s ease 0s;
        /* animation: 0.4s ease 0s 1 normal forwards running fade-in; */
        border-radius: 60px;
        /* box-shadow: rgba(0, 0, 0, 0.06) 0px 1px 6px 0px, rgba(0, 0, 0, 0.16) 0px 2px 24px -5px; */
        background-color: rgb(37, 54, 79);
        }

        .ctvaRE:hover {
        transform: scale(1.05);
        }
    .chat_box{
           position: fixed;
        right: 30px;
        bottom: 85px;
        width: 400px;
        /* height: 80vh; */
        background: #dedede;
        z-index: 1000;
        /* transition: all 0.3s ease-out; */
        transform: scaleX(0);
        border: 1px solid #000000;
    }
    .chat_box.active{
    transform: scaleX(1);
    }
    .hidden{
        display: none!important;
    }
    .conv-form-wrapper textarea{
        height: 30px;
      
        overflow: hidden;
        resize: none;
    }
    #messages{
        padding: 20px;
    }
    
    /* {{-- scroll Top Start  --}} */
    .scroll-to-top {
      display: none;
      position: fixed;
      bottom: 20px;
      left: 20px;
      z-index: 999;
      cursor: pointer;
    }


    
    /* scroll Top END */
    
    .country_error {
      border: 2px solid red!important;
    }



    .error {
            border: 2px solid red;
        }





        /* {{-- Loader CSS Start  --}} */

    /* Styles for the spinner loading page */
#spinnerOverlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.849); /* Blurred background */
    display: none;
    z-index: 999;
  
}

.spinner {
    position: absolute;
    top: 50%;
    left: 46%;
  
 
 
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.loadingText {
    position: absolute;
    top: 62%;
    left: 52%; /* Adjust the left position to position the text on the right side of the spinner */
    transform: translate(-50%, -50%);
    color: #fff; /* Text color */
    font-size: 16px;
}


        /* {{-- Loader CSS END  --}} */


        div:where(.swal2-container) img:where(.swal2-image) {
  max-width: 100%;
  margin: -1em auto -2em!important;
}
.swal2-icon-success{
    width: 422px!important;;
}













.logo img {
  max-width: 100%;
}

.menu {
  display: flex;
  align-items: center;
  margin-left: auto;
}

.menu-list {
  display: flex;
  list-style: none;
  margin: 0;
  padding: 0;
  margin-right: 20px;
}

.menu-list li {
  margin-right: 20px;
}

.menu-list li:last-child {
  margin-right: 0;
}

.menu-list a {
  text-decoration: none;
  color: #333;
}

.mobile-icon {
  display: none;
  font-size: 24px;
  cursor: pointer;
  margin-right: 10px;
}

/* .close-btn {
  display: none;
  font-size: 24px;
  cursor: pointer;
}
.close-btn {
    display: none;
  } */

/* Media query for mobile view */

@media (max-width: 1090px) {
  .menu-list {
    display: none;
  }

  .mobile-icon {
    display: block;
  }
  .menu{
    float:right!important;
  }

 



  .menu-list.open {
    display: flex;
    flex-direction: column;
    position: absolute;
    top: 125px;
    left: 0;
    background-color: #f0f0f0;
    width: 100%;
    z-index: 2;
    padding: 20px;
  }


  .menu-list.open li {
    /* margin: 10px 0; */
    padding: 10px;
  }
  /* .menu-list{
    position: relative;
  } */
  .menu-list.open li:hover{
    background-color: #0367A6;
    border-radius: 10px;
    color: #ffffff!important;
  }

}



@media (max-width: 414px) {
.bit_color {
    height: 60vh!important;
}
}

@media (max-width: 428px) {
.bit_color {
    height: 60vh!important;
}
.Photo_Gallery_1 {
  float: left;
  margin-left: 57px!important;
}
.chat_box {
  position: fixed;
  right: 30px;
  bottom: 85px;
  width: 370px;
}
}

@media (max-width: 393px) {

.chat_box {
position: fixed;
right: 30px;
bottom: 85px;
width: 330px;
}

}

@media (max-width: 384px) {

  .chat_box {
  position: fixed;
  right: 30px;
  bottom: 85px;
  width: 330px;
}
}

@media (max-width: 375px) {
.bit_color {
    height: 60vh!important;
}
.Location_Map_1 {
  float: left;
  margin-left: 41px!important;
}
.Photo_Gallery_1 {
  float: left;
  margin-left: 66px !important;
}
.chat_box {
  position: fixed;
  right: 30px;
  bottom: 85px;
  width: 320px;
}
}
@media (max-width: 320px) {
.bit_color {
    height: 90vh!important;
}
.chat_box {
  position: fixed;
  right: 30px;
  bottom: 85px;
  width: 265px;
}
}

@media (max-width: 411px) {
.bit_color {
    height: 90vh!important;
}
}


@media (max-width: 1280px) {
.Payment_Plan_1 {
      float: left;
      margin-left: 41px;
    }
    }

    @media (max-width: 1025px) {
      .Location_Map_1 {
  float: left;
  margin-left: 65px!important;
}
.Photo_Gallery_1 {
  float: left;
  margin-left: 44px !important;
}
    }
    @media (max-width: 512px) {
.Location_Map_1 {
      float: left;
      margin-left: 51px;
    }
    }


@media (max-width: 680px) {

       
  .menu-list.open {
    display: flex;
    flex-direction: column;
    position: absolute;
    top: 220px;
    left: 0;
    background-color: #f0f0f0;
    width: 100%;
    z-index: 2;
    padding: 20px;
  }
    }

  
    @media (max-width: 412px) {
.Location_Map_1 {
    float: left;
    margin-left: 42px!important;
}
.Photo_Gallery_1 {
    float: left;
    margin-left: 62px !important;
}
}
  
@media (max-width: 320px) {

.Brochure_1 {
float: left;
margin-left: 16px!important;
}
.Floor_Plans_1 {
float: left;
margin-left: 52px!important;
}
.Location_Map_1 {
float: left;
margin-left: 17px!important;
}
.Photo_Gallery_1 {
float: left;
margin-left: 43px !important;
}
.Payment_Plan_1 {
float: left;
margin-left: 16px!important;
}
}

@media (max-width: 280px) {
  .Brochure_1 {
  float: left;
  margin-left: 65px!important;
}
.Floor_Plans_1 {
  float: left;
  margin-left: 72px!important;
}
.Location_Map_1 {
  float: left;
  margin-left: 67px!important;
}
.Photo_Gallery_1 {
  float: left;
  margin-left: 70px !important;
}
.Payment_Plan_1 {
  float: left;
  margin-left: 69px!important;
}
.chat_box {
    position: fixed;
    right: 30px;
    bottom: 85px;
    width: 230px;
}
}

#pakistancontainer{
    display: flex;
  align-items: center;

}


.setmainhover:hover{
  background-color: #0367A6;
    border-radius: 10px;
    padding: 10px;
    color: #ffffff!important;
}



/* Full-page modal */
.cl-popup-wrap {
  display: flex;
  align-items: center;
  justify-content: center;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.7);
  z-index: 9999;
}

/* Modal content */
.cl-popup-box {
  border-radius: 5px;
  max-width: 80%;
  max-height: 95%;
  overflow-y: auto;
  background-color: #ffffff;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.3s ease, visibility 0.3s ease;
}

/* Modal content visible when opened */
.cl-popup-box.active {
  opacity: 1;
  visibility: visible;
}

/* Close button */
.cl-popup-box-closer {
  position: absolute;
top: 0px;
right: 10px;
font-size: 50px;
color: #e61212;
cursor: pointer;
}

/* Additional styles for the modal title and content */
.cl-popup-box-title {
  padding: 10px;
  font-size: 18px;
  font-weight: bold;
}

.cl-popup-box-content {
  padding: 20px;
  font-size: 16px;
}


/* color: #666666;
  background-color: #f2f2f2;
} */
.cl-popup-box-title {
  font-size: 1.15em;
  line-height: 1.5;
  font-weight: bold;
  padding: 15px 25px;
  color: #666666;
  background-color: #f2f2f2;
}
.menus_radius{
  background-color: #0367A6;
  border-radius: 10px;

}
#menus_radius_id{
  color: #ffffff!important;
}

.wrapper-messages{
  margin-bottom: 65.6094px;
    max-height: 330.953px;
}
        </style>
<body>


    
<!-- Modal -->
<div class="cl-popup-wrap" style="display: none;">
    <div class="cl-popup-box" style="width: 72%!important;margin-top:1px;">
      <div class="cl-popup-box-h">
        <div class="cl-popup-box-title pl-3">
          REGISTER YOUR INTEREST
        </div>
        <div class="cl-popup-box-content">
          <!-- Your modal body content goes here -->
          <form id="interestform" method="post" onsubmit="submit_interest_form('interestform');"  action="{{ url('/interest_property_form') }}">
       @csrf
          <div class="form-group mt-2">
            <label class="mb-2" for="form_name"><strong>Full Name</strong></label>
            <input type="text" style="background-color: #f2f2f2;" name="interest_name" class="form-control" id="interest_name" aria-describedby="emailHelp" placeholder="Enter Full Name">
            <span id="info_one" style="color: red;display:none;">Required Field </span>
          </div>
          <input name="hide_phonesone" type="hidden" id="hide_abc"/> 
          <input name="property_id" type="hidden" id="property_hide_id"/> 
          <div class="form-group mt-2">
            <label class="mb-2" for="form_email"><strong>Email</strong></label>
            <input type="email" style="background-color: #f2f2f2;" name="interest_email" class="form-control" id="interest_email" aria-describedby="emailHelp" placeholder="Enter Your email">
            <span id="info_six" style="color: red;padding:15px;display:none;">Required Field </span>
            <span id="valid_email" style="color: red;padding:15px;display:none;">Please enter a valid email address </span>
         
          </div>
          <div class="form-group mt-2">
            <label class="mb-2" for="form_email"><strong>Phone</strong></label>
            <div class="mb-2" style="display: grid;">
              <input class="form-control" name="phone" type="text" id="phone"/> 
              <span id="show_three" style="color: red;display:none;">Required Field </span>
              <span id="valid_phone" style="color: red;padding:15px;display:none;">Enter Valid Phone No </span>
             

            </div>
          </div>
  
          <div class="form-group mt-2 mb-2">
            <label class="mb-2" for="language"><strong> Preferred Language</strong></label>
            <select style="background-color: #f2f2f2;" name="language" class="form-control" id="language">
                                <option value="">Preferred Language</option>
                                <option value="English">English</option>
                                <option value="Arabic">Arabic</option>
                                <option value="Russian">Russian</option>
                                <option value="Chinese">Chinese</option>
                                <option value="Hindi">Hindi</option>
                                <option value="Urdu">Urdu</option>
                                <option value="Spanish">Spanish</option>
                                <option value="Portuguese">Portuguese</option>
                                <option value="French">French</option>
                                <option value="Persian">Persian</option>
            </select>
            <span id="show_one" style="color: red;display:none;">Required Field </span>
          </div>
  
          <div class="form-group mt-2 mb-3">
            <label class="mb-2" for="exampleFormControlTextarea1"> <strong>Message</strong></label>
            <textarea style="background-color: #f2f2f2;" name="interest_message" class="form-control" id="interest_message" rows="3"></textarea>
            <span id="show_two" style="color: red;display:none;">Required Field </span>
          </div>
          
          <div style="margin: 7px;" class="d-flex justify-content-center align-items-center">
          <div class="g-recaptcha" data-sitekey="6Lff74knAAAAAIOleVZHS35Ltf9MObDyVYvGvj0S"></div><br>
         
          </div>
          <span class="mt-3" id="show_recaptcha_one" style="color: red;display:none;margin-left:232px;" >Recaptcha Is Required </span>
          <div class="form-group mt-2">
            <button type="submit" id="register" class="btn btn-primary w-100">Register Your Interest</button>
          </div>
  
         
  
        </form>
             
  
        </div>
      </div>
      <div class="cl-popup-box-closer">&times;</div>
    </div>
  </div>
  
  {{-- Form Model Popup Start  --}}
  

  




 
    {{-- Loader Start  --}}
    {{-- <button id="showSpinner">Show Spinner</button> --}}

    <!-- Spinner loading page -->
    <div id="spinnerOverlay"   style="flex-direction: column;justify-content: center; align-items: center; min-height: 100vh;" >
      <div class="spinner" id="loader-4">
        <span></span>
        <span></span>
        <span></span>
      </div>

      {{-- <div class="spinner"></div>
      <div class="loadingText" style="font-size: 25px;">Please Wait</div> --}}
      
    </div>
       {{-- Loader End  --}}



    {{-- scroll Top Start  --}}
    <a href="#" class="scroll-to-top">
        <i style="font-size: 45px;width:60px;height:60px;" class="bi bi-arrow-up-square-fill"></i>
      </a>
    {{-- scroll Top END  --}}


 {{-- chat box start  --}}
 <div class="chat_icon ctvaRE">
    {{-- <i class="fa-sharp fa-light fa-comments"></i> --}}
    <i class="bi bi-chat-dots-fill"></i>
</div>
<div class="chat_box" >



    <div class="conv-form-wrapper" style="overflow: hidden;">
    <form action="" id="msform" method="post" onsubmit="return submit_universal_form_chat('msform');"  class="hidden" >
  
        <select name="category" id="data_one" data-conv-question="Hello ! How I can help you.">
            <option value="I'm-an-investor">I'm an investor</option>
            <option value="I'm-an-investor">I'am an end-user</option>
        </select>
     

        <div data-conv-fork="category">
            <div data-conv-case="I'm-an-investor">
                 <input type="text" id="data_two" name="your_name" data-conv-question="May I ask your name?">
            </div>
            <div data-conv-case="I'm-an-investor">
                <input type="text" id="data_three" name="company_name" data-conv-question="Please, tell Me Your Company Name">
           </div>
         
        </div>
        <div data-conv-fork="category">
            <div data-conv-case="I'm-an-investor">
                <input data-conv-question="Type in your e-mail"  data-pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" id="email_name" type="email" name="email_name" required placeholder="What's your e-mail?">
            </div>
          
        </div>
        <div data-conv-fork="category">
            <div data-conv-case="I'm-an-investor">
                <input type="number" name="phone_no" id="data_four" data-conv-question="Please provide your phone number so we may proceed.">
            </div>
          
        </div>
       
        <select name="budget" id="data_five" data-conv-question=" Let us know a little bit about your budget. What is your preferred currency?">
           
            <option value="AED">AED</option>
            <option value="USD">USD</option>
            <option value="EUR">EUR</option>
            <option value="GBP">GBP</option>

        </select>


        <select name="investment" id="data_six" data-conv-question="Let us know your suitable investment range:">
            <option value="< AED 500k ">'<'AED 500k </option>
            <option value="AED 500K -1 Million">AED 500K -1 Million</option>
            <option value="AED 1-2 Million">AED 1-2 Million</option><br>
            <option value="AED 1-3.5 Million">AED 1-3.5 Million</option>
            <option value="AED 3.5-5 Million">AED 3.5-5 Million</option>
            <option value="AED 5 Million +">AED 5 Million +</option>
        </select>

        <select name="AED" id="data_seven" data-conv-question="What property type are you looking for?">
            <option value="Apartments">Apartments</option>
            <option value="Villas">Villas</option><br>
            <option value="Townhouses">Townhouses</option>
            <option value="Aplots">Aplots</option>
           
        </select>

        <select name="Apartments" id="data_eight" data-conv-question="Choose the number of bedrooms you'd like to get details of:">
            <option value="Studio">Studio</option>
            <option value="1 Bedroom">1 Bedroom</option><br>
            <option value="2 Bedroom">2 Bedroom</option>
            <option value="3 Bedroom">3 Bedroom</option>
            <option value="4 Bedroom">4 Bedroom</option>
            <option value="5 Bedroom +">5 Bedroom +</option>
           
        </select>
        <select name="Studio" id="data_nine" data-conv-question="How soon are you looking to buy a property?">
            <option value="Immediately">Immediately</option>
            <option value="1-2 mouths">1-2 mouths</option><br>
            <option value="3-6 mouths">3-6 mouths</option>
            <option value="I am just exploring options at this stage">I am just exploring options at this stage</option>
          
           
        </select>
        
        <select name="Immediately" id="data_ten" data-conv-question="Are you currently in Dubai?">
            <option value="Yes I am currently in Dubai">Yes, I am currently in Dubai?</option>
            <option value="No, but I am planing to visit soon">No, but I am planing to visit soon</option><br>
            <option value="No plans to visit Dubai at this stage">No plans to visit Dubai at this stage</option>
         
        </select>
        <select id="data_eleven" name="Yes I am currently in Dubai" data-conv-question="Do you have any specific requirements?">
            <option value="Yes">Yes</option>
            <option value="No">No</option><br>
        </select>


        <div data-conv-fork="Yes I am currently in Dubai">
            <div data-conv-case="Yes">
                <input id="data_twelve" type="text" name="details" data-conv-question="Please type below.">
            </div>
         
        </div>


      

        <select name="Yes, I am currently in Dubai?" data-conv-question="Thank You  for taking the time to answer our questions. Our consultant will be in touch with you shortly. For immediate assistance, please call +971 4 323 3609">
            <option id="subchat" value="Done">Done</option>
           
         
        </select>
     

   
    
 
    </form>
    </div>
  
</div>
{{-- chat box End  --}}


    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"> --}}
            {{-- <div class="container"> --}}
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> --}}
                {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}

                {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
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
                    </ul>
                </div> --}}
            {{-- </div> --}}
        {{-- </nav> --}}
        @include('layouts.frontend.header')


        <main class="py-2">
            @yield('content')
        </main>

        @include('layouts.frontend.footer')


    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script> --}}
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="{{ asset('front_end/js/script.js')}}"></script>

{{-- chat box js --}}
<script type="text/javascript" src="{{ asset('front_end/js/jquery-3.1.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front_end/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('front_end/js/jquery-git.js') }}"></script>
{{-- chat box js --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- All Working  YajraTable  Start -->

  <!-- YajraTable JS Link Start -->
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<!-- YajraTable JS Link Start -->

<script>
 $(document).ready(function() {
    let table = new DataTable('#myTable')
  

 });


</script>

<!-- All Working  YajraTable  End -->

<script>
        
    $(document).ready(function(){
$("#list").click(function(){
$("#products").hide();
 $(".products_flex").show();


});
})
;$(document).ready(function(){
$("#grid").click(function(){
$(".products_flex").hide();
$("#products").show();



});
});


$(document).ready(function(){
  // $('#spinnerOverlay').hide();
// alert('ff');
    setTimeout(function() {
        // Use the slideUp() method to hide the div with an animation effect
        $('#message_bilal').slideUp('slow');
    }, 7000);
    setTimeout(function() {
        // Use the slideUp() method to hide the div with an animation effect
        $('#message_bilal_two').slideUp('slow');
    }, 7000);


});




    </script>


    {{-- /* scroll Top Start */ --}}
    <script>
        window.addEventListener('scroll', function() {
  var scrollButton = document.querySelector('.scroll-to-top');
  if (window.pageYOffset > 20) {
    scrollButton.style.display = 'block';
  } else {
    scrollButton.style.display = 'none';
  }
});

document.querySelector('.scroll-to-top').addEventListener('click', function(e) {
  e.preventDefault();
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
});

    </script>
    {{-- /* scroll Top END */ --}}



 <!-- Country code Dropdown js-->
 <script defer>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        separateDialCode: true,
        excludeCountries: ["in", "il"],
        preferredCountries: ["pk", "ru", "jp", "no"]
    });
</script>
 <!-- Country code Dropdown js-->
  <!-- Country code Dropdown js-->
  <script defer>
    var input = document.querySelector("#phone_two");
    window.intlTelInput(input, {
        separateDialCode: true,
        excludeCountries: ["in", "il"],
        preferredCountries: ["pk", "ru", "jp", "no"]
    });
</script>
 <!-- Country code Dropdown js-->

 <!-- gallery images show -->
 <script src="{{ asset('front_end/dist/simple-lightbox.js?v2.14.0') }}"></script>
 <script>
     (function() {
         var $gallery = new SimpleLightbox('.gallery a', {});
     })();
 </script>

    <!-- gallery images show -->


    
 {{-- Insert the record of ChatBox User Start  --}}
 <script>
    function submit_universal_form_chat(id){
        event.preventDefault();
        var formElem = $("#"+id);
        console.log(formElem);
        $('#spinnerOverlay').show();
        var formData = new FormData(formElem[0]);
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'))

        console.log(formData);
        
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            async: true,
            type: 'post',
            url: "{{ url('/chatbox_data')}}" ,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(response) {
              
                if (response.status == 200) {
                    
                    $('.chat_box').hide();
                    $('#spinnerOverlay').hide();
                    Swal.fire({
                    imageUrl: '{{asset("logo-image/image_2.png")}}',
              imageWidth: 300, // Adjust the width of the image
              imageHeight: 100, 
              title: 'Good job!',
              text: 'Information Add Successfuly',
           
              icon: 'success',
           
              imageAlt: 'Custom image' // Replace this with an appropriate alt text for the image
            }).then(function() {
                            if (response.redirectURL) {
            // Redirect to the specified page
            window.location.href = response.redirectURL;
        }
								});
                }




            }
        });
        return false;
    }
</script>

{{-- interest Property Form Insert data Start --}}
<script>
$('#register').click(function() {
              var interest_name = document.getElementById("interest_name");
              var interest_email = document.getElementById("interest_email");
              var phone = document.getElementById("phone");
              var language = document.getElementById("language");

        var interest_message = document.getElementById("interest_message");

        if (interest_name.value === "") {
            $('#info_one').show();
            interest_name.classList.add("country_error");
            interest_name.focus();

        
        return false;
        }else{

        $('#info_one').hide();
        $("#interest_name").removeClass("country_error");
        } 

        if (interest_email.value === "") {
                // alert("Please select an option.");
                $('#info_six').show();
                $('#valid_email').hide();
                interest_email.classList.add("country_error");
                interest_email.focus();
                 
                 return false;
              }else{
                var email = $("#interest_email").val();
                     var emailRegex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
        
                    if (!emailRegex.test(email)) {
                        $('#info_six').hide();
                        $('#valid_email').show();
                        interest_email.classList.add("country_error");
                        interest_email.focus();
                    
                           
                     return false;
                     }
                 
                     $('#info_six').hide();
                     $('#valid_email').hide();
                $("#interest_email").removeClass("country_error")
              }
          

              if (phone.value === "") {
            $('#show_three').show();
            phone.classList.add("country_error");
            phone.focus();
                
            return false;
          }else{

            if (!$.isNumeric(phone.value)) {
        // alert("Please enter a valid number.");
        $('#valid_phone').show();
        $('#show_three').hide();
        phone.classList.add("country_error");
        phone.focus();
              
        return false;
        }
        $('#valid_phone').hide();
            $('#show_three').hide();
            
            $("#phone").removeClass("country_error");
          }

          if (language.value === "") {
     // alert("Please select an option.");

     $('#show_one').show();
     language.classList.add("country_error");
     language.focus();
   
              
        return false;
      }else{
        
        $("#language").removeClass("country_error");
        $('#show_one').hide();
      }


      if (interest_message.value === "") {

        $('#show_two').show();
        interest_message.classList.add("country_error");
        interest_message.focus();
              
        return false;
        }else{
        $('#show_two').hide();
        
        $("#interest_message").removeClass("country_error");
        }



});
</script>




{{-- iti__selected-dial-code --}}

 <script>
  function submit_interest_form(id){



      event.preventDefault();
      var formElem = $("#"+id);
      console.log(formElem);


    var set_phon = $('.iti__selected-dial-code').text();
    //alert(set_phon);
      $('#hide_abc').val(set_phon);
       $('#spinnerOverlay').show();
      //alert('hel');
      var formData = new FormData(formElem[0]);
      formData.append('_token', $('meta[name="csrf-token"]').attr('content'))

      console.log(formData);
      // return false;
      $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });
      $.ajax({
          async: true,
          type: 'post',
          url: "{{ url('/interest_property_form')}}" ,
          data: formData,
          cache: false,
          processData: false,
          contentType: false,
          success: function(response) {

            if (response.status == 100) {
              $('#spinnerOverlay').hide();
             
              $('#show_recaptcha_one').show();

            }

            
              if (response.status == 200) {
                $(".cl-popup-wrap").hide();
                  $('#spinnerOverlay').hide();
                  Swal.fire({
                  imageUrl: '{{asset("logo-image/image_2.png")}}',
            imageWidth: 300, // Adjust the width of the image
            imageHeight: 100, 
            title: 'Good job!',
            text: 'Form is submitted Successfully',
         
            icon: 'success',
         
            imageAlt: 'Custom image' // Replace this with an appropriate alt text for the image
          }).then(function() {
            $('#interestform')[0].reset();
            $('#phone').val('');

            location.reload();
								});
              }




          }
      });
   
  }
</script>

{{-- interest Property Form Insert data End --}}


{{-- interest Property Form Two Insert data Start --}}

<script>
     $('#phone_two').val('');
  function submit_interest_form_two(id){



      event.preventDefault();
      var formElem = $("#"+id);
      console.log(formElem);


    var set_phon = $('.iti__selected-dial-code').text();
    //alert(set_phon);
      $('#hide_abc_two').val(set_phon);
       $('#spinnerOverlay').show();
      //alert('hel');
      var formData = new FormData(formElem[0]);
      formData.append('_token', $('meta[name="csrf-token"]').attr('content'))

      console.log(formData);
      // return false;
      $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });
      $.ajax({
          async: true,
          type: 'post',
          url: "{{ url('/interest_property_form_two')}}" ,
          data: formData,
          cache: false,
          processData: false,
          contentType: false,
          success: function(response) {
            if (response.status == 100) {
              $('#spinnerOverlay').hide();
              $(".cl-popup-wrap").hide();
              $('#show_recaptcha').show();

            }
            
              if (response.status == 200) {
                $(".cl-popup-wrap").hide();
                  $('#spinnerOverlay').hide();
                  Swal.fire({
                  imageUrl: '{{asset("logo-image/image_2.png")}}',
            imageWidth: 300, // Adjust the width of the image
            imageHeight: 100, 
            title: 'Good job!',
            text: 'Form is submitted Successfully',
            icon: 'success',
            imageAlt: 'Custom image' // Replace this with an appropriate alt text for the image
          }).then(function() {
            $('#interestformTwo')[0].reset();
            $('#phone_two').val('');
            location.reload();
								});



          }
          }

      });
    };

  
 
</script>

{{-- interest Property Form Two Insert data End --}}




<script>
    function toggleMenu() {
  var menuList = document.getElementById('menuList');
  var closeBtn = document.getElementById('closeBtn');

  menuList.classList.toggle('open');
  closeBtn.style.display = 'block';
}

function closeMenu() {
  var menuList = document.getElementById('menuList');
  var closeBtn = document.getElementById('closeBtn');

  menuList.classList.remove('open');
  closeBtn.style.display = 'none';
}




  </script>
  <script>
$(document).ready(function() {
  // Open the modal when the button is clicked
  $(".openModalBtn").click(function() {
    var modelId = $(this).val();
    // alert(modelId);
    $(".hidden_developer").val(modelId);
    $("#customModalOverlay").fadeIn();
          $('#addData').html(`
          <tr>
            <th colspan="9"> <!-- Adjust colspan based on your table structure -->
            
                <div class="loader1122" id="loader-4">
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
          
            </th>
          </tr>
      
      `);
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });
      $.ajax({
          async: true,
          type: 'post',
          url: "{{ url('/model_filter_list')}}/"+modelId,
          cache: false,
          processData: false,
          contentType: false,
          success: function(response) {
            $('#addData').html("");
                $('#myTable').DataTable().clear().destroy();
                $("#addData").html(response);
                new DataTable('#myTable');
          }
      });




      $.ajax({
          async: true,
          type: 'post',
          url: "{{ url('/model_filter_optionOne')}}/"+modelId,
          cache: false,
          processData: false,
          contentType: false,
          success: function(response) {
            
    
            $("#pricefilter").html('<option value="">Price/Budget</option>');
                $("#pricefilter").append(response);
               
                
          }
      });


      $.ajax({
          async: true,
          type: 'post',
          url: "{{ url('/model_filter_optiontwo')}}/"+modelId,
          cache: false,
          processData: false,
          contentType: false,
          success: function(response) {
            
    
            $("#sqfootfilter").html('<option value="">sqft/Budget</option>');
                $("#sqfootfilter").append(response);
               
                
          }
      });




      
  });

  // Close the modal when the close button is clicked
  $("#closeModalBtn").click(function() {
    $("#customModalOverlay").fadeOut();
  });

  // Close the modal when clicking outside the modal content
  $(document).click(function(event) {
    if ($(event.target).is("#customModalOverlay")) {
      $("#customModalOverlay").fadeOut();
    }
  });

  // Prevent modal from closing when clicking inside the modal content
  $("#customModalOverlay .custom-modal").click(function(event) {
    event.stopPropagation();
  });
});

</script>






<script>
    function filterfunctionTwo(element) {
    // alert('hello');
    var area = $('#areafilter').val();
    var bedroom = $('#bedroomfilter').val();
    var propertyType = $('#propertyfilter').val();
    var competion = $('#completionfilter').val();
    var price = $('#pricefilter').val();
    var sqfoot = $('#sqfootfilter').val();
    var hidden1 = $('#hidden_developer').val();

       // alert(element.value); 
 var dd = new FormData();
         dd.append("area",area);
         dd.append("bedroom",bedroom);
         dd.append("propertyType",propertyType);
         dd.append("competion",competion);
         dd.append("price",price);
         dd.append("sqfoot",sqfoot);
         dd.append("hidden1",hidden1);

         $('#addData').html(`
    <tr>
      <th colspan="9"> <!-- Adjust colspan based on your table structure -->
       
          <div class="loader1122" id="loader-4">
            <span></span>
            <span></span>
            <span></span>
          </div>
    
      </th>
    </tr>
 
`);

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            async: true,
            type: 'post',
            url: "{{ url('/filter_list_two')}}",
            data: dd,
            cache: false,
            processData: false,
            contentType: false,
            success: function(response) {
                $('.bilal').html("");


              var table = $('.bilal');
              
                if (response.status == 200) {
    
                  if(response.record != ""){


                    $.each(response.record, function(index, record) {
    var newRow = '<tr>' +
        '<td><img src="{{ asset("admin_images/Listing_property_images") }}'+"/" + record.photo + '" width="40px"></td>' +
        '<td>' + record.title_name + '</td>' +
        '<td>' + record.developer_name + '</td>' +
        '<td>' + record.location + '</td>' +
        '<td>' + record.number_of_bed + '</td>' +
        '<td>' + record.property_type + '</td>' +
        '<td>' + record.completions + '</td>' +
        '<td>' + record.budgets + '</td>' +
        '<td>' + record.desired_size + '</td>' +
        '</tr>';

    // Append the new row to the table
   
    table.append(newRow);

});       
                }else{
                $('#addData').html("");
                $('#addData').append(' <tr><td colspan="8">Not Found Results</td></tr>');
              
            }
         
                }




            }
        });
    }
    </script>

<script>
    $(document).ready(function() {
// When the button is clicked, reset the select value
$('#resetButton_two').on('click', function() {
  // Set the selected value to an empty string
  $('#areafilter').val('');
  $('#bedroomfilter').val('');
  $('#propertyfilter').val('');
  $('#completionfilter').val('');
  $('#pricefilter').val('');
  $('#sqfootfilter').val('');
  
     var modelId = $('#hidden_developer').val();
    //  alert(modelId);
    $('#addData').html(`
    <tr>
      <th colspan="9"> <!-- Adjust colspan based on your table structure -->
       
          <div class="loader1122" id="loader-4">
            <span></span>
            <span></span>
            <span></span>
          </div>
    
      </th>
    </tr>
 
`);
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });
      $.ajax({
          async: true,
          type: 'post',
          url: "{{ url('/model_filter_list')}}/"+modelId,
          cache: false,
          processData: false,
          contentType: false,
          success: function(response) {
            $('#addData').html("");
                $('#myTable').DataTable().clear().destroy();
                $("#addData").html(response);
                new DataTable('#myTable');
          }
      });


});
});
  </script>

<script>
    // Open the modal with zoom effect
   function openModal() {
    // alert('dfd');
    var property_ids =  $(this).val();
                $('#property_hide_id').val(property_ids);
    // alert(property_ids);
     const modal = document.querySelector('.cl-popup-wrap');
     modal.style.display = 'flex';
     setTimeout(() => {
       modal.querySelector('.cl-popup-box').classList.add('active');


     }, 100);
   }
   
   // Close the modal with zoom effect
   function closeModal() {
    $('#interestform')[0].reset();
     const modal = document.querySelector('.cl-popup-wrap');
     modal.querySelector('.cl-popup-box').classList.remove('active');
     setTimeout(() => {
       modal.style.display = 'none';
     }, 300);
   }
   
   // Close the modal when clicking outside the modal
   function handleClickOutside(event) {
     const modal = document.querySelector('.cl-popup-box');
     if (event.target !== modal && !modal.contains(event.target)) {
       closeModal();
     }
   }
   
   // Close the modal when pressing the Escape key
   document.addEventListener('keydown', function (event) {
     if (event.key === 'Escape') {
       closeModal();
     }
   });
   
   // Attach the event listener to the close button
   document.querySelector('.cl-popup-box-closer').addEventListener('click', closeModal);
   
   // Attach the event listener to the modal wrap to close when clicking outside
   document.querySelector('.cl-popup-wrap').addEventListener('click', handleClickOutside);
   
   // Open the modal on click of the button with the 'open-modal-btn' class
   const openModalButtons = document.querySelectorAll('.open-modal-btn');
   openModalButtons.forEach((button) => {
  
     button.addEventListener('click', openModal);
   });
   
  </script>
 
 @yield('script')
</body>
</html>
