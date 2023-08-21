@extends('layouts.app')

@section('content')
<style>
  #bilal_filter_completion{
    width: 160px;
  }
</style>

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
                  <a href="{{ url('/propert_types/propert_details'.'/'.$listingProperty->id) }}"><img src="{{ asset('/admin_images/Listing_property_images/'.$listing_image->list_pro_image) }}" width="100%" alt="Palm Springs Road"/></a>
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
                              <div class="col-xl-6 col-lg-12 mt-2"  ><a href="{{ url('/propert_types/propert_details'.'/'.$listingProperty->id) }}" style="line-height: 1.8" class="btn btn-primary col-12 details_a1">DETAILS</a>
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
      
                <?php $typeofpropertys_filters = App\Models\TypeOfProperty::where('status','0')->get(); ?> 
            <div class="dropdown grid_drop_down_item1" >
              <select onchange="bilalfilterfunction(this)" class="filter_dropdown"  id="bilal_filter_property" >
                <option  value="" >Property type</option>
                @foreach($typeofpropertys_filters as $key => $typeofpropertys_filter)
                <option value="{{ $typeofpropertys_filter->id }}">{{ $typeofpropertys_filter->property_type }}</option>
                @endforeach
              </select>
            </div>
           
           
            <?php $bedroomsfilters = App\Models\Bedroom::where('status', '0')->get();   ?> 
            <div class="dropdown grid_drop_down_item2" >
              <select onchange="bilalfilterfunction(this)" class="filter_dropdown"  id="bilal_filter_bedroom" >
                <option  value="" >Bedroom</option>
                @foreach($bedroomsfilters as $key => $bedroomsfilter)
                <option value="{{ $bedroomsfilter->id }}">{{ $bedroomsfilter->number_of_bed }}</option>
                @endforeach
              </select>
            </div>
            <?php $Developer_filters = App\Models\Developer::where('status','0')->get(); ?> 
      
            <div class="dropdown grid_drop_down_item3" >
              <select  onchange="bilalfilterfunction(this)" class="filter_dropdown"  id="bilal_filter_developer" >
                <option value="" >Developer</option>
                @foreach($Developer_filters as $key => $Developer_filter)
                <option value="{{ $Developer_filter->id }}">{{ $Developer_filter->developer_name }}</option>
                @endforeach
              </select>
            </div>
            <?php $Location_filters = App\Models\Location::where('status','0')->get(); ?> 
            <div class="dropdown grid_drop_down_item4" >
              <select  onchange="bilalfilterfunction(this)" class="filter_dropdown" n id="bilal_filter_location" >
                <option value="" >Location</option>
                @foreach($Location_filters as $key => $Location_filter)
                <option value="{{ $Location_filter->id }}">{{ $Location_filter->location }}</option>
                @endforeach
              </select>
            </div>
            <?php $PaymentPlan_filters = App\Models\PaymentPlan::where('status','0')->get(); ?> 
            <div class="dropdown grid_drop_down_item5" >
              <select  onchange="bilalfilterfunction(this)" class="filter_dropdown"  id="bilal_filter_paymentplan" >
                <option value="" >Payment Plan</option>
                @foreach($PaymentPlan_filters as $key => $PaymentPlan_filter)
                <option value="{{ $PaymentPlan_filter->id }}">{{ $PaymentPlan_filter->payment_plane_years }}</option>
                @endforeach
              </select>
            </div>
     
            <?php $CompletionDate_filters = App\Models\CompletionDate::where('status','0')->get(); ?> 
            <div class="dropdown grid_drop_down_item6" >
              <select  onchange="bilalfilterfunction(this)" class="filter_dropdown"  id="bilal_filter_completion" >
                <option value="">Completion Date</option>
                  @foreach($CompletionDate_filters as $key => $CompletionDate_filter)
                  <option value="{{ $CompletionDate_filter->id }}">{{ $CompletionDate_filter->completions }}</option>
                  @endforeach
              </select>
            </div>
     
            {{-- <div class="dropdown grid_drop_down_item6" >
              <h6 class="allpr_heading">Show  </h6>
              <select  name="wgtmsr" id="wgtmsr" style="width: 96px;background-color: #F7F7F7;color: #5C5C5C;padding-top:9px;padding-bottom: 9px;padding-left:10px;border: none;">
                <option  >all </option>
                <option value="gm">Gm</option>
                <option value="pound">Pound</option>
                <option value="MetricTon">Metric ton</option>
                <option value="litre">Litre</option>
                <option value="ounce">Ounce</option>
              </select>
            </div> --}}
     
       
      
      

            <div class="Reset_pro_detals">
                <a type="button" id="resetButtonbilal" class="achor_prop_tetails">
                    <i class="fa fa-refresh" aria-hidden="true"></i>   Reset
                 </a>
            </div>
            {{-- <div class="Search_pro_detals">
                <button class="btn Search_pro_detals_btn" >Search</button>
            </div>  --}}
    </div>
    </div> 
    
