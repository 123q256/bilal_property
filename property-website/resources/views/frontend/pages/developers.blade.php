@extends('layouts.app')

@section('title','Developers')

@section('content')


<style>
  @import url(https://fonts.googleapis.com/css?family=Roboto:400,100,900);

html,
body {
  -moz-box-sizing: border-box;
       box-sizing: border-box;
  height: 100%;
  width: 100%; 
  background: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 400;
}
 
.wrapper {
  display: table;
  height: 100%;
  width: 100%;
}

.container-fostrap {
  display: table-cell;
  padding: 1em;
  text-align: center;
  vertical-align: middle;
}
/* .fostrap-logo {
  width: 100px;
  margin-bottom:15px
}
h1.heading {
  color: #fff;
  font-size: 1.15em;
  font-weight: 900;
  margin: 0 0 0.5em;
  color: #505050;
} */
/* @media (min-width: 450px) {
  h1.heading {
    font-size: 3.55em;
  }
}
@media (min-width: 760px) {
  h1.heading {
    font-size: 3.05em;
  }
}
@media (min-width: 900px) {
  h1.heading {
    font-size: 3.25em;
    margin: 0 0 0.3em;
  } 
} */
.card {
  display: block; 
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12); 
    transition: box-shadow .25s; 
}
.card:hover {
  box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}
.img-card {
  width: 100%;
  height:200px;
  border-top-left-radius:2px;
  border-top-right-radius:2px;
  display:block;
    overflow: hidden;
}
.img-card img{
  width: 100%;
  height: 200px;
  object-fit:cover; 
  transition: all .25s ease;
} 
/* .card-content {
  padding:15px;
  text-align:left;
}
.card-title {
  margin-top:0px;
  font-weight: 700;
  font-size: 1.65em;
}
.card-title a {
  color: #000;
  text-decoration: none !important;
}
.card-read-more {
  border-top: 1px solid #D4D4D4;
}*/
.card-read-more a {
  text-decoration: none !important;
  padding:1px;
  margin:15px;
  /* font-weight:600; */
  /* text-transform: uppercase */
} 


/* Styles for the custom modal overlay */
.custom-modal-overlay {
  display: none;
  position: fixed;
  z-index: 9999;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.8);
  justify-content: center;
  align-items: flex-start; /* Align items to the top */
}


/* Styles for the custom modal overlay */
.custom-modal-overlay {
  display: none;
  position: fixed;
  z-index: 9999;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.8);
  justify-content: center;
  align-items: flex-start; /* Align items to the top */
}

/* Styles for the custom modal */
.custom-modal {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  /* max-width: 800px; Adjust the maximum width as needed for the large modal */
  width: 80%; /* Set the width for smaller viewports */
  margin-left: auto;
  margin-right: auto;
  position: relative;
  margin-top: 50px; /* Add top margin to create space for the close button */
  overflow-y: auto; /* Enable vertical scrolling when the content overflows */
  max-height: calc(100% - 100px); /* Limit the modal height to avoid overflowing the screen */
}

/* Styles for the close button */
.close-btn {
  position: absolute;
  top: 10px;
  right: 10px;
  cursor: pointer;
  font-size: 24px;
}

/* Add any additional styles to customize the modal appearance */







</style>


<!-- The custom modal -->
<div class="custom-modal-overlay" id="customModalOverlay">
  <div class="custom-modal">
    <span class="close-btn" id="closeModalBtn">&times;</span>
    <h2 style="  padding: 18px;margin: 3px;font-size: 25px; font-weight: bold;}">Developer Listing Property</h2>
    <input type="hidden" class="hidden_developer" id="hidden_developer" name="hidden_developer">
    <div class="modal-content">


      <div id="responseContainer"></div>
      
      <div class="container pb-5 pt-3">

        <div class="container products_flex mb-2">
            <div class="row">
                <div class="container" style="width: 95%!important;" >
                    <div class="dorp_property_list" > 
                        <div style="float: left;margin-bottom:3px"> 
                            <h6 style="padding-top: 10px; ">Filter :</h6>
                        </div>
                         <div class="dropdown grid_drop_down_item1" >
                            <?php $locations_fileters = App\Models\Location::where('status', '0')->get(); ?> 
                        <select onchange="filterfunctionTwo(this)" style="width:130px;" class="filter_dropdown" name="wgtmsr" id="areafilter" >
                            <option value="" >Location</option>
                            @foreach($locations_fileters as $key => $locations_fileter)
                            <option value="{{ $locations_fileter->id }}">{{ $locations_fileter->location }}</option>
                            @endforeach
                        </select>
                        </div> 
                      
                    
                         <div class="dropdown grid_drop_down_item2">
                            <?php $bedroomsfilters = App\Models\Bedroom::where('status', '0')->get();   ?> 
    
                        <select onchange="filterfunctionTwo(this)" class="filter_dropdown" style="width:130px;" name="wgtmsr" id="bedroomfilter" >
                            <option  value="" >Bedroom</option>
                            @foreach($bedroomsfilters as $key => $bedroomsfilter)
                        
                          
                            <option value="{{ $bedroomsfilter->id }}">{{ $bedroomsfilter->number_of_bed }}</option>
                            @endforeach
                            
                    
                        </select>
                        </div> 
                
                         <div class="dropdown grid_drop_down_item3" >
                    <?php $typeofpropertys_filters = App\Models\TypeOfProperty::where('status','0')->get(); ?> 
    
                        <select onchange="filterfunctionTwo(this)" class="filter_dropdown" name="wgtmsr" id="propertyfilter" >
                            <option value="" >Property Type</option>
                    @foreach($typeofpropertys_filters as $key => $typeofpropertys_filter)
    
                
                  
                    <option value="{{ $typeofpropertys_filter->id }}">{{ $typeofpropertys_filter->property_type }}</option>
                    @endforeach
                         
                        </select>
                        </div> 
                
                         <div class="dropdown grid_drop_down_item4"> 
                    <?php $CompletionDate_filters = App\Models\CompletionDate::where('status','0')->get(); ?> 
    
                        <select onchange="filterfunctionTwo(this)" class="filter_dropdown" name="wgtmsr" id="completionfilter" >
                            <option value=""  >Completion Date</option>
                            @foreach($CompletionDate_filters as $key => $CompletionDate_filter)
                            <option value="{{ $CompletionDate_filter->id }}">{{ $CompletionDate_filter->completions }}</option>
                            @endforeach
                         
                        </select>
                        </div>
               
                          <div class="dropdown grid_drop_down_item5" >
                          <?php #$price_filters = App\Models\Price::selectRaw('DISTINCT price_listing')->where('developers_id', $developers->id)->get(); ?>
                        <select onchange="filterfunctionTwo(this)"  class="filter_dropdown" name="wgtmsr" id="pricefilter" >

                        </select>
                        </div>  
                
                       <div class="dropdown grid_drop_down_item6" >
                        <select onchange="filterfunctionTwo(this)"  class="filter_dropdown" name="wgtmsr" id="sqfootfilter" >
                      
                        </select>
                        </div> 
                
                    
                        <div class="Reset_pro_detals">
                            <a type="button" id="resetButton_two" class="achor_prop_tetails">
                                <i class="fa fa-refresh" aria-hidden="true"></i>Reset
                            </a>
                        </div>
                        {{-- <div class="Search_pro_detals">
                            <button class="btn Search_pro_detals_btn" >Search</button>
                        </div>  --}}
                    </div>
                </div> 
            </div>
        </div>
        <div class="container" style="width: 95%!important;">
            <div class="row"  style="overflow-x: auto; white-space: nowrap;">
                <table class="table" id="myTable" >
                    <thead>
                        <tr>
                            <th>image</th>
                            <th>Title</th>
                            <th>Developer</th>
                            <th>Area</th>
                            <th>Beds</th>
                            <th>Property Types</th>
                            <th>Completion</th>
                            <th>Price</th>
                            <th>Sqft</th>
                        </tr>
                    </thead>
                    <tbody class="bilal" id="addData">
                  
                 
                </tbody>
                </table>    
            </div>
        </div>
    </div>
    

      
    </div>
  </div>
</div>

<!-- Property Type Start  -->

<div class="container property_main_to_container" style="width: 95%!important;">
  <div class="row">
    <div class="col-lg-9 col-9">
        <h6 class="project_heading_6">Dubai Real Estate Developers</h6>
    </div>
  </div>
</div>


<!-- Marocco at Damac Lagoon -->

<section class="wrapper">
    <div class="container-fostrap">
        <div class="content">
            <div class="container">
                <div class="row" id="products">

                    <?php $developers = App\Models\Developer::where('status', '0')->get(); ?>  
                    @forelse ($developers as $developer)
                    <div class="col-md-6 col-lg-3">
                      <div class="card">

                        <a href="{{ url('/developer_detail'.'/'.$developer->id) }}" class="img-card"><img src="{{ asset('/admin_images/developer_logo/'.$developer->developer_logo) }}" style="padding: 15px;" alt="Palm Springs Road"/></a>

                          <?php 
                          // dd($listing_image->list_pro_image);
                          ?>


                          <div class="card-read-more">
                            <button id="hellodo" type="button" value="{{ $developer->id }}" style="background-color: #333333;color:#fff;border:none;" class="openModalBtn setbutton" >Project List</button>
                           

                            <a href="{{ url('/developer_detail' .'/' .$developer->id) }}" style="padding-left: 20px;
                              padding-right: 20px;" class="btn btn-primary details_a1">DETAILS</a>
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
                        
                </div>
            </div>  
        </div>
    </div>
</section>

@endsection





@section('script')




@endsection