@section('title','Form')
@extends('layouts.app')

@section('content')

<!-- Form Section Start  -->

<div class="form_page_main_one">

    <div  class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="row">
                    <div class="col-md-12">
                        <div class="stepwizard">
                            <div class="stepwizard-row setup-panel">
                                <div class="stepwizard-step">
                                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                                    <p class="b_top_check">Property Details</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                    <p class="b_top_check">Your Details</p>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-3" type="button" style=" pointer-events: none;"  class="btn btn-default btn-circle" disabled="disabled">3</a>
                                    <p class="b_top_check">Confirmation</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
              
<div class="form_page_main_two">
    <div style="background-color: #F4F7F5;" class="container setup-content" id="step-1">
        <div class="row" >
            <div class="col-md-1"></div>
            <div class="col-md-9  mt-5"><h3 class="b_property">Enter Property Details</h3></div>
            </div>
        
            
            <div class="container">
                <div class="row">
                    <div class="col-md-1 "></div>
                  <div class="col-md-5 b_make_test">
                    <hr class="horizontal-line">
                    <p class="b_what">What are you looking for?</p>
                    <div class="b_flexnone">
                    <div class="b_homes d-flex">
                        <div><img src="{{ asset('/front_end/icon_image/carbon_home.png') }}" style="margin-left: 27px;margin-top:6px;" width="25px" alt=""></div>
                        <div class="b_make_home">Home</div>
                    </div>


                    <div class="b_homes_two d-flex">
                        <div><img src="{{ asset('/front_end/icon_image/fluent_building-townhouse-24-regular.png') }}" style="margin-left: 27px;margin-top:6px;" width="25px" alt=""></div>
                        <div class="b_make_home_two">Villa</div>
                    </div>
                </div>


                <br>
                <div class="b_flexntwo">
                    <div class="b_homes_three d-flex">
                        <div><img src="{{ asset('/front_end/icon_image/ic_twotone-apartment.png') }}" style="margin-left: 27px;margin-top:6px;" width="25px" alt=""></div>
                        <div class="b_make_home_three">Apartment


                        </div>
                    </div>


                    <div class="b_homes_four d-flex">
                      
                        <div class="b_make_home_four">Other</div>
                    </div>
                </div>
                     </div>
                     
                        <div class="col-md-6 justify-content-center b_shadows_two">
                 
                          <div class="mx-auto b_shadows" style="background-color: white;width: 340px;padding: 10px;">
                            <b> <p class="b_first_p" >Please take care to answer all questions honestly and to the best of your knowledge. If you don't, your policy might be cancelled or your claim rejected.</p></b>
                            <p class="b_second_p" >We've provided help text and guidance to help you enter the right information. We recommend you use it when getting a quote.</p></div>
                
                          </div>
                    </div>
                 </div>

                 <div class="container">
                    <div class="row " >
                            <div class="col-md-1"></div>
                            <div class="col-md-6">
                                <form action="{{ url('user_propertys') }}" method="post" id="msformdata" onsubmit="submit_universal_set('msformdata');" >
                                    @csrf
                                    <div class="col-xs-12">
                                        <div class="col-md-12">


                                            <?php $TypeOfPropertys = App\Models\TypeOfProperty::where('status', '0')->get();?>  
                                          
                                            <div class="form-group mb-1"><br>
                                                <label class="control-label sele_pro">Select type of property?</label>
                                                <br><br>
                                                <select style="width: 380px;" id="user_property_all"  name="user_property" class="form-select b_checklist" aria-label="Default select example" required>
                                                    <option  value="">--Select Types of property--</option>
                                                    @forelse ($TypeOfPropertys as $TypeOfProperty)
                                                    <option value="{{ $TypeOfProperty->id }}">{{ $TypeOfProperty->property_type }}</option>
                                                    @empty
                                                    <option value="option2">No Found Property</option>
                                                    @endforelse
                                                  </select>
                                                 
                                            </div>
                                            <span id="show_one" style="color: red;display:none;">Required Field </span>
                                            <br>
                                           
                                       

                                            <div class="form-group mt-2 mb-1">
                                                <label class="control-label sele_lab_one">How many number of bedrooms?</label>
                                                <br><br>
                                                <?php 
                                                $Bedrooms = App\Models\Bedroom::where('status', '0')->get();
                                                ?> 
                                                <select name="user_bedroom" id="user_bedroom" style="width: 380px;" class="form-select b_checklist" aria-label="Default select example" required>
                                                    <option value="" >--Select Bed Room Number--</option>
                                                  @forelse ($Bedrooms as $Bedroom)
                                                  <option value="{{ $Bedroom->id }}">{{ $Bedroom->number_of_bed }}</option>
                                                  @empty
                                                  <option value="option2">No Found Bed Room</option>
                                                  @endforelse
                                                  </select>
                                            </div>
                                            <span id="show_two" style="color: red;display:none;">Required Field </span>
                                            <br>

                                        


                                            <?php $currencys = App\Models\Addcurrency::where('status', '0')->get();?>  
                                       
                                            <div class="form-group mt-2 mb-1">
                                                <label class="control-label sele_lab_one">Select Your Currency ?</label>
                                                <br><br>
                                              
                                                <select name="user_currency" id="user_currency" style="width: 380px;" class="form-select b_checklist " aria-label="Default select example" required>
                                                    <option value="">--Select Currency--</option>
                                                    @forelse ($currencys as $currency)
                                                    <option value="{{ $currency->id }}">{{ $currency->currency }}</option>
                                                    @empty
                                                    <option value="option2">No Found Currency</option>
                                                    @endforelse
                                                  </select>
                                            </div>
                                            <span id="show_three" style="color: red;display:none;">Required Field </span>
                                            <br>



    

                                            <div class="form-group mt-2 mb-1">
                                                <label class="control-label sele_lab_five">Enter Your budget</label>
                                                <br><br>
                                              <input style="width: 380px;" id="user_budget" placeholder="Enter Your budget" type="text" value="" name="user_budget" class="form-control b_checklist  ">
                                            </div>
                                            <span id="show_four" style="color: red;display:none;">Required Field </span>
                            <span id="valid_budget" style="color: red;padding:15px;display:none;">Enter Valid Value </span>

                                            <br>



                                            <?php $PaymentPlans = App\Models\PaymentPlan::where('status', '0')->get();?>  
                                            
                                            <div class="form-group mt-2 mb-1">

                                                <label class="control-label sele_lab_three">Choose Your payment plan?</label>
                                                <br><br>
                                                <select style="width: 380px;" id="user_payment_plan" name="user_payment_plan" class="form-select b_checklist " aria-label="Default select example" required>
                                                    <option value="">--Select Payment Plans--</option>
                                                    @forelse ($PaymentPlans as $PaymentPlan)
                                                    <option value="{{ $PaymentPlan->id }}">{{ $PaymentPlan->payment_plane_years }}</option>
                                                    @empty
                                                    <option value="option2">No Found Payment</option>
                                                    @endforelse
                                                  </select>
                                            </div>
                                            <span id="show_five" style="color: red;display:none;">Required Field </span>
                                            <br>
                                           
                                          
         
                                            <?php $Locations = App\Models\Location::where('status', '0')->get();?>  
                                            <div class="form-group mt-2 mb-1">
                                                <label class="control-label sele_lab_four">Select your desired location</label>
                                                <br><br>
                                                <select style="width: 380px;" id="user_location" name="user_location" class="form-select b_checklist" aria-label="Default select example" required>
                                                    <option value="">--Select Location--</option>
                                                    @forelse ($Locations as $Location)
                                                    <option value="{{ $Location->id }}">{{ $Location->location }}</option>
                                                    @empty
                                                    <option value="option2">No Found Location</option>
                                                    @endforelse
                                                  </select>
                                            </div>
                                            <span id="show_six" style="color: red;display:none;">Required Field </span>
                                            <br>
                                            <div class="form-group mt-2 mb-1">
                                                <label class="control-label sele_lab_five">Enter desired Size in Sq ft(Only Enter The Number)</label>
                                                <br><br>
                                              <input style="width: 380px;" placeholder="Enter value in Number" value="" id="add_desired" type="text" name="user_desired_size" class="form-control b_checklist">
                                              <span id="show_seven" style="color: red;display:none;">Required Field </span>
                            <span id="valid_budget_one" style="color: red;padding:15px;display:none;">Enter Valid Value </span>
                                            
                                            </div>
                                        
                                         
                                            <br>
                                            <button type="button" id="show_btn" class="btn btn-primary nextBtn btn-lg pull-right">Next</button>
                                            {{-- <button type="button" id="myButton1" class="btn btn-primary btn-lg pull-right">Next111</button> --}}
                                            <br>
                                           
                                            <br>
                                        </div>  
                                      
                                    </div>
                            </div>
                            <div class="col-md-5"></div>
                    </div>
                   
                 </div>


                 <div style="background-color: #FFFFFF!important;" class="container" >
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-6">
                            <h2 class="b_mail">Your Email</h2>
                            <hr class="horizontal-line_two"><br>
                            <p class="b_mail_p">If we have your email on our system we can fill in some of the quote questions with information
                                you provided last time. If not, we'll make an account for you, so you can save your quotes to view
                                later.</p><br><br>
        
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Enter text">
                                        <button  class="btn b_mail_sub">Submit</button>
                                    </div>
                                    <br>
                                    <div class="b_stay" ><h5>Stay in touch with Us</h5><br>
                                        <p class="b_auto">We'll automatically email you your best prices, including a link so you can easily retrieve all your quotes. email. You can let us know at any time if you change your mind. Further information can be found in our privacy policy.</p>
                                        <br>
                                        <h4 class="b_auto_two">Would you like to receive these offers, news, products andpromotions from us?</h4><br>
                                        <div class="two_btns_yes">YES</div>
                                        <div class="two_btns_no">NO</div>
                                        <br> <br><br>
                                    </div> <br> 
                                    <hr class="horizontal-line_two"><br>
                                    <div style="text-align: center;" class="col-md-12 ">  <button class=" b_contin">Continue</button></div><br>
                                     
                        </div>
                        <div class="col-md-5"></div>
                    </div>
                </div>
        
 
         </div>
         <!-- Step one Complete  -->
