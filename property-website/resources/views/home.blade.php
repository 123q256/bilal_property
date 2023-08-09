@extends('layouts.app')
@section('title','Home')

@section('content')

<!-- Slider Start  -->
<div class="third_main_row">
    <div class="container">
      
        <div class="row">
            <div class="col-md-12 set_header_image ">
                <div style="width: 100%;">
                    <h1>Welcome to <span style="color: #0367A6;">Off</span> <br><span style="color: #0367A6;">plan property</span>  <br>Website</h1><p>We look forward to help you finding your dream home and best<br> investment options for you</p>
                </div>
            </div>
        </div>
  
</div>
</div><br>
<!-- Slider END  -->




<div class="four_main_row">
    <div class="container">
      

            <div class="row">
                <div class="col-md-4 "><h1 class="trusted"><b>Our Trusted<br> Partners</b></h1><p  class="trusted_para">We look forward to help you finding your dream home and best investment options for you</p></div>
               
                <div class="col-md-8 mx-auto" style="margin-top: 30px;">
                    <img src="{{ asset('front_end/images/15.png') }}" width="100%" alt="">
                    <!-- <div style="margin-left: 50px; overflow: hidden;">
                        <div class="col one_image"><img src="images/2.png" alt="" width="200"></div>
                        <div class=" col two_image"><img src="images/3.png" alt="" width="200"></div>
                        <div class="col three_image"><img src="images/4.png" alt="" width="170"></div>
                        <div class="col four_image"><img src="images/5.jpeg" alt="" width="200"></div>
                        <div class="col five_image"><img src="images/6.png" alt="" width="200"></div>
                        <div class="col six_image"><img src="images/7.png" alt="" width="200"></div>
                    </div> -->
                </div>
                
                
           
        </div>
      
    </div>
</div><br><br>


<div class="five_main_row">
    <div style="background-color: rgba(161, 199, 224, 0.54);" class="container">
    <div class="row ">
        <div class="col-md-12 text-center compare_b"><h1><span style="color: #0367A6;">COMPARE</span> Off Plan Projects</h1><p>We just need a few details about you</p></div>
    </div><br>
    <div class="row mx-auto hello_clas">
       <div class="col-md-1"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="col-lg-3  compere_one">
                <a class="your_name" href="{{ url('/contacts') }}"><div class="inner_com_one text-center"><h1>1</h1><h2>Tell us a bit about you</h2><p>Your name, address and <br>Nationality</p></div></a>
            </div>
            <div class="col-lg-3  compere_two">
                <div class="inner_com_two text-center"><h1>2</h1><h2>What are you Looking for?</h2><p>Property type, number of bedrooms, <br>areas etc </p></div>
            </div>
            <div class="col-lg-3 compere_three">
                <div class="inner_com_three text-center"><h1>3</h1><h2>Further Information</h2><p>Other options like delivery day, post<br> pay etc</p></div>
            </div>
            <div class="col-md-1"></div>
        </div>
        <br><br>
        <div  class="row">
            <div class="col-md-12 text-center">
                @guest
                <button type="button" class="quote_btn" ><a style="color: #F8F8F8;text-decoration:none;" href="{{ url('/forms') }}">Start a quote</a></button>
                @else
                <button type="button" class="quote_btn" ><a style="color: #F8F8F8;text-decoration:none;" href="{{ url('/form_two') }}">Start a quote</a></button>
                @endguest
            </div>
        </div>
</div>
</div>
<div class="six_main_row">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center would_bgi"><h1>What would you like to<br> Compare</h1></div>
        </div>
        
    </div>
</div>

<div class="seven_main_row">
    <div class="container" style="background-color: #0367A6;">
        <div class="row">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="col-md-5  one_img_set" style="margin-top: 70px;">
                
                <img src="{{ asset('front_end/images/8.jpg') }}"  width="100%" style="padding: 38px;border-radius: 12%;"><h1>Compare Apartments in Dubai</h1>
            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="col-md-5  two_img_set" style="margin-top: 70px;"><img src="{{ asset('front_end/images/9.jpg') }}"  width="100%" style="padding: 38px;border-radius: 12%;"><h1>Compare Apartments in Dubai</h1></div>
           
        </div><br><br><br>
        <div class="row">
            <div class="col-md-12 text-center about_bs"><h1>Find Out More about Off plan properties</h1></div>
        </div>
      
    </div>
</div>


<div class="eight_main_row">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center suitable_b"><h1>Search for Best Suitable<br> Plan for you</h1><p>Remember you can search by property, Size and budget</p></div>
        </div>
    </div>
</div>




<div class="nine_main_row">
    <div class="container back_imag_st">
        <form action="{{ url('search-property') }}" method="post">
            @csrf
        <div class="row d-flex justify-content-center align-items-center">
            {{-- <div class="col-md-1 yara_block"></div> --}}
            <div class="col-md-10 nest_back_color d-flex justify-content-center align-items-center" style="margin-top: 30px;background-color: #131B27;
            color: white;
            padding: 10px;">
                
                <?php $TypeOfPropertys = App\Models\TypeOfProperty::where('status', '0')->get();?> 

                <div style="float: left;"  class="budget"><h1>Type of Property</h1>
                    <select class="select_bil" name="typeofproperty" id="cars">
                        <option disabled selected value="">Choice property type </option>
                        @forelse ($TypeOfPropertys as $TypeOfProperty)
                            <option value="{{ $TypeOfProperty->id }}">{{ $TypeOfProperty->property_type }}</option>
                            @empty
                            <option value="option2">No Found </option>
                            @endforelse
                      </select>
                </div>
                <?php $PaymentPlans = App\Models\PaymentPlan::where('status', '0')->get();?>  

                <div style="float: left;" class="budget"><h1>Budget</h1>
                    <select class="select_bil" name="paymentplan" id="cars">
                        <option disabled selected value="">Choice price Range</option>
                        @forelse ($PaymentPlans as $item)
                        <option value="{{ $item->id }}">{{ $item->payment_plane_years }}</option>
                        @empty
                        <option value="">No Found</option>
                        @endforelse
                     
                      </select>
                </div>
                <?php 
                $Bedrooms = App\Models\Bedroom::where('status', '0')->get();
                ?> 
                <div style="float: left;" class="budget"><h1>No of Bed-Room</h1>
                    <select class="select_bil" name="bedroom" id="cars">
                        <option disabled selected value="">Choice location</option>
                        @forelse ($Bedrooms as $Bedroom)
                        <option value="{{ $Bedroom->id }}">{{ $Bedroom->number_of_bed }}</option>
                        @empty
                        <option value="option2">No Found</option>
                        @endforelse
                      </select>
                </div>
                <?php $Locations = App\Models\Location::where('status', '0')->get();?>  
                <div style="float: left;" class="budget"><h1>Land</h1>
                    <select class="select_bil" name="location" id="cars">
                        <option disabled selected value="">Choice location</option>
                        @forelse ($Locations as $Location)
                              <option value="{{ $Location->id }}">{{ $Location->location }}</option>
                              @empty
                              <option value="option2">No Found </option>
                              @endforelse
                      </select>
                </div>
                <div class="last_btns">
                    <input type="submit" value="Search" class="btn btn-primary">
                    {{-- <i class="bi bi-search"></i> --}}
                   {{--  --}}
                </div>
            </div>
            {{-- <div class="col-md-1"></div> --}}
        </div>
    </form>
    </div>
</div>


<div class="ten_main_row">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center listings"><h1>Check Out the Listings</h1></div>
        </div>
    </div>
</div>

<div class="eleven_main_row">
    <div class="container">
        <div class="row">

            <?php $listingPropertys = App\Models\ListingProperty::where('status', '0')->limit(3)->get();?>  
            @forelse ($listingPropertys as $listingProperty)
           
            <div class="col-md-4  b_three_imges_one">
                <?php $listing_image = App\Models\ListingPropertyImage::where('list_property_id', $listingProperty->id)->first();?>  
                <a href="{{ url('/propert_details'.'/'.$listingProperty->id) }}"><img src="{{ asset('/admin_images/Listing_property_images/'.$listing_image->list_pro_image) }}" width="100%" alt=""></a><h1 >{{  $listingProperty->title_name }}</h1>
                <div>
                    <?php $developers = App\Models\Developer::where('id', $listingProperty->about_the_developer)->first();?> 
                    <?php $locations = App\Models\Location::where('id', $listingProperty->location)->first();?> 
                    <div class="first_b_icon" style="float: left;"><i class="bi bi-geo-alt-fill"></i></div>
                <div class="icons_bilal" style="float: left;margin-right: 30px;"><p>&nbsp;&nbsp; <a class="hoverone" href="{{ url('/check_loaction').'/'.$locations->id  }}">{{ $locations->location }}</a></p></div>


                </div>
             
                <div>
                    <div class="first_b_icon_two" style="float: left;"><i class="bi bi-building-down"></i></div>
                    <div class="first_b_icon_two_p" style="float: left;margin-right: 30px;"><p>&nbsp;&nbsp;<a class="hovertwo" href="#">{{ $developers->developer_name }}</a></p></div>
                
                </div>
                <?php $typeofpropertys = App\Models\TypeOfProperty::where('id', $listingProperty->type_of_property)->first();?> 
                <?php $bedrooms = App\Models\Bedroom::where('id', $listingProperty->number_of_bedrooms)->first();?> 
                <div><p>&nbsp;</p></div>
                <div><p  style="padding-left: 3px;">Type: {{ $typeofpropertys->property_type }} | Bed : {{ $bedrooms->number_of_bed }}</p></div>
            </div>

            @empty
            <div class="container">
              <div class="row">
                <div class="col-md-12 text-center text-danger mt-5">
                  <h1>No Listing Property Found </h1>
                </div>
              </div>
             
            </div>
          @endforelse
           
        </div>
    </div>
</div>


<div class="twelve_main_row">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 text-center mar_check mt-5">

                <a style="text-decoration: none;color:#ffffff" href="{{ url('/propert_types') }}"><button class="projects_btns" type="button">View all projects</button></a>
            </div>
        </div>
    </div>
</div>

{{-- <div class="thirteen_main_row">
    <div style="background-color: #F8F8F8;" class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-4 mb-4 sec_last_code">
                <input  type="text" placeholder="Name*" class="form-control name_set">
                <input  type="text" placeholder="Email*" class="form-control email_set">
                <button  class="Sign_brms" type="button">Sign Up</button>
            </div>
        </div>
    </div>
</div> --}}

@endsection
