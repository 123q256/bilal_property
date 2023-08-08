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
                                {{-- <div class="stepwizard-step">
                                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                    <p class="b_top_check">Your Details</p>
                                </div> --}}
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
                                <form action="{{ url('user_propertys') }}" method="post" id="msformdatatwo" onsubmit="submit_universal_set_two('msformdatatwo');" >
                                    @csrf
                                    <div class="col-xs-12">
                                        <div class="col-md-12">


                                            <?php $TypeOfPropertys = App\Models\TypeOfProperty::where('status', '0')->get();?>  
                                          
                                            <div class="form-group mb-3"><br>
                                                <label class="control-label sele_pro">Select type of property?</label>
                                                <br><br>
                                                <select style="width: 380px;" id="user_property_all"  name="user_property" class="form-select b_checklist" aria-label="Default select example" >
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
                                           
                                       

                                            <div class="form-group mb-3">
                                                <label class="control-label sele_lab_one">How many number of bedrooms?</label>
                                                <br><br>
                                                <?php 
                                                $Bedrooms = App\Models\Bedroom::where('status', '0')->get();
                                                ?> 
                                                <select name="user_bedroom" id="user_bedroom" style="width: 380px;" class="form-select b_checklist" aria-label="Default select example" >
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
                                       
                                            <div class="form-group mb-3">
                                                <label class="control-label sele_lab_one">Select Your Currency ?</label>
                                                <br><br>
                                              
                                                <select name="user_currency" id="user_currency" style="width: 380px;" class="form-select b_checklist " aria-label="Default select example" >
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



    

                                            <div class="form-group mb-3">
                                                <label class="control-label sele_lab_five">Enter Your budget</label>
                                                <br><br>
                                              <input style="width: 380px;" id="user_budget" placeholder="Enter Your budget" type="text" value="" name="user_budget" class="form-control b_checklist  ">
                                            </div>
                                            <span id="show_four" style="color: red;display:none;">Required Field </span>
                                            <span id="valid_budget" style="color: red;padding:15px;display:none;">Enter Valid Value </span>

                                            <br>



                                            <?php $PaymentPlans = App\Models\PaymentPlan::where('status', '0')->get();?>  
                                            
                                            <div class="form-group mb-3">

                                                <label class="control-label sele_lab_three">Choose Your payment plan?</label>
                                                <br><br>
                                                <select style="width: 380px;" id="user_payment_plan" name="user_payment_plan" class="form-select b_checklist " aria-label="Default select example" >
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
                                            <div class="form-group mb-3">
                                                <label class="control-label sele_lab_four">Select your desired location</label>
                                                <br><br>
                                                <select style="width: 380px;" id="user_location" name="user_location" class="form-select b_checklist" aria-label="Default select example" >
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
                                            <div class="form-group mb-3">
                                                <label class="control-label sele_lab_five">Enter a desired Size (Only Enter the Number):</label>
                                                <br><br>
                                              <input style="width: 380px;" placeholder="Enter value in Number" value="" id="add_desired" type="text" name="user_desired_size" class="form-control b_checklist">
                                             
                                              {{-- <input type="text" id="inputField" name="inputField"><br> --}}
                                              <span id="errorText" style="color: red;"></span><br>
                                            <span id="valid_budget_two" style="color: red;padding:15px;display:none;">Enter Valid Value </span>

                                              <span id="show_seven" style="color: red;display:none;">Required Field </span>
                                            </div>
                                           
                                            <br>
                                            <button type="submit" id="show_btn" class="btn btn-primary twoForm btn-lg pull-right hello_btn">Submit</button>
                                            <button type="submit" id="show_btn" style="display: none;" class="btn btn-primary  btn-lg pull-right buttonload"><i class="fa fa-spinner fa-spin"></i>&nbsp;&nbsp;processing...</button>

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
 {{-- Insert the record of spacilist Start  --}}

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
        $('#valid_budget_two').hide();
    $('#show_seven').show();
    $('#add_desired').addClass('country_error');
    } else {
        $('#show_seven').hide();
    $('#add_desired').removeClass('country_error');

        if (!$.isNumeric(inputTextval)) {
      $('#valid_budget_two').show();
      $('#show_seven').hide();
      $('#add_desired').addClass('country_error');
    } else {
      $('#valid_budget_two').hide();
      $('#show_seven').hide();
      $('#add_desired').removeClass('country_error');
    }


     
    }
  });



});

  </script>
 <script>
    $(document).ready(function() {
  $('.twoForm').click(function() {
// alert('hell');





var user_property_all = document.getElementById("user_property_all");
        var user_bedroom = document.getElementById("user_bedroom");
        var user_currency = document.getElementById("user_currency");
        var user_budget = document.getElementById("user_budget");
        var user_payment_plan = document.getElementById("user_payment_plan");
        var user_location = document.getElementById("user_location");
        var add_desired = document.getElementById("add_desired");
     // alert(user_property_all.value); 
        if (user_property_all.value === "") {
     // alert("Please select an option.");

     $('#show_one').show();
     user_property_all.classList.add("country_error");
     user_property_all.focus();
        $("html, body").animate({ scrollTop: "-=100px" }, "slow");
         
          
           
     return false;
  }else{
     
    $("#user_property_all").removeClass("country_error");
    $('#show_one').hide();
  }

  if (user_bedroom.value === "") {

    $('#show_two').show();
    user_bedroom.classList.add("country_error");
    user_bedroom.focus();
       $("html, body").animate({ scrollTop: "-=100px" }, "slow");
        
          
           
     return false;
  }else{
    $('#show_two').hide();
     
    $("#user_bedroom").removeClass("country_error");
  }

  if (user_currency.value === "") {
    $('#show_three').show();
    user_currency.classList.add("country_error");
    user_currency.focus();
       $("html, body").animate({ scrollTop: "-=100px" }, "slow");
        
          
          
           
     return false;
  }else{
    $('#show_three').hide();
     
    $("#user_currency").removeClass("country_error");
  }

  if (user_budget.value === "") {
    $('#show_four').show();
    $('#valid_budget').hide();
    user_budget.classList.add("country_error");
    user_budget.focus();
       $("html, body").animate({ scrollTop: "-=100px" }, "slow");

          
           
     return false;
  }else{


    if (!$.isNumeric(user_budget.value)) {
        // alert("Please enter a valid number.");
        $('#valid_budget').show();
        $('#show_four').hide();
        user_budget.classList.add("country_error");
        user_budget.focus();
            $("html, body").animate({ scrollTop: "-=20px" }, "slow");
              
        return false;
        }
        $('#valid_budget').hide();

    $('#show_four').hide();
     
    $("#user_budget").removeClass("country_error");
  }

  if (user_payment_plan.value === "") {
     // alert("Please select an option.");
     $('#show_five').show();
     user_payment_plan.classList.add("country_error");
     user_payment_plan.focus();
        $("html, body").animate({ scrollTop: "-=100px" }, "slow");
          
           
     return false;
  }else{
    $('#show_five').hide();
     
    $("#user_payment_plan").removeClass("country_error");
  }


  if (user_location.value === "") {
     // alert("Please select an option.");
     $('#show_six').show();
     user_location.classList.add("country_error");
     user_location.focus();
        $("html, body").animate({ scrollTop: "-=100px" }, "slow");
          
          
           
     return false;
  }else{
    $('#show_six').hide();
     
    $("#user_location").removeClass("country_error");
  }


  
  if (add_desired.value === "") {
   $('#show_four').show();
   add_desired.classList.add("country_error");
   add_desired.focus();
      $("html, body").animate({ scrollTop: "-=100px" }, "slow");

         
          
    return false;
 }else{

   if (!$.isNumeric(add_desired.value)) {
       // alert("Please enter a valid number.");
       $('#valid_budget_two').show();
       $('#show_seven').hide();
       add_desired.classList.add("country_error");
       add_desired.focus();
           $("html, body").animate({ scrollTop: "-=20px" }, "slow");
             
       return false;
       }
       $('#valid_budget_two').hide();
       // $('#info_three').hide();

   $('#show_seven').hide();
    
   $("#add_desired").removeClass("country_error");
 }




  // if (add_desired.value === "") {
  //   $('#errorText').text('');
  //   $('#show_seven').show();
  //   add_desired.classList.add("country_error");
  //   add_desired.focus();
  //       $("html, body").animate({ scrollTop: "-=20px" }, "slow");
          
           
  //    return false;
  // }else{
  //   $('#show_seven').hide();

  //   var value = $('#add_desired').val().trim();
  //           var regex = /^\d+\s*\*\s*\d+$/; // Regular expression to match "integer * integer" format

  //           if (regex.test(value)) {
  //               $('#add_desired').removeClass('error');
  //               $('#errorText').text('');
            
  //           } else {
  //               $('#add_desired').addClass('error');
  //               $('#errorText').text('Please enter a valid format: integer * integer');
  //               return false; // Prevent form submission
  //           }

     
  //   $("#add_desired").removeClass("country_error");
  // }


  });
});
 </script>
 <script>
    function submit_universal_set_two(id){
        // alert('hello');
        event.preventDefault();
        var formElem = $("#"+id);

        $('.buttonload').show();
          $('.hello_btn').hide();
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
            url: "{{ url('user_propertysTwo')}}" ,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status == 200) {
                    $('.hello_btn').show();
                     $('.buttonload').hide();
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
                            $('#msformdatatwo')[0].reset();
                            location.reload();
                            if (response.redirectURL) {
            // Redirect to the specified page
            window.location.href = response.redirectURL;
                               }

								});
                }
                if (response.status == 400) {
                    $('.hello_btn').show();
                     $('.buttonload').hide();
                     $('#spinnerOverlay').hide();
                    //  alert(response.message);
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
 @endsection