</div>
<div class="form_page_main_three">
    <div class="container">
        <div style="background-color: #F4F7F5;" class="row setup-content" id="step-2">

            
            <div class="row" >
                <div class="col-md-1"></div>
                <div class="col-md-5  mt-2 mb-1"><h3 class="b_property_sub">Enter Your Details</h3>
                    <hr class="horizontal-line_find"><br>
                    <label class="b_co_names">Your Name:</label><br><br>
                    <div class="row b_set_name">
                        <div class="col">
                
                        <input type="text" name="user_first_name" class="form-control b_fname" style="margin-bottom: 10px;" id="firstName" placeholder="Enter first name">
                        <span id="info_one" style="color: red;display:none;">Required Field </span>
                    </div>
                      
                        <div class="col mb-1">
                
                        <input type="text" name="user_last_name" class="form-control b_last" id="lastName" style="margin-bottom: 10px;"  placeholder="Enter last name">
                        <span id="info_two" style="color: red;padding:15px;display:none;">Required Field </span>
                    </div>
                       
                    </div><br>
                    <label class="mt-2 b_co_dates">Your Date of birth:</label><br><br>

                
                        <div class="form-group">
                         
                            <input type="date" name="user_dateofbirth" class="form-control b_fname" id="user_date" style="margin-bottom: 10px;width: 286px;"  placeholder="Month / Date / YEAR">
                            <span id="info_three" style="color: red;padding:15px;display:none;">Required Field </span>
                        </div>
                     
                  
                            <br>
                                <label class="mt-2 b_co_mails">Enter Your Email:</label><br><br>
                                <div class="form-group">
                                
                                    <input style="width: 286px;" type="email" name="email" id="user_email"style="margin-bottom: 10px;"   class="form-control b_email_set" placeholder="Enter Email" />
                                </div>
                                <span id="info_six" style="color: red;padding:15px;display:none;">Required Field </span>
                                <span id="valid_email" style="color: red;padding:15px;display:none;">Please enter a valid email address </span>
                                <br>

                                {{-- <label class="mt-2 b_co_label">Confirm your e-mail:</label><br><br>
                            <div class="form-group">
                                
                                <input style="width: 286px;" type="email" required="required" class="form-control b_confirm_emai"  />
                            </div> --}}

                           

                            <br>
                            <label class="b_co_mails">Enter Your Password:</label><br><br>
                           <div class="form-group" style="position: relative;" >
                              
                               <input style="width: 286px;" type="password" id="password" name="password"  style="margin-bottom: 10px;"  class="form-control b_email_set" placeholder="Enter password" />
                               <span style="position: absolute; top: 11px; left: 252px;font-size: 17px;" toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                               <span class="icon is-small is-left"></span>
                               <span id="info_seven" style="color: red;padding:15px;display:none;">Required Field </span>

                            </div><br>
   
                           <label class="mt-2 b_co_label">Confirm your Password:</label><br><br>
                          <div class="form-group" style="position: relative;" >
                             
                              <input style="width: 286px;"  type="password" id="confirm-password" style="margin-bottom: 10px;"  name="password_confirmation" placeholder="Enter confirm-password" class="form-control b_confirm_emai"  />
                              <span style="position: absolute; top: 11px; left: 252px;font-size: 17px;" toggle="#confirm-password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                              <span class="icon is-small is-left"></span>
                              <span id="info_eight" style="color: red;padding:15px;display:none;">Required Field </span>
                              <span id="pass_match" style="color: red;padding:15px;display:none;">Your Password Does Not Match </span>
                              <div id="errorMessage" style="display: none; color: red;">Passwords do not match!</div>
                            </div>




                       <div  class="col-md-6 mt-3">  <button type="submit" style="background-color: #0367A6;width: 110px;color: #FFFFFF;margin-left: 80px;" id="bilal" class="btn  b_nextbtns">Continue</button></div>
                    
                       
                       
                    
                      
                       <br><br>
                       <!-- <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Continue</button> -->
                </div>
               
                <div class="col-md-6"></div>

                </div>
           
        </div>
    </div>
<!-- Step two Complete  -->
</div>

<div class="form_page_main_four">

    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12 text-center">
              <h1 class="b_success_data mt-3 mb-3">Your Details Add succcessfully</h1>
             
            </div>
        </div>
    </div>
<!-- Step Three Complete  -->
</form>
</div>
@endsection
<!-- Form Section END  -->
@section('script')
<script>
    $(document).ready(function() {
  // Attach a change event handler to the select element
  $('#user_property_all').change(function() {
    $("#user_property_all").removeClass("country_error");
    $('#show_one').hide();
  });

  $('#user_bedroom').change(function() {
    $('#show_two').hide();
     $("#user_bedroom").removeClass("country_error");
  });


  $('#user_currency').change(function() {
    $('#show_three').hide();
     $("#user_currency").removeClass("country_error");
  });

  $('#user_payment_plan').change(function() {
    $('#show_five').hide();
     $("#user_payment_plan").removeClass("country_error");
  });

  $('#user_location').change(function() {
    $('#show_six').hide();
    $("#user_location").removeClass("country_error");
  });



  $('#user_budget').keyup(function() {
    // Get the value of the input field
    var inputTextval = $(this).val();

    // Check if the input field is empty
    if (inputTextval.trim() === '') {
        // $("#add_desired").addClass("country_error");
        $('#valid_budget').hide();
    $('#show_four').show();
    $('#user_budget').addClass('country_error');
    } else {
        $('#show_four').hide();
    $('#user_budget').removeClass('country_error');

        if (!$.isNumeric(inputTextval)) {
      $('#valid_budget').show();
      $('#show_four').hide();
      $('#user_budget').addClass('country_error');
    } else {
      $('#valid_budget').hide();
      $('#show_four').hide();
      $('#user_budget').removeClass('country_error');
    }


     
    }
  });






  $('#add_desired').keyup(function() {
    // Get the value of the input field
    var inputTextval = $(this).val();

    // Check if the input field is empty
    if (inputTextval.trim() === '') {
        // $("#add_desired").addClass("country_error");
        $('#valid_budget_one').hide();
    $('#show_seven').show();
    $('#add_desired').addClass('country_error');
    } else {
        $('#show_seven').hide();
    $('#add_desired').removeClass('country_error');

        if (!$.isNumeric(inputTextval)) {
      $('#valid_budget_one').show();
      $('#show_seven').hide();
      $('#add_desired').addClass('country_error');
    } else {
      $('#valid_budget_one').hide();
      $('#show_seven').hide();
      $('#add_desired').removeClass('country_error');
    }


     
    }
  });




  
  $('#firstName').keyup(function() {
    // Get the value of the input field
    var inputName = $(this).val();
    // Check if the input field is empty
    if (inputName.trim() === '') {
        $('#info_one').show();
         $("#firstName").addClass("country_error");


    } else {
        $('#info_one').hide();
                $("#firstName").removeClass("country_error");
     
    }
  });


  $('#lastName').keyup(function() {
    // Get the value of the input field
    var inputlastName = $(this).val();
    // Check if the input field is empty
    if (inputlastName.trim() === '') {
        $('#info_two').show();
         $("#lastName").addClass("country_error");


    } else {
        $('#info_two').css('display', 'none');
                $("#lastName").removeClass("country_error");
     
    }
  });

  $('#user_date').on('change', function() {
    // Get the value of the input field
    var inputNamedate = $(this).val();
   // alert(inputNamedate);
    // Check if the input field is empty
    if (inputNamedate.trim() === '') {
        $('#info_three').show();
         $("#user_date").addClass("country_error");


    } else {
        $('#info_three').css('display', 'none');
                $("#user_date").removeClass("country_error");
     
    }
  });



$('#user_email').keyup(function() {
    // Get the value of the input field
    var inputlastName = $(this).val();
    
    // Regular expression to check for a valid email pattern
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

if (inputlastName.trim() === '') {
        $('#info_six').show();
        $("#user_email").addClass("country_error");
    } else if (emailPattern.test(inputlastName)) {
        // If the input matches the email pattern, show a success message
        $('#info_six').text('Valid email address.');
        $('#info_six').css('color', 'green');
        $('#info_six').show();
        $("#user_email").removeClass("country_error");
    } else {
        // If the input is not a valid email, show an error message
        $('#info_six').text('Invalid email address.');
        $('#info_six').css('color', 'red');
        $('#info_six').show();
        $("#user_email").addClass("country_error");
    }


});


document.getElementById('confirm-password').addEventListener('keyup', function(event) {
  var password = document.getElementById('password').value.trim();
  var confirmPassword = this.value.trim();
  
  if (password !== confirmPassword) {
    // Show error message
    $('#info_eight').hide();
    $('#pass_match').hide();
    document.getElementById('errorMessage').style.display = 'block';
  } else {
    // Hide error message
    document.getElementById('errorMessage').style.display = 'none';
    
  
  }
});


});
</script>
<script>
$(document).ready(function() {
  $('#bilal').click(function() {
    // alert('hello');
  
                    var firstName = document.getElementById("firstName");
                    var lastName = document.getElementById("lastName");
                    var user_date = document.getElementById("user_date");
                    var user_email = document.getElementById("user_email");
                    var password = document.getElementById("password");
                    var confirm_password = document.getElementById("confirm-password");
                    
                    if (firstName.value === "") {
                         $('#info_one').show();
                         firstName.classList.add("country_error");
                         firstName.focus();
                        $("html, body").animate({ scrollTop: "-=20px" }, "slow");

                 return false;
              }else{
                 
                $('#info_one').hide();
                $("#firstName").removeClass("country_error");
              }


              if (lastName.value === "") {
                $('#info_two').show();
                lastName.classList.add("country_error");
                lastName.focus();
                        $("html, body").animate({ scrollTop: "-=20px" }, "slow");
                       
                 return false;
              }else{
                 
                $('#info_two').css('display', 'none');
                $("#lastName").removeClass("country_error");
              }

              if (user_date.value === "") {
                // alert("Please select an option.");
                $('#info_three').show();
             
                user_date.classList.add("country_error");
                         user_date.focus();
                        $("html, body").animate({ scrollTop: "-=20px" }, "slow");
                       
                 return false;
              }else{
                    $('#info_three').hide();
                $("#user_date").removeClass("country_error");
              }



              if (user_email.value === "") {
                // alert("Please select an option.");
                $('#info_six').show();
                $('#valid_email').hide();
                user_email.classList.add("country_error");
                user_email.focus();
                        $("html, body").animate({ scrollTop: "-=20px" }, "slow");
                      
                       
                 return false;
              }else{
                var email = $("#user_email").val();
                     var emailRegex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
        
                    if (!emailRegex.test(email)) {
                        $('#info_six').hide();
                        $('#valid_email').show();
                user_email.classList.add("country_error");
                user_email.focus();
                        $("html, body").animate({ scrollTop: "-=20px" }, "slow");
                           
                     return false;
                     }
                 
                     $('#info_six').hide();
                     $('#valid_email').hide();
                $("#user_email").removeClass("country_error")
              }


              if (password.value === "") {
                // alert("Please select an option.");
                $('#info_seven').show();
                password.classList.add("country_error");
                password.focus();
                        $("html, body").animate({ scrollTop: "-=20px" }, "slow");
                      
                       
                 return false;
              }else{
                $('#info_seven').css('display','none');
                $("#password").removeClass("country_error");
              }
                  
              

              if (confirm_password.value === "") {
                // alert("Please select an option.");
                $('#info_eight').show();
                confirm_password.classList.add("country_error");
                confirm_password.focus();
                        $("html, body").animate({ scrollTop: "-=20px" }, "slow");
                      
                       
                 return false;
              }else{
                $('#info_eight').css('display','none');
                $("#confirm-password").removeClass("country_error");
              }

              if(password.value == confirm_password.value){
                $('#pass_match').hide();
               
              }
              if(password.value != confirm_password.value){
                // alert('hello');
                $('#pass_match').show();
            
                $('#errorMessage').hide();
                return false;
               
              }
              

              
  });

});
    </script>

 {{-- Insert the record of spacilist Start  --}}
 <script>
    function submit_universal_set(id){
        event.preventDefault();
        var formElem = $("#"+id);
        // alert(formElem);
        // console.log(formElem); 
        $('#spinnerOverlay').show();
      


        
      
        var formData = new FormData(formElem[0]);
        console.log(formData);
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            async: true,
            type: 'post',
            url: "{{ url('user_propertys')}}" ,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status == 200) {
                   
                  
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
                            $('#msformdata')[0].reset();
                            if (response.redirectURLs) {
            // Redirect to the specified page
            window.location.href = response.redirectURLs;
                               }
							
								});
                }


                if (response.status == 100) {
              
                   
                  $('#spinnerOverlay').hide();

                    Swal.fire(
                        'Errors',
                        'Email Already Exist Please Enter the Other Email Address',
                        'error'
                        )
                }


                if (response.status == 300) {

                    $('#pass_match').show();
            
                    
                  $('#spinnerOverlay').hide();

                 $("html, body").animate({ scrollTop: "-=20px" }, "slow");

                 return false;
                        
                }
                if (response.status == 400) {
                  
                  $('#spinnerOverlay').hide();
                    Swal.fire(
                        'Errors',
                        'Information add Successfully But Mail Somethig Wrongs'+response.error,
                        'error'
                        )
                }

            


            }
        });
    }
</script>
 {{-- Insert the record of spacilist END  --}}

 <script>

    $(".toggle-password").click(function() {

   
    
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
    });
    
        </script>
 @endsection