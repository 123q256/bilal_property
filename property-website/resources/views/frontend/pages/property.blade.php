@extends('layouts.app')

@section('content')
<style>
  

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
  max-width: 60%;
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

</style>
<!-- Your button to open the modal -->
{{-- <button id="open-modal-btn">Open Modal</button> --}}

<!-- Modal -->
<div class="cl-popup-wrap" style="display: none;">
  <div class="cl-popup-box" style="width: 60%;margin-top:1px;">
    <div class="cl-popup-box-h">
      <div class="cl-popup-box-title pl-3">
        REGISTER YOUR INTEREST
      </div>
      <div class="cl-popup-box-content">
        <!-- Your modal body content goes here -->
        <form method="post" action="#">
     
        <div class="form-group mt-2">
          <label class="mb-2" for="form_name"><strong>Full Name</strong></label>
          <input type="text" style="background-color: #f2f2f2;" class="form-control" id="form_name" aria-describedby="emailHelp" placeholder="Enter Full Name">
        </div>
        <div class="form-group mt-2">
          <label class="mb-2" for="form_email"><strong>Email</strong></label>
          <input type="email" style="background-color: #f2f2f2;" class="form-control" id="form_email" aria-describedby="emailHelp" placeholder="Enter Your email">
        </div>
        <div class="form-group mt-2">
  
          <input type="text" style="background-color: #f2f2f2;" class="form-control" id="" aria-describedby="emailHelp" placeholder="">
        </div>

        <div class="form-group mt-2 mb-2">
          <label class="mb-2" for="exampleFormControlSelect1"><strong> Preferred Language</strong></label>
          <select style="background-color: #f2f2f2;" class="form-control" id="exampleFormControlSelect1">
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
        </div>

        <div class="form-group mt-2 ">
          <label class="mb-2" for="exampleFormControlTextarea1"> <strong>Message</strong></label>
          <textarea style="background-color: #f2f2f2;" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="form-group mt-2">
          <button type="button" class="btn btn-primary w-100">Register Your Interest</button>
        </div>

       

      </form>
           

      </div>
    </div>
    <div class="cl-popup-box-closer">&times;</div>
  </div>
</div>

{{-- Form Model Popup Start  --}}

<!-- Property Type Start  -->



 <!-- OFF PLANE Projects in Dubai -->

 <div class="container property_main_to_container" style="width: 95%!important;">
    <div class="row">
          <div class="col-lg-9 col-9 ">
              <h6 class="project_heading_6">OFF PLANE Projects in Dubai</h6>
          </div>
          <div class="col-lg-3 col-3 d-flex flex-row-reverse" >
            <div style="width: 26px;margin-left: 23px;" >
              <svg id="list" style="cursor: pointer;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="list-ul" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-list-ul fa-lg"><path fill="currentColor" d="M64 144a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM64 464a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm48-208a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z" class=""></path></svg>
          </div>
              <div style="width: 26px;margin-left: 16px;">
                  <svg id="grid" style="cursor: pointer;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="grid-2" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-grid-2 fa-lg"><path fill="currentColor" d="M224 80c0-26.5-21.5-48-48-48H80C53.5 32 32 53.5 32 80v96c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48V80zm0 256c0-26.5-21.5-48-48-48H80c-26.5 0-48 21.5-48 48v96c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48V336zM288 80v96c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48H336c-26.5 0-48 21.5-48 48zM480 336c0-26.5-21.5-48-48-48H336c-26.5 0-48 21.5-48 48v96c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48V336z" class=""></path></svg>
              </div>
             
          </div>
    </div>
</div>


<!-- OFF PLANE Projects in Dubai -->

<!-- Marocco at Damac Lagoon -->

<div class="container pb-5 pt-3">
  <div class="row row-cols-1 row-cols-md-2 g-4" id="products">

    <?php $listingPropertys = App\Models\ListingProperty::where('status', '0')->paginate(6);?>  
              @forelse ($listingPropertys as $listingProperty)
              <div class="col-md-4">
                <div class="card">
                  <?php $listing_image = App\Models\ListingPropertyImage::where('list_property_id', $listingProperty->id)->first();?>  
                  <a href="{{ url('/propert_details'.'/'.$listingProperty->id) }}"><img src="{{ asset('/admin_images/Listing_property_images/'.$listing_image->list_pro_image) }}" width="100%" alt="Palm Springs Road"/></a>
                  <div class="card-body">
                    <?php 
                    // dd($listing_image->list_pro_image);
                    ?>
                    <h5 class="card-title pb-3 property_list">{{  $listingProperty->title_name }}</h5>
                    <div class="container pb-2">
                          <div class="row">
                            <?php $developers = App\Models\Developer::where('id', $listingProperty->about_the_developer)->first();?> 
                            <?php $locations = App\Models\Location::where('id', $listingProperty->location)->first();?> 
                              <div class="col-6 p-0" >
                                <i class="bi bi-geo-alt-fill"></i>
                                <a class="hoverone" href="{{ url('/check_loaction').'/'.$locations->id  }}">{{ $locations->location }}</a>
                                  </div>
                              <div class="col-6 p-0">
                                <i class="bi bi-building-down"></i>
                                <a class="hovertwo" href="#">{{ $developers->developer_name }}</a></div>
                              </div>
                          </div>



                          <?php $typeofpropertys = App\Models\TypeOfProperty::where('id', $listingProperty->type_of_property)->first();?> 
                          <?php $bedrooms = App\Models\Bedroom::where('id', $listingProperty->number_of_bedrooms)->first();?> 
                      <p class="card-text"> Types: <span>{{ $typeofpropertys->property_type }} |  Bed Room : {{ $bedrooms->number_of_bed }}</span></p>
                        <div class="container">
                          <div class="row">
                              <div class="col-xl-6 col-lg-12 mt-2"  ><a href="{{ url('/propert_details'.'/'.$listingProperty->id) }}" style="line-height: 1.8" class="btn btn-primary col-12 details_a1">DETAILS</a>
                              </div>
                              <div class="col-xl-6 col-lg-12 mt-2" class="btn btn-primary"><button value="{{ $listingProperty->id }}"   class="btn btn-primary col-12 details_a2 open-modal-btn">REGISTER NOW</button>
                              </div>
                          </div>
                        </div>
                  </div>
                </div>
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
              {!! $listingPropertys->withQueryString()->links('pagination::bootstrap-5'); !!}

           
              
        

   
  </div>

<!-- Marocco at Damac Lagoon -->
<!-- Grid list Property -->


<div class="container products_flex mb-2"  style="display: none;">
<div class="row">
    <div class="container" style="width: 95%!important;" >
        <div class="dorp_property_list" > 
                <div style="float: left;margin-bottom:3px"> 
                    <h6 style="padding-top: 10px; ">Filter :</h6>
                </div>
      
     
            <div class="dropdown grid_drop_down_item1" >
              <select class="filter_dropdown" name="wgtmsr" id="wgtmsr" >
                <option  >Property type</option>
                <option value="gm">Gm</option>
                <option value="pound">Pound</option>
                <option value="MetricTon">Metric ton</option>
                <option value="litre">Litre</option>
                <option value="ounce">Ounce</option>
              </select>
            </div>
           
           
            
            <div class="dropdown grid_drop_down_item2" >
              <select class="filter_dropdown" name="wgtmsr" id="wgtmsr" >
                <option  >Bed</option>
                <option value="gm">Gm</option>
                <option value="pound">Pound</option>
                <option value="MetricTon">Metric ton</option>
                <option value="litre">Litre</option>
                <option value="ounce">Ounce</option>
              </select>
            </div>
      
            <div class="dropdown grid_drop_down_item3" >
              <select class="filter_dropdown" name="wgtmsr" id="wgtmsr" >
                <option  >Developer</option>
                <option value="gm">Gm</option>
                <option value="pound">Pound</option>
                <option value="MetricTon">Metric ton</option>
                <option value="litre">Litre</option>
                <option value="ounce">Ounce</option>
              </select>
            </div>
     
            <div class="dropdown grid_drop_down_item4" >
              <select class="filter_dropdown" name="wgtmsr" id="wgtmsr" >
                <option  >Location</option>
                <option value="gm">Gm</option>
                <option value="pound">Pound</option>
                <option value="MetricTon">Metric ton</option>
                <option value="litre">Litre</option>
                <option value="ounce">Ounce</option>
              </select>
            </div>
     
            <div class="dropdown grid_drop_down_item5" >
              <select class="filter_dropdown" name="wgtmsr" id="wgtmsr" >
                <option  >Payment Plan</option>
                <option value="gm">Gm</option>
                <option value="pound">Pound</option>
                <option value="MetricTon">Metric ton</option>
                <option value="litre">Litre</option>
                <option value="ounce">Ounce</option>
              </select>
            </div>
     
       
            <div class="dropdown grid_drop_down_item6" >
              <select class="filter_dropdown" name="wgtmsr" id="wgtmsr" >
                <option  >Completion </option>
                <option value="gm">Gm</option>
                <option value="pound">Pound</option>
                <option value="MetricTon">Metric ton</option>
                <option value="litre">Litre</option>
                <option value="ounce">Ounce</option>
              </select>
            </div>
     
            <div class="dropdown grid_drop_down_item6" >
              <h6 class="allpr_heading">Show  </h6>
              <select  name="wgtmsr" id="wgtmsr" style="width: 96px;background-color: #F7F7F7;color: #5C5C5C;padding-top:9px;padding-bottom: 9px;padding-left:10px;border: none;">
                <option  >all </option>
                <option value="gm">Gm</option>
                <option value="pound">Pound</option>
                <option value="MetricTon">Metric ton</option>
                <option value="litre">Litre</option>
                <option value="ounce">Ounce</option>
              </select>
            </div>
     
       
      
      

            <div class="Reset_pro_detals">
                <a href=""  class="achor_prop_tetails">
                    <i class="fa fa-refresh" aria-hidden="true"></i>   Reset
                 </a>
            </div>
            <div class="Search_pro_detals">
                <button class="btn Search_pro_detals_btn" >Search</button>
            </div> 
    </div>
    </div> 
    
</div>
</div>
<?php 
// dd(asset('/'));
    ?>

<div class="container" style="width: 95%!important;">
  <div class="row row-cols-1 row-cols-md-2 g-4 products_flex" style="display: none; overflow-x: auto;">
 <table class="table" width="100%" >
            <tr >
                <th>property image</th>
                <th>Title</th>
                <th>Developer</th>
                <th>Property Area</th>
                <th>Beds</th>
                <th>Property Types</th>
                <th>Completion</th>
            </tr>
         




            <?php $listingPropertys11 = App\Models\ListingProperty::where('status', '0')->get();?>  
            @forelse ($listingPropertys11 as $listingProperty11)
            <?php $listing_image11 = App\Models\ListingPropertyImage::where('list_property_id', $listingProperty11->id)->first();?>  
          <tr>
            <td><img src="{{ asset('/admin_images/Listing_property_images/'.$listing_image11->list_pro_image) }}" width="40px"></td>

            <?php $typeofpropertys11 = App\Models\TypeOfProperty::where('id', $listingProperty11->type_of_property)->first();?> 
            <?php $bedrooms11 = App\Models\Bedroom::where('id', $listingProperty11->number_of_bedrooms)->first();?> 
            <?php $developers11 = App\Models\Developer::where('id', $listingProperty11->about_the_developer)->first();?> 
            <?php $locations11 = App\Models\Location::where('id', $listingProperty11->location)->first();?> 

            <td>{{  $listingProperty11->title_name }}</td>
            <td> {{ $developers11->developer_name }}</td>
            <td>{{ $locations11->location }}</td>
            <td>{{ $bedrooms11->number_of_bed }}</td>
            <td>{{ $typeofpropertys11->property_type }}</td>
            <td>2026</td>
        </tr>


            @empty
              <div class="container">
                <div class="row">
                  <div class="col-md-12 text-center text-danger mt-5">
                    <h1>No Listing Property Found </h1>
                  </div>
                </div>
               
              </div>
            @endforelse
    
       
        
 </table>    
  </div>
</div>
</div>
<!-- Property Type end -->
@endsection

@section('script')
<script>
 // Open the modal with zoom effect
function openModal() {
  const modal = document.querySelector('.cl-popup-wrap');
  modal.style.display = 'flex';
  setTimeout(() => {
    modal.querySelector('.cl-popup-box').classList.add('active');
  }, 100);
}

// Close the modal with zoom effect
function closeModal() {
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


@endsection