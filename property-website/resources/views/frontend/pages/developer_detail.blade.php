@extends('layouts.app')

@section('title','Developers')

@section('content')

<style>
    .hello_des{
        padding-top: 51px;
        padding-bottom: 20px;
padding-left: 15px;
    }
    .justfydes {
  text-align: justify;
}
img.alignright {
  float: right;
  margin: 0 0 2.5em 2.5em;
}



</style>
<!-- Property Type Start  -->

<div class="container property_main_to_container" style="width: 95%!important;">
  <div class="row">
    <div class="col-lg-9 col-9">
        <h6 class="project_heading_6">Dubai Properties</h6>
    </div>
  </div>
</div>


<!-- Marocco at Damac Lagoon -->
<div class="container" style="width: 95%!important;">
    <div class="row">
      <div class="col-md-8">
          <p class="hello_des">{{ $developers->description }}</p>
      </div>
      <div class="col-md-4">
      <div style="margin: 40px;">
        <img src="{{ asset('/admin_images/developer_logo/'.$developers->developer_logo) }}" width="100%" alt="">
      </div>
    </div>
    </div>
  </div>

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
                    <select onchange="filterfunction(this)" style="width:180px;" class="filter_dropdown" name="wgtmsr" id="areafilter" >
                        <option value="" >Select By Location</option>
                        @foreach($locations_fileters as $key => $locations_fileter)
                        <option value="{{ $locations_fileter->id }}/{{ $developers->id }}">{{ $locations_fileter->location }}</option>
                        @endforeach
                    </select>
                    </div>
                  
                
                    <div class="dropdown grid_drop_down_item2">
                        <?php $bedroomsfilters = App\Models\Bedroom::where('status', '0')->get();   ?> 

                    <select onchange="filterfunction(this)" class="filter_dropdown" name="wgtmsr" id="bedroomfilter" >
                        <option  value="" >Bedroom</option>
                        @foreach($bedroomsfilters as $key => $bedroomsfilter)
                    
                      
                        <option value="{{ $bedroomsfilter->id }}/{{ $developers->id }}">{{ $bedroomsfilter->number_of_bed }}</option>
                        @endforeach
                        
                
                    </select>
                    </div>
            
                    <div class="dropdown grid_drop_down_item3" >
                <?php $typeofpropertys_filters = App\Models\TypeOfProperty::where('status','0')->get(); ?> 

                    <select onchange="filterfunction(this)" class="filter_dropdown" name="wgtmsr" id="propertyfilter" >
                        <option value="" >Select By Property Type</option>
                @foreach($typeofpropertys_filters as $key => $typeofpropertys_filter)

            
              
                <option value="{{ $typeofpropertys_filter->id }}/{{ $developers->id }}">{{ $typeofpropertys_filter->property_type }}</option>
                @endforeach
                     
                    </select>
                    </div>
            
                    <div class="dropdown grid_drop_down_item4"> 
                <?php $CompletionDate_filters = App\Models\CompletionDate::where('status','0')->get(); ?> 

                    <select onchange="filterfunction(this)" class="filter_dropdown" name="wgtmsr" id="completionfilter" >
                        <option value=""  >Completion Date</option>
                        @foreach($CompletionDate_filters as $key => $CompletionDate_filter)
                        <option value="{{ $CompletionDate_filter->id }}/{{ $developers->id }}">{{ $CompletionDate_filter->completions }}</option>
                        @endforeach
                     
                    </select>
                    </div>
            
                     <div class="dropdown grid_drop_down_item5" >
                      <?php $price_filters = App\Models\Price::selectRaw('DISTINCT price_listing')->orderBy('price_listing', 'ASC')->where('developers_id', $developers->id)->get(); ?>
                    <select onchange="filterfunction(this)"  class="filter_dropdown" name="wgtmsr" id="pricefilter" >
                        <option value="">Price/Budget</option>
                        @foreach($price_filters as $key => $price_filter)
                        <option value="{{ $price_filter->price_listing }}/{{ $developers->id }}">{{ $price_filter->price_listing }}</option>
                        @endforeach
                    </select>
                    </div> 
            
                    <div class="dropdown grid_drop_down_item6" >
                      <?php $sqfoot_filters = App\Models\Sqfoot::selectRaw('DISTINCT sqfoot_listing')->orderBy('sqfoot_listing', 'ASC')->where('developers_id', $developers->id)->get(); ?>
                    <select onchange="filterfunction(this)"  class="filter_dropdown" name="wgtmsr" id="sqfootfilter" >
                      <option value="">sqft</option>
                      @foreach($sqfoot_filters as $key => $sqfoot_filter)
                      <option value="{{ $sqfoot_filter->sqfoot_listing }}/{{ $developers->id }}">{{ $sqfoot_filter->sqfoot_listing }}</option>
                      @endforeach
                    </select>
                    </div>
            
                
                    <div class="Reset_pro_detals">
                        <a type="button" id="resetButton" class="achor_prop_tetails">
                            <i class="fa fa-refresh" aria-hidden="true"></i>Reset
                        </a>
                    </div>
                    <input type="hidden" id="reset_hidden_ids" name="reset_hidden_ids" value="{{ $developers->id }}" >
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
                <tbody id="addData">
              
                <?php # $developers = App\Models\ListingProperty::where('status', '0')->get(); ?> 
              
                @foreach ($listing_details as $listing_detail)
                <?php $listing_image11 = App\Models\ListingPropertyImage::where('list_property_id', $listing_detail->id)->first(); ?> 
                <?php $typeofpropertys11 = App\Models\TypeOfProperty::where('id', $listing_detail->type_of_property)->first(); ?> 
                <?php $bedrooms11 = App\Models\Bedroom::where('id', $listing_detail->number_of_bedrooms)->first(); ?> 
                <?php $developers11 = App\Models\Developer::where('id', $listing_detail->about_the_developer)->first(); ?> 
                <?php $locations11 = App\Models\Location::where('id', $listing_detail->location)->first(); ?> 
                <?php $completion = App\Models\CompletionDate::where('id', $listing_detail->handover)->first(); ?> 
               
                <tr >
                    <td><img src="{{ asset('/admin_images/Listing_property_images/'.$listing_image11->list_pro_image) }}" width="40px"></td>
                    <td>{{  $listing_detail->title_name }}</td>
                    <td>{{ $developers11->developer_name }}</td>
                    <td>{{ $locations11->location }}</td>
                    <td>{{ $bedrooms11->number_of_bed }}</td>
                    <td>{{ $typeofpropertys11->property_type }}</td>
                    <td>{{ $completion->completions }}</td>
                    <td>{{ $listing_detail->budgets }}</td>
                    <td>{{ $listing_detail->desired_size }}</td>
                </tr>

              
                @endforeach
            </tbody>
            </table>    
        </div>
    </div>
</div>


<div class="container" style="width: 95%!important;">
    <div class="row">
    <h3 style="font-weight: bold;font-size: 16px;"><i> List Of Developer Listing Properties</i></h3>
      

        @forelse ($listing_detai_paginate as $listingProperty)
        <div class="col-md-4 col-lg-4 mt-3">
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
                            <a class="hoverone" href="{{ url('/check_loaction').'/'.$locations->id  }}">{{ $locations->location }}</a></div>
                        <div class="col-6 p-0">
                          <i class="bi bi-building-down"></i>
                          <a  class="hovertwo" href="#">{{ $developers->developer_name }}</a></div>
                        </div>
                    </div>
                    <?php $typeofpropertys = App\Models\TypeOfProperty::where('id', $listingProperty->type_of_property)->first();?> 
                    <?php $bedrooms = App\Models\Bedroom::where('id', $listingProperty->number_of_bedrooms)->first();?> 
                <p class="card-text"> Types: <span>{{ $typeofpropertys->property_type }} |  Bed Room : {{ $bedrooms->number_of_bed }}</span></p>
                  <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-12 mt-2"  ><a href="{{ url('/propert_details'.'/'.$listingProperty->id) }}" class="btn btn-primary col-12 details_a1122">DETAILS</a>
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
              <div class="col-md-12 text-center text-danger mt-2">
                <h1 style="font-weight: bold;font-size: 23px;">No Listing Property Found </h1>
              </div>
            </div>
           
          </div>
        @endforelse
      
        <div class="container">
          <div class="row" >
           
            <div class="col-md-6 text-center text-danger mt-5" >
              {{-- {{  $listing_detai_paginate->links()  }} --}}
              {!! $listing_detai_paginate->withQueryString()->links('pagination::bootstrap-5'); !!}
            </div>
          </div>
         
        </div>




        
        
         
        
  
   
    </div>
  </div>


@endsection


@section('script')

<script>
    function filterfunction(element) {
    // alert('hello');
    var area = $('#areafilter').val();
    var bedroom = $('#bedroomfilter').val();
    var propertyType = $('#propertyfilter').val();
    var competion = $('#completionfilter').val();
    var price = $('#pricefilter').val();
    var sqfoot = $('#sqfootfilter').val();
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
      //  alert(area); 
 var dd = new FormData();
         dd.append("area",area);
         dd.append("bedroom",bedroom);
         dd.append("propertyType",propertyType);
         dd.append("competion",competion);
         dd.append("price",price);
         dd.append("sqfoot",sqfoot);
        //  dd.append("developer_id",{{ $developers->id }});

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
            async: true,
            type: 'post',
            url: "{{ url('/filter_list')}}",
            data: dd,
            cache: false,
            processData: false,
            contentType: false,
            success: function(response) {
            
                $('#addData').html("");


              var table = $('#addData');
              
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
  $('#resetButton').on('click', function() {
    // Set the selected value to an empty string
    $('#areafilter').val('');
    $('#bedroomfilter').val('');
    $('#propertyfilter').val('');
    $('#completionfilter').val('');
    $('#pricefilter').val('');
    $('#sqfootfilter').val('');
 var modelIdget =   $('#reset_hidden_ids').val();
    // location.reload();
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
          url: "{{ url('/model_filter_list_developer_details')}}/"+modelIdget,
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

@endsection

     