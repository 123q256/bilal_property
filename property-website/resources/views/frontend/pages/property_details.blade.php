@extends('layouts.app')

@section('content')

  <?php $listing_image = App\Models\ListingPropertyImage::where('list_property_id', $listing_details->id)->first();?>  
              

<style>

   #details_slider_image{
        background-image: url("{{ asset('/admin_images/Listing_property_images/'.$listing_image->list_pro_image) }}");
    
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center; 
      }


      .iti__country-list {
  position: absolute!important;
  z-index: 2!important;
  list-style: none!important;
  text-align: left!important;
  padding: 0!important;
  margin: 0 0 0 -21px!important;
  box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2)!important;
  background-color: white!important;
  border: 1px solid #CCC!important;
  /* white-space: none!important; */
  /* overflow-x: hidden!important; */
  max-height: 200px!important;
  overflow-y: scroll!important;
  -webkit-overflow-scrolling: touch!important;
  width: 520%!important;
}

</style>




  <!-- Serenity Mansion Register Your Interest -->
  <div class="container mt-5" style="width: 97%!important;"  id="details_slider_image">
    <div class="row">
        <div class="col-lg-8 col-md-6"></div>
        <div class="col-lg-4 col-md-6 col-sm-12 slider_bg_image">

               <div class="row">
                  <div class="col-md-12" style="padding: 40px;">
                      <form id="interestformTwo" method="post" onsubmit="submit_interest_form_two('interestformTwo');"  action="{{ url('/interest_property_form_two') }}">
                          @csrf
                        <div class="mb-2 text-center" >
                            <h1 class="heading_images_slider">Serenity Mansion Register Your Interest</h1> 
                          </div>
                          <input name="hide_phonesone_two" type="hidden" id="hide_abc_two"/> 
                          <input name="property_id_two" type="hidden" value="{{ $listing_details->id }}" id="property_hide_id_two"/> 
                          <div class="mb-2">
                              <input type="text" class="form-control" name="interest_name_two" id="interest_name_two" placeholder="Enter Your full name">
                              <span id="info_one_two" style="color: red;display:none;">Required Field </span>
                            </div>
                          <div class="mb-2">
                            <input type="email" class="form-control" name="interest_email_two" id="interest_email_two" placeholder="Enter Your Email">
                            <span id="info_six_two" style="color: red;padding:15px;display:none;">Required Field </span>
                            <span id="valid_email_two" style="color: red;padding:15px;display:none;">Please enter a valid email address </span>
                         
                          </div>
                          <div class="mb-2" style="display: grid;">
                            <input class="form-control" name="phone_two" type="text" id="phone_two"/> 
                            <span id="show_three_two" style="color: red;display:none;">Required Field </span>
                            <span id="valid_phone_two" style="color: red;padding:15px;display:none;">Enter Valid Phone No </span>
                           
     
                          </div>
                          <div class="mb-2">

                            <select class="form-select" name="language_two" id="language_two">
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
                            <span id="show_one_two" style="color: red;display:none;">Required Field </span>
                          </div>
                          <div class="mb-2">
                              <textarea class="form-control" id="interest_message_two" name="interest_message_two" placeholder="Enter Your Message" ></textarea>
                              <span id="show_two_two" style="color: red;display:none;">Required Field </span>
                            </div>

                          {{-- <div class="">
                            <label for="text" class="form-label" style="text-align: left;color: white;" >1+1=?</label>
                            <input type="text" class="form-control" id="text" placeholder="">
                          </div> --}}
                          <div style="overflow: hidden;display: flex; align-items: center; justify-content: center; " class="mb-2">
                            <div class="g-recaptcha" data-sitekey="6Lff74knAAAAAIOleVZHS35Ltf9MObDyVYvGvj0S"></div>
                            <span id="show_recaptcha" style="color: red;display:none;" >Recaptcha Is Required </span>
                            
                          </div>
                          
                    
                          <div class="text-center" style="margin-top: 10px;">
                            <button type="submit" id="register_two" class="btn btn-primary form-control">Register Your Interest</button>
                          </div>
                        
                        </form>
                  </div>
              </div>
        </div>
    </div>
</div>
     <!-- Serenity Mansion Register Your Interest -->


       <!-- Majid Al Futtaim -->
<div class="container shadow p-3 mb-5 bg-body rounded Futtaim_container" style="width: 97%!important;">
    <div class="row flex-wrap">
        <div class="col-md-4 col-sm-12">
          <?php $developers = App\Models\Developer::where('id', $listing_details->about_the_developer)->first();?> 
            <h5 class="pt-5 Futtaim_heading"><b>{{ $developers->developer_name }}</b></h5>
            <p class="pb-5 Futtaim_paragraph mt-2" > 
              <?php $locations = App\Models\Location::where('id', $listing_details->location)->first();?> 
              <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $locations->location }}
            </p>
        </div>
      
        <div class="col-md-8 col-sm-12 Brochure_media_query">
            <div class="Brochure_1">
              
             
             
               <i class='fa fa-file-pdf Brochure_pdf'></i><br>
                <a href="#"  class="anchor_list">PDF Brochure  </a>
            </div>
            <div class="Floor_Plans_1">
                <i class="fab fa-codepen red-icon Floor_Plans_icone"></i><br>
             
                <a href="#"  class="anchor_list"> Floor Plans</a>
            </div>
            <div class="Location_Map_1">
              <a href="#location"   class="anchor_list">
                <i class="fas fa-map-marker Location_Map_icon" ></i>
               <br>
             Location Map</a>
            </div>
            <div class="Photo_Gallery_1">
              <a href="#photo_gallery"  class="anchor_list"> 
                <i class="fas fa-image Photo_Gallery_icon"></i>
               <br>
                Photo Gallery </a>
            </div>
            <div class="Payment_Plan_1">
              <a href="#payment_plan"   class="anchor_list"> 
                <i class="fas fa-money-bill  Payment_Plan_icon"></i>
                <br>
               Payment Plan </a>
            </div>

        </div>
      
    </div>
</div>


          <!-- Majid Al Futtaim -->


            <!-- Serenity Mansion -->
<div class="container mb-3" style="width: 97%!important;">
    <div class="row">
        <div class="col-12">
          <h5><a class="monsert" href="#" class="Serenity_Mansion "> {{ $listing_details->title_name }}</a></h5>
        </div>
    </div>
</div>
    

<div class="container mb-5 pb-4 Serenity_Mansion_container" style="width: 97%!important;">
    <div class="row">
        <div class="col-md-6">
                <div class="container Serenity_Mansion_container1">
                    <div class="row">
                            <div class="col-6">
                                  <p class="Serenity_Mansion_para1">  
                                        <i class="fas fa-money-bill "></i> Starting Price
                                  </p>
                            </div>
                            <?php $addcurrencys = App\Models\Addcurrency::where('id',$listing_details->currencys )->where('status', '0')->first();?>  
                            <div class="col-6 text-end">
                              <p class="Serenity_Mansion_para2">{{$addcurrencys->currency}}   {{ $listing_details->budgets }} </p>
                            </div>
                    </div>
                </div>
            <div  class="container Serenity_Mansion_container2">
                <div class="row">
                    <div class="col-6">
                      <p class="Serenity_para1">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>  Location
                      </p>
                   </div>
                   <?php $location_details = App\Models\Location::where('id', $listing_details->location)->first();?> 
                    <div class="col-6 text-end">
                          <p class="Serenity_para2">
                            <b > {{ $location_details->location }} </b>
                          </p>
                   </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 ">
            <div class="container Mansion_contaner_1">
                <div class="row">
                    <div class="col-6">
                       <p class="Mansion_con_paragra1"><i class="fas fa-building"></i> Type
                      </p>
                    </div>
                    <?php $typeofpropertys = App\Models\TypeOfProperty::where('id', $listing_details->type_of_property)->first();?> 
                    <div class="col-6 text-end">
                       <p class="Mansion_con_paragra2"><b >{{ $typeofpropertys->property_type }}</b>
                      </p>
                    </div>
                </div>
            </div>
            <div class="container Mansion_contaner_2">
                <div class="row">
                    <div class="col-8">
                       <p class="Mansion_con_paragra3"> <i class="fas fa-bed"></i> Bedrooms
                      </p>
                    </div>
                    <?php $bedrooms_details = App\Models\Bedroom::where('id', $listing_details->number_of_bedrooms)->first();?> 
                    <div class="col-4 text-end">
                      <p  class="Mansion_con_paragra4">{{ $bedrooms_details->number_of_bed }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Serenity Mansion -->

         <!-- Highlights  -->
<div class="container " style="width: 97%!important;">
    <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="divider" style="font-size: 25px;">Highlights</h1>
         
        </div>
    </div>
  </div>


  <div class="container mb-5" style="width: 97%!important;">
        <div class="row">
            <div class="col-3"></div>
               <div class="col-md-6">
                    <p style="text-align:center;">
                     
                      
                      {!! $listing_details->highlights !!} 
                     
                    </p>
               </div>
            <div class="col-3"></div>
        </div>
  </div>

   <!-- Highlights  -->

   <!-- Project Details  -->
        
  <div class="container " style="width: 97%!important;">
    <div class="row">
        <div class="col-md-12  col-sm-12 text-center">
             <h1 class="divider" style="font-size: 25px;">Project Details </h1>
        </div>
    </div>
  </div>
  


  <div class="container mb-5" style="width: 97%!important;">
      <div class="row">
              <div class="col-md-12">
                  <p class="late_para" style="text-align:justify;">
                    {!! $listing_details->Project_details !!} 
                
                   
                  </p>
                
            </div>
      </div>
  </div>

   <!-- Project Details  -->


   <!-- Payment Plan  -->

  <div class="container" id="payment_plan" style="width: 97%!important;">
    <div class="row">
        <div class="col-md-12 col-sm-12 text-center">
             <h1 class="divider" style="font-size: 25px;">Payment Plan</h1>
        </div>
    </div>
  </div>

<div class="container mb-5" style="width: 97%!important;">
      <div class="row d-flex justify-content-between" >
                <div class="col-lg-12  col-md-12  Payment_Plan_div">
                        <div class="row"> 
                            <div class="col-12 text-center" >
                                <p class="Payment_Plan_div_para1"> {{ $listing_details->first_payment }}</p>
                                    <hr class="line">
                                <p class="Payment_Plan_div_para2">{{ $listing_details->second_payment }}</p>
                            </div>
                        </div>
                </div>
        
                <div class="col-lg-12  col-md-12 Payment_Plan_div_col_1">
                        <div class="row"> 
        <?php $CompletionDate = App\Models\CompletionDate::where('id',$listing_details->handover )->where('status', '0')->first();?>  

                            <div class="col-12 text-center" >
                                <p  class="Payment_Plan_div_para3">Handover:  {{ $CompletionDate->completions }} </p>
                                    <hr class="line">
        <?php $addcurrencys = App\Models\Addcurrency::where('id',$listing_details->currencys )->where('status', '0')->first();?>  

                                <p class="Payment_Plan_div_para4">Price starting at {{$addcurrencys->currency}}   {{ $listing_details->budgets }}</p>
                            </div>
                        </div>
                </div>
      </div>
</div>
    <!-- Payment Plan  -->
    <!-- Photo Gallery-->

<div class="container" id="photo_gallery" style="width: 97%!important;">
  <div class="row">
      <div class="col-12 text-center">
           <h1 class="divider" style="font-size: 25px;">Photo Gallery </h1>
      </div>
  </div>
</div>
<?php $listing_image = App\Models\ListingPropertyImage::where('list_property_id', $listing_details->id)->get();?>  

<div class="container mt-5" style="width: 97%!important;">

  <div class="row gallery">
    @forelse ($listing_image as $listing_images)
    <div class="col-md-3 col-sm-12 mb-3">
      <a href="{{ asset('/admin_images/Listing_property_images/'.$listing_images->list_pro_image) }}" class="big">
        <img src="{{ asset('/admin_images/Listing_property_images/'.$listing_images->list_pro_image) }}" alt="" title="" style="width:100%" />
      </a>
    </div>


    @empty
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center text-danger mt-5">
          <h1>No Listing Property Images Found </h1>
        </div>
      </div>
     
    </div>
  @endforelse

   
  </div>


</div>





<!-- Photo Gallery-->


<!-- Amenities -->

  <div  class="container" style="width: 97%!important;">
    <div class="row">
        <div class="col-md-12 col-sm-12 text-center">
       
           <h1 class="divider" style="font-size: 25px;">Amenities  </h1>

        </div>
    </div>
  </div>
  
  <div class="container mt-3" style="width: 97%!important;">
    <div class="row">
            <div class="col-12">
                <p class="erenity_b" style="text-align:justify;">
                    Serenity Mansions by Majid al Futtaim presents an unparalleled array of exceptional amenities and facilities meticulously designed to offer residents a truly opulent and holistic lifestyle. Immerse yourself in a world of indulgence as you embrace the state-of-the-art fitness centre, rejuvenating spa, and wellness facilities, all meticulously crafted to nurture your physical and mental well-being. Step into the beautifully landscaped gardens, where serenity and nature intertwine, providing a peaceful sanctuary for relaxation and rejuvenation. Unleash your vitality as you explore the sandy beach areas, jogging tracks, and cycling paths, inviting you to embark on invigorating outdoor adventures.
                </p>
                <p class="enveloped_b">Enveloped within this remarkable development are recreational lagoons adorned with pristine white sandy beaches, inviting residents to enjoy aquatic bliss and participate in their favourite water activities. Furthermore, dedicated areas for socializing and entertaining await, ensuring a convenient and vibrant lifestyle for all.</p>
            </div>
    </div>
  </div>
 
  <div class="container" style="width: 97%!important;">
        <div class="row">
                <div class="col-6">
                    <ul class="b_ul_hero">
                        <li>Swimming Pool</li>
                        <li>Sandy Beach</li>
                        <li>Shopping Mall</li>
                        <li>Lush Gardens</li>
                        <li>Dedicated Kids Park</li>
                      </ul>
                </div>
                  <div class="col-6">
                      <ul class="b_ul_hero">
                          <li>Jogging Tracks</li>
                          <li>Spa</li>
                          <li>Recreational Lagoons </li>
                          <li>Retail Outlets </li>
                          <li>Wellness Facilities </li>
                        </ul>
                  </div>
        </div>
  </div>

 <!-- Amenities -->

 <!-- Location -->


  <div id="location" class="container" style="width: 97%!important;">
    <div class="row">
        <div class="col-md-12 col-sm-12 text-center">
         
             <h1 class="divider" style="font-size: 25px;">Location </h1> 
        </div>
    </div>
  </div>

  <div class="container mt-3" style="width: 97%!important;">
    <div class="row">
        <div class="col-12">
            <p class="lifestyle_b" style="text-align:justify;">
                Serenity Mansions presents a gateway to an extraordinary lifestyle where every day brings new opportunities for exploration, relaxation, and indulgence. Whether you seek the thrill of watersports, the tranquillity of a sunset stroll along the beach, or the excitement of vibrant social gatherings, this remarkable location promises an abundance of attractions to suit every inclination. Nestled in the coveted enclave of Tilal Al Ghaf, Serenity Mansions enjoys an idyllic location that epitomizes luxury living at its finest. This exclusive community offers residents unparalleled access to pristine beaches and captivating waterfront attractions, providing a blissful retreat for those seeking an immersive coastal lifestyle.
             </p>
             <p class="ensures_b">Conveniently connected by major highways, Serenity Mansions ensures effortless navigation to your desired destinations, whether exploring the vibrant cityscape or embarking on exciting adventures beyond. The seamless fusion of nature, leisure, and urban living creates an enchanting tapestry that beckons you to discover many captivating attractions. Within this vibrant community, nature takes centre stage, intertwining effortlessly with the urban landscape. Immerse yourself in lush green spaces, where tranquil parks and gardens provide a serene backdrop for strolls and cherished moments with loved ones. Delight in the harmonious blend of contemporary amenities and nature’s untamed beauty creates a captivating environment that inspires and rejuvenates.</p>
        </div>
    </div>
  </div>

      <div class="container" style="width: 97%!important;">
        <div class="row">
            <div class="col-12">
                <ul class="b_minutes">
                    <li>10 Minutes - City Centre Me’aisem</li>
                    <li>15 Minutes - Mall of the Emirates </li>
                    <li>20 Minutes - Downtown Dubai </li>
                    <li>Lu25 Minutes - Al Maktoum International Airportsh </li>
                    <li>30 Minutes - Dubai International Airport  </li>
                  </ul>
            </div>
        </div>
      </div>
  
<!-- Location -->

<!-- Interiors and Units -->

  <div class="container" style="width: 97%!important;">
    <div class="row">
        <div class="col-md-12 col-sm-12 text-center">
           
             <h1 class="divider" style="font-size: 25px;">Interiors and Units </h1> 
        </div>
    </div>
  </div>
  
  <div class="container mt-3" style="width: 97%!important;">
    <div class="row">
        <div class="col-12">
            <p class="futtaim_b" style="text-align:justify;">
                Serenity Mansions by Majid al Futtaim is a testament to visionary design. A team of world-leading experts, including Nabil Gholam, Blink, and Desert INK, unite their creative prowess to curate an unparalleled living experience. Each exquisitely crafted residence spans three floors, complemented by a magnificent sky suite or penthouse, providing an extraordinary canvas to create your ideal sanctuary. Embrace the freedom of choice as you peruse a range of distinctive layouts and floor plans, allowing you to personalize your mansion according to your unique preferences and lifestyle. Choose from 6 to 7-bedroom mansions carefully crafted for the best living experience.
             </p>
              <p class="interior_b">Discover the enchanting interior options of Gaia and Atlas within the Luna residences, evoking a sense of timeless elegance. Meanwhile, the Ayla and Ara abodes boast the captivating design schemes of the Artist’s House and Writer’s House, imbuing every space with an artistic spirit and intellectual charm. Unveiling a realm of grandeur, these palatial properties are replete with luxurious amenities. Ascend effortlessly via the lift while numerous staff rooms ensure comfort and convenience. Indulge in the serenity of your swimming pool while a show kitchen beckons culinary masterpieces. A formal living room sets the stage for sophisticated gatherings while additional opulent features abound.</p>
        </div>
    </div>
  </div>
  

  <div class="container mb-5" style="width: 97%!important;">
    <div class="row">
        <div class="col-12">
            <ul class="b_bedrooms">
                <li>6 Bedrooms Ayla Mansion 11,730 sq. ft.+</li>
                <li>6 Bedrooms Luna Mansion 12,050 sq. ft.+</li>
                <li>7 Bedrooms Ara Mansion 12,720 sq. ft. +</li>
              </ul>
        </div>
    </div>
  </div>
  

 <!-- Interiors and Units -->

@endsection



@section('script')

{{-- interest Property Form Insert data Start --}}
<script>
     $(document).ready(function() {
  $('#register_two').click(function() {
    // alert('ajskdhasjk');
                var interest_name = document.getElementById("interest_name_two");
                var interest_email_two = document.getElementById("interest_email_two");
                var phone_two = document.getElementById("phone_two");
                var language = document.getElementById("language_two");
  
          var interest_message = document.getElementById("interest_message_two");
  
          if (interest_name.value === "") {
              $('#info_one_two').show();
              interest_name.classList.add("country_error");
              interest_name.focus();
  
          return false;
          }else{
  
          $('#info_one_two').hide();
          $("#interest_name").removeClass("country_error");
          } 
  
          if (interest_email_two.value === "") {
                  // alert("Please select an option.");
                  $('#info_six_two').show();
                  $('#valid_email_two').hide();
                  interest_email_two.classList.add("country_error");
                  interest_email_two.focus();
                   
                   return false;
                }else{
                  var email = $("#interest_email_two").val();
                       var emailRegex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
          
                      if (!emailRegex.test(email)) {
                          $('#info_six_two').hide();
                          $('#valid_email_two').show();
                          interest_email_two.classList.add("country_error");
                          interest_email_two.focus();
                      
                             
                       return false;
                       }
                   
                       $('#info_six_two').hide();
                       $('#valid_email_two').hide();
                  $("#interest_email_two").removeClass("country_error")
                }
  
                if (phone_two.value === "") {
              $('#show_three_two').show();
              phone_two.classList.add("country_error");
              phone_two.focus();
                  
              return false;
            }else{
  
              if (!$.isNumeric(phone_two.value)) {
          // alert("Please enter a valid number.");
          $('#valid_phone_two').show();
          $('#show_three_two').hide();
          phone_two.classList.add("country_error");
          phone_two.focus();
                
          return false;
          }
          $('#valid_phone_two').hide();
              $('#show_three_two').hide();
              
              $("#phone_two").removeClass("country_error");
            }
  
            if (language.value === "") {
       // alert("Please select an option.");
  
       $('#show_one_two').show();
       language.classList.add("country_error");
       language.focus();
     
                
          return false;
        }else{
          
          $("#language").removeClass("country_error");
          $('#show_one_two').hide();
        }
  
  
        if (interest_message.value === "") {
  
          $('#show_two_two').show();
          interest_message.classList.add("country_error");
          interest_message.focus();
                
          return false;
          }else{
          $('#show_two_two').hide();
          
          $("#interest_message").removeClass("country_error");
          }
  
  
  
  });
  });
  </script>

@endsection
  
  

  