</div>
</div>
<?php 
// dd(asset('/'));
    ?>

<div class="container" style="width: 95%!important;">
  <div class="row row-cols-1 products_flex" style="display: none; overflow-x: auto;">
 <table class="table" id="myTable" width="100%" >
            <thead>
            <tr >
                <th>property image</th>
                <th>Title</th>
                <th>Developer</th>
                <th>Property Area</th>
                <th>Beds</th>
                <th>Property Types</th>
                <th>Completion</th>
            </tr>
          </thead>

            <tbody id="bilal_addData">



            <?php $listingPropertys11 = App\Models\ListingProperty::where('status', '0')->get();?>  
            @foreach($listingPropertys11 as $listingProperty11)
            <?php $listing_image11 = App\Models\ListingPropertyImage::where('list_property_id', $listingProperty11->id)->first();?>  
          <tr>
            <td><img src="{{ asset('/admin_images/Listing_property_images/'.$listing_image11->list_pro_image) }}" width="40px"></td>

            <?php $typeofpropertys11 = App\Models\TypeOfProperty::where('id', $listingProperty11->type_of_property)->first();?> 
            <?php $bedrooms11 = App\Models\Bedroom::where('id', $listingProperty11->number_of_bedrooms)->first();?> 
            <?php $developers11 = App\Models\Developer::where('id', $listingProperty11->about_the_developer)->first();?> 
            <?php $locations11 = App\Models\Location::where('id', $listingProperty11->location)->first();?> 
            <?php $lcompletion11 = App\Models\CompletionDate::where('id', $listingProperty11->handover)->first();?> 

            <td>{{  $listingProperty11->title_name }}</td>
            <td> {{ $developers11->developer_name }}</td>
            <td>{{ $locations11->location }}</td>
            <td>{{ $bedrooms11->number_of_bed }}</td>
            <td>{{ $typeofpropertys11->property_type }}</td>
            <td>{{ $lcompletion11->completions }}</td>
         
        </tr>

            
            @endforeach
    
            </tbody>
        
 </table>    
  </div>
</div>
</div>
<!-- Property Type end -->
@endsection

@section('script')
<script>



  function bilalfilterfunction(element) {
     //alert('hello');
    var property = $('#bilal_filter_property').val();
    var bedroomone = $('#bilal_filter_bedroom').val();
    var developer = $('#bilal_filter_developer').val();
    var location = $('#bilal_filter_location').val();
    var payments = $('#bilal_filter_paymentplan').val();
    var sqfoocompletion = $('#bilal_filter_completion').val();

       // alert(element.value); 
 var dd = new FormData();
         dd.append("property",property);
         dd.append("bedroomone",bedroomone);
         dd.append("developer",developer);
         dd.append("location",location);
         dd.append("payments",payments);
         dd.append("sqfoocompletion",sqfoocompletion);
     

         $('#bilal_addData').html(`
    <tr>
      <th colspan="7">
       
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
            url: "{{ url('/bilal_filter_list')}}",
            data: dd,
            cache: false,
            processData: false,
            contentType: false,
            success: function(response) {

                $('#bilal_addData').html("");


              var table = $('#bilal_addData');
              
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
        '</tr>';

    // Append the new row to the table
   
    table.append(newRow);

});       
                }else{
                $('#bilal_addData').html("");
                $('#bilal_addData').append(' <tr><td colspan="7">Not Found Results</td></tr>');
              
            }
         
                }




            }
        });
    }








    </script>
 <script>
  $(document).ready(function() {
// When the button is clicked, reset the select value
$('#resetButtonbilal').on('click', function() {
// Set the selected value to an empty string
$('#bilal_filter_property').val('');
$('#bilal_filter_bedroom').val('');
$('#bilal_filter_developer').val('');
$('#bilal_filter_location').val('');
$('#bilal_filter_paymentplan').val('');
$('#bilal_filter_completion').val('');

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
      url: "{{ url('/filter_resetbtn_bilal')}}",
      cache: false,
      processData: false,
      contentType: false,
      success: function(response) {
          $('#bilal_addData').html("");


              var table = $('#bilal_addData');
              
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
        '</tr>';

    // Append the new row to the table
   
    table.append(newRow);

});       
                }else{
                $('#bilal_addData').html("");
                $('#bilal_addData').append(' <tr><td colspan="7">Not Found Results</td></tr>');
              
            }
         
                }


      }
  });


});
});
</script>


@endsection