@extends('layouts.app')

@section('title','Search Property')
@section('content')

  
<style>

</style>
<!-- Your button to open the modal -->
{{-- <button id="open-modal-btn">Open Modal</button> --}}

<!-- Property Type Start  -->



 <!-- OFF PLANE Projects in Dubai -->

 <div class="container property_main_to_container" style="width: 95%!important;">
    <div class="row">
          <div class="col-lg-9 col-9 ">
              <h6 class="project_heading_6">OFF PLANE Projects in Dubai</h6>
          </div>
          <div class="col-lg-3 col-3 d-flex flex-row-reverse" >
          
             <h5>Home » Dubai Projects</h5>

          
             
          </div>
    </div>
</div>


<!-- OFF PLANE Projects in Dubai -->

<!-- Marocco at Damac Lagoon -->

<div class="container pb-5 pt-3">
  <div class="row row-cols-1 row-cols-md-2 g-4" id="products">
              
            
              
             @forelse ($ListingProperty as $Listing)
             <?php
  // dd($Listing);
             ?>

             <div class="col-md-4">
                <div class="card">
                   <a href="{{ url('/propert_details'.'/'.$Listing->id) }}"> <img src="{{ asset('/admin_images/Listing_property_images/'.$Listing->photo) }}" style="width: 100%" alt="Palm Springs Road"/></a>
                  <div class="card-body">
                    <h5 class="card-title pb-3 property_list">{{ $Listing->title_name }}</h5>
                    <div class="container pb-2">
                          <div class="row">
                              <div class="col-6 p-0" >
              <?php $locations = App\Models\Location::where('id', $Listing->location)->first();?> 

                                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                                  <a class="hoverone" href="{{ url('/check_loaction').'/'.$locations->id  }}">{{ $locations->location }}</a></div>
                              <div class="col-6 p-0">
                                <?php $developers = App\Models\Developer::where('id', $Listing->about_the_developer)->first();?> 
                                  <i class="fa fa-building" aria-hidden="true"></i>
                                  <a class="hovertwo" href="#">{{ $developers->developer_name }}</a></div>
                              </div>
                          </div>
                          <?php $typeofpropertys = App\Models\TypeOfProperty::where('id', $Listing->type_of_property)->first();?> 
                    <?php $bedrooms_details = App\Models\Bedroom::where('id', $Listing->number_of_bedrooms)->first();?> 

                      <p class="card-text"> Types: <span>{{ $typeofpropertys->property_type }} |  Bed {{ $bedrooms_details->number_of_bed }}</span></p>
                        <div class="container">
                          <div class="row">
                              <div class="col-xl-6 col-lg-12 mt-2"  ><a href="{{ url('/propert_details'.'/'.$Listing->id) }}" style="line-height: 1.8!important;"  class="btn btn-primary col-12 details_a1">DETAILS</a>
                              </div>
                              <div class="col-xl-6 col-lg-12 mt-2" class="btn btn-primary"><button value="{{ $Listing->id }}" class="btn btn-primary col-12 details_a2 open-modal-btn">REGISTER NOW</button>
                              </div>
                          </div>
                        </div>
                  </div>
                </div>
            </div>
             @empty
             <div class="col-md-12 " style="text-align: center">
              <h2>No results found. </h2>
            </div>
             @endforelse
    
  </div>

<!-- Marocco at Damac Lagoon -->
</div>
<!-- Property Type end -->
@endsection




@section('script')



@endsection