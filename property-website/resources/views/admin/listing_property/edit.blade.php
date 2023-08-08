@extends('layouts.admin')
@section('title','Edit Listing Property')

@section('content')
<style>

  .ck-file-dialog-button{
    display: none!important;
  }
  .ck-reset_all-excluded{
    /* display: none!important; */
  }
    .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -31px;
  position: relative;
  z-index: 2;
  font-size: 21px;
  margin-right: 8px;
}





    .customizer-links{
        display: none;
    }


</style>

<style>
 
    .divider{
        color:#ccc;
        width:70%;
        margin:20px auto;
        overflow:hidden;
        text-align:center;   
        line-height:1.2em;
    }
    
    .divider:before, .divider:after{
        content:"";
        vertical-align:middle;
        display:inline-block;
        width:50%;
        border-bottom:2px dotted #ccc;
        margin:0 2% 0 -55%;
    }
    .divider:after{
        margin:0 -55% 0 2%;
    }
    h1:nth-child(2){
        font-size:3em;
    }
    span{
      display:inline-block;
      vertical-align:middle;
      }
        </style>

   
<style>
  .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
  }

  .switch input {
      opacity: 0;
      width: 0;
      height: 0;
  }

  .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
  }

  .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
  }

  input:checked+.slider {
      background-color: #2196F3;
  }

  input:focus+.slider {
      box-shadow: 0 0 1px #2196F3;
  }

  input:checked+.slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
      border-radius: 34px;
  }

  .slider.round:before {
      border-radius: 50%;
  }


  .customizer-links{
      display: none;
  }







</style>

<style>
  .img{
  width: 110px;
  margin-left: 6px;
  height: 80px;
  cursor: pointer;
  }
  
  video{
  width: 184px;
  margin-left: 6px;
  }
  </style>

       {{-- Bulma  css --}}
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

   {{-- Bulma  css --}}

<div class="container-fluid">
  <div class="page-title">
    <div class="row">
        <div class="col-6">
          <h3>
           Update Listing Property </h3>
        </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">  <i data-feather="home"></i></a></li>
              <li class="breadcrumb-item">Apps</li>
              <li class="breadcrumb-item active">Update Listing Property  </li>
            </ol>
          </div>
    </div>
  </div>
</div>

<!-- Container-fluid starts-->
<div class="container-fluid">
  <div class="row">

    @if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
   @endif

    @if($errors->any())

    <div class="alert alert-success">
        @foreach($errors->all() as $error)
        <div>{{$error}}</div>
        @endforeach
    </div>
    @endif
    <form action="{{url('admin/listing_property/'.$ListingPropertys->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="form theme-form">
            <div class="row">


              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label><strong>Title/Name</strong></label>
                    <input class="form-control" name="title_name" value="{{ $ListingPropertys->title_name }}"  type="text" placeholder="Title/Name *">
                  </div>
                </div>
              </div>


            
                <?php $TypeOfPropertys = App\Models\TypeOfProperty::where('status', '0')->get();?>  
              <div class="col-sm-12">
                <div class="mb-3">
                  <label><strong>Select Types of property</strong></label>
                  <select name="types_of_property" class="form-select">
                  <option value="">Select Types of property</option>
                  @forelse ($TypeOfPropertys as $TypeOfProperty)
                  <option @if($TypeOfProperty->id == $ListingPropertys->type_of_property ) selected  @endif   value="{{ $TypeOfProperty->id }}" >{{ $TypeOfProperty->property_type }}</option>
                  @empty
                  <option value="option2">No Found Property</option>
                  @endforelse
                  </select>
                </div>
              </div>

              <?php 
              $Bedrooms = App\Models\Bedroom::where('status', '0')->get();
              ?> 
              <div class="col-sm-12">
                <div class="mb-3">
                  <label><strong>Bed Room Number</strong></label>
                  <select  name="bed_room_no"  class="form-select">
                    <option value="">Select Bed Room Number</option>
                    @forelse ($Bedrooms as $Bedroom)
                    <option @if($Bedroom->id == $ListingPropertys->number_of_bedrooms ) selected  @endif  value="{{ $Bedroom->id }}">{{ $Bedroom->number_of_bed }}</option>
                    @empty
                    <option value="option2">No Found Bed Room</option>
                    @endforelse
                  </select>
                </div>
              </div>
            </div>



            <?php 
            $CompletionDates = App\Models\CompletionDate::where('status', '0')->get();
            ?> 
            <div class="col-sm-12">
              <div class="mb-3">
                <label><strong>Completion Date/Handover</strong></label>
                <select  name="handover"  class="form-select">
                  <option value="">Select Completion Date</option>
                  @forelse ($CompletionDates as $CompletionDate)
                  <option @if($CompletionDate->id == $ListingPropertys->handover ) selected  @endif  value="{{ $CompletionDate->id }}">{{ $CompletionDate->completions }}</option>
                  @empty
                  <option value="option2">No Found Completion Date</option>
                  @endforelse
                </select>
              </div>
            </div>
          </div>



            {{-- <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label>Handover</label>
                  <input class="form-control" name="handover" value="{{ $ListingPropertys->handover }}"   type="text" placeholder="handover *">
                </div>
              </div>
            </div> --}}
            <div class="container " >
              <div class="columns">
                <div class="column is-half">
                  <label class="pb-2"><strong>Upload Images</strong></label>
                  <div class="file">
                    <label class="file-label">
                      <input id="choose-files"  class="file-input select" type="file" name="gallery[]"  style="max-width: 100%;" multiple>
                      <span class="file-cta">
                        <span class="file-icon">
                          <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                          Choose a file…
                        </span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="container">
              <div class="row ">
                <div class="col-md-12">
          
                  <?php $ListingPropertyImages = App\Models\ListingPropertyImage::where('list_property_id',$ListingPropertys->id)->get();
                  ?>  
                
                @forelse ($ListingPropertyImages as $ListingPropertyImage)
                <div class="select_{{ $ListingPropertyImage->id }}"  style="float:left;padding-left:10px;padding-top:10px;padding-bottom:20px">
                
                <span onclick="one_image_delete('{{ $ListingPropertyImage->id}}')" style="position: absolute; margin-left: 79px;font-size: 24px; color: red;cursor: pointer; margin-top: -10px;" id="image_delete"  data-id="">&times</span>
                <img src="{{ asset('admin_images/Listing_property_images/'.$ListingPropertyImage->list_pro_image)}}"  width="100"  />
              </div>
                @empty
                  <span>No Avalaibles Images</span>
                @endforelse
                
                </div>
              </div>
            </div>
            <div class="container ">
              <div class="row ">
                <div class="col-md-12">
                  <div id="preview-wrapper" ></div>
                </div>
              </div>
            </div>
            <div class="container mb-3" >
              <div class="columns">
                
                <div class="column is-half">
                  <label class="pb-2"><strong>Upload Video</strong></label>
                  <div class="file">
                  
                    <label class="file-label">
                      <input  id="videoFiles" class="file-input" name="videos[]"  type="file" style="max-width: 100%;" multiple>
                      <span class="file-cta">
                        <span class="file-icon">
                          <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                          Choose a file…
                        </span>
                      </span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="container">
              <div class="row ">
                <div class="col-md-12">
          
                  <?php $ListingPropertyVideos = App\Models\ListingPropertyVideo::where('list_property_id',$ListingPropertys->id)->get();
                  ?>  
                
                @forelse ($ListingPropertyVideos as $ListingPropertyVideo)
                <div class="select_vido_{{ $ListingPropertyVideo->id }}"  style="float:left;padding-left:10px;padding-top:10px;padding-bottom:20px">
                
                <span onclick="one_video_delete('{{ $ListingPropertyVideo->id}}')" style="position: absolute; margin-left: 157px;font-size: 33px; color: red;cursor: pointer; margin-top: -10px;" id="image_delete"  data-id="">&times</span>
          
          
                <video width="100" controls>
                  <source src="{{ asset('admin_images/Listing_property_video/'.$ListingPropertyVideo->list_pro_video)}}" type="video/mp4">
                  <source src="{{ asset('admin_images/Listing_property_video/'.$ListingPropertyVideo->list_pro_video)}}" type="video/ogg">
                  Your browser does not support HTML video.
                </video>
              </div>
                @empty
                  <span>No Avalaibles Video</span>
                @endforelse
                </div>
              </div>
            </div>
            <div class="container mb-3">
              <div class="row ">
                <div class="col-md-12">
                  <div id="videoContainer"></div>
          
                </div>
              </div>
            </div>
            <?php $PaymentPlans = App\Models\PaymentPlan::where('status', '0')->get();?>  

            <div class="row">
              <div class="col-sm-12">
                <div class="mb-3">
                  <label><strong>Payment Plans</strong></label>
                  <select  name="payment_plan" class="form-select">
                    <option value="">Select Payment Plans</option>
                    @forelse ($PaymentPlans as $PaymentPlan)
                    <option @if($PaymentPlan->id == $ListingPropertys->payment_plane ) selected  @endif  value="{{ $PaymentPlan->id }}">{{ $PaymentPlan->payment_plane_years }}</option>
                    @empty
                    <option value="option2">No Found Payment</option>
                    @endforelse
                  </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label><strong>First payment Plans</strong></label>
                  <input class="form-control" name="first_payment" value="{{ $ListingPropertys->first_payment }}"  type="text" placeholder="First payment Plans">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label><strong>Second payment Plans</strong></label>
                  <input class="form-control" name="second_payment" value="{{ $ListingPropertys->second_payment }}"  type="text" placeholder="Second payment Plans">
                </div>
              </div>
            </div>



            <?php $currencys = App\Models\Addcurrency::where('status', '0')->get();?>  
            <div class="row">
              <div class="col-sm-12">
                <div class="mb-3">
                  <label><strong>Add Currency</strong></label>
                  <select name="change_currency" id="change_currency_edit" class="form-select">
                    <option selected disabled default >Select Currency</option>
                    @forelse ($currencys as $currency)
                    <option @if($currency->id == $ListingPropertys->currencys ) selected  @endif  value="{{ $currency->id }}">{{ $currency->currency }}</option>
                    @empty
                    <option value="option2">No Found Currency</option>
                    @endforelse
                  </select>
                </div>
              </div>
            </div>



          
            {{-- <div class="row">
              <div class="col-sm-12">
                <div class="mb-3">
                  <label>Add Budget</label>
                  <select  name="budget_select" id="budget_select_edit" class="form-select">
                    <option value="{{ $Addbudget->id }}">{{ $Addbudget->budget }}</option>
                   
                  </select>
                </div>
              </div>
            </div> --}}

            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label><strong>Add Budget</strong></label>
                  <input class="form-control" name="budget_select" value="{{ $ListingPropertys->budgets }}"  type="text" placeholder="Add Budget">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label><strong>Enter a desired Size in the format of "integer * integer":</strong></label>
          
                  <input  placeholder="Enter value in format:eg275*456" value="{{ $ListingPropertys->show_desired_size }}" id="add_desired" type="text" name="desired_size" class="form-control">
                  <span id="show_seven" style="color: red;display:none;">Required Field </span>
                  <span id="errorText" style="color: red;"></span><br>
                </div>
              </div>
            </div>




            <?php $Locations = App\Models\Location::where('status', '0')->get();?>  
            <div class="row">
              <div class="col-sm-12">
                <div class="mb-3">
                  <label><strong>Locations</strong></label>
                  <select name="location" class="form-select">
                    <option value="">Select Location</option>
                    @forelse ($Locations as $Location)
                    <option @if($Location->id == $ListingPropertys->location ) selected  @endif value="{{ $Location->id }}">{{ $Location->location }}</option>
                    @empty
                    <option value="option2">No Found Location</option>
                    @endforelse
                  </select>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label><strong>Highlights</strong></label>
                  <textarea class="form-control" placeholder="Highlights" name="highlights" id="editor_one" rows="3">{!! $ListingPropertys->highlights !!}</textarea>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label><strong>Project Details</strong> </label>
                  <textarea class="form-control" placeholder="Project Details " name="Project_details" id="editor_two" rows="3">{!! $ListingPropertys->Project_details !!}</textarea>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label><strong>Amenities</strong> </label>
                  <textarea class="form-control" placeholder="Amenities" name="amenities_details" id="editor_three" rows="3">{!! $ListingPropertys->amenities_details !!}</textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label><strong>Location </strong> </label>
                  <textarea class="form-control" placeholder="Location" name="location_details" id="editor_four" rows="3">{!! $ListingPropertys->location_details !!}</textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label><strong>Interiors and Units</strong> </label>
                  <textarea class="form-control" placeholder="Interiors and Units" name="Interiors_and_Units" id="editor_five" rows="3">{!! $ListingPropertys->Interiors_and_Units !!}</textarea>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label><strong>Incentives</strong></label>
                  <textarea class="form-control" placeholder="Incentives" name="incentives" id="editor_six" rows="3">{!! $ListingPropertys->other_incentives !!}</textarea>
                </div>
              </div>
            </div>
            <?php $Developers = App\Models\Developer::where('status', '0')->get();?>  
            <div class="row">
              <div class="col-sm-12">
                <div class="mb-3">
                  <label><strong>Developers</strong></label>
                  <select name="developer_information" class="form-select">
                    <option value="salman">Select Developer </option>
                   @forelse ($Developers as $Developer)
                   <option  @if($Developer->id == $ListingPropertys->about_the_developer ) selected  @endif  value="{{ $Developer->id }}">{{ $Developer->developer_name }}</option>
                   @empty
                   <option value="option2">No Found Developer</option>
                   @endforelse
                  </select>
                </div> 
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 ">
                <div class="field">
                  <label for="label"><strong>Status</strong></label>
                  Checked:Hidden ,Unchecked:Visible
              </div>
              <!-- Default switch -->
              <label class="switch">
                <input type="checkbox"   class="check_get_id" {{ $ListingPropertys->status == '1' ? 'checked':'' }}    name="status">
                <span class="slider round"></span>
            </label>
                </div>
              </div>
            <div class="row">
              <div class="col">
                <div class="text-end">
                  <button class="btn btn-success me-3" type="submit">Update Listing Property</button>
                  <a class="btn btn-danger" href=" {{url('admin/listing_property')}}">Cancel</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</form>
  </div>
</div>
<!-- Container-fluid Ends-->
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@section('custom_js')
<script>
function one_video_delete(item_video_id)
{

  var v_token = "{{csrf_token()}}";
        var property = {item_video_id:item_video_id, _token: v_token};
 
    $.ajax({
                type: 'delete',
                data: property,
                url: "{{ route('one_video_delete') }}",
                success: function(data) {

            
                  if(data.status == 200){
                 

                      const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                      })

                      Toast.fire({
                        icon: 'success',
                        title: 'Your file has been deleted successfully'
                      })

                    
                $('.select_vido_'+data.video_item_delete).hide('slow');
             
                    }else{
                        Swal.fire(
                        'Something Error!',
                        'Your file has Not been deleted.',
                        'danger'
                    )
                    }
                },
                // error: function(data) {
                //     alert(data.responseText);
                // }
            });


}

  </script>


<script>

function one_image_delete(item_img_id)
{

  var v_token = "{{csrf_token()}}";
        var property = {item_img_id:item_img_id, _token: v_token};
 
    $.ajax({
                type: 'delete',
                data: property,
                url: "{{ route('one_image_delete') }}",
                success: function(data) {

            
                  if(data.status == 200){
                 

                      const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                      })

                      Toast.fire({
                        icon: 'success',
                        title: 'Your file has been deleted successfully'
                      })

                    
                $('.select_'+data.img_item_delete).hide('slow');
             
                    }else{
                        Swal.fire(
                        'Something Error!',
                        'Your file has Not been deleted.',
                        'danger'
                    )
                    }
                },
                // error: function(data) {
                //     alert(data.responseText);
                // }
            });


}

  </script>




















<script>
  $(document).ready(function() {
    $('#videoFiles').on('change', function() {
      var files = $(this).prop('files');
      var videoContainer = $('#videoContainer');

      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var reader = new FileReader();

        reader.onload = function(e) {
          var video = $('<video>', {
            controls: true,
            src: e.target.result
          });

          // Attach click event to delete the video

          video.on('click', function() {
            $(this).remove();
          });

          videoContainer.append(video);
        };

        reader.readAsDataURL(file);
      }
    });
  });
</script>

{{-- 

<script>
$(document).ready(function() {
  $('#videoFiles').on('change', function() {
    var files = $(this).prop('files');
    var videoContainer = $('#videoContainer');

    for (var i = 0; i < files.length; i++) {
      var file = files[i];
      var reader = new FileReader();

      reader.onload = function(e) {
        var video = $('<video>', {
          controls: true,
          src: e.target.result
        });

        videoContainer.append(video);
      };

      reader.readAsDataURL(file);
    }
  });
});
</script> --}}

<script>
let chooseFiles = document.getElementById("choose-files");
let previewWrapper = document.getElementById("preview-wrapper");
let form = document.getElementById('form');
chooseFiles.addEventListener("change", (e) => {
  [...e.target.files].forEach(showFiles);

});
function showFiles(file) {
  let previewImage = new Image();

  previewImage.dataset.name = file.name;
  previewImage.classList.add("img");
  previewImage.src = URL.createObjectURL(file);
  previewWrapper.append(previewImage); // append preview image
  // var stringToHTML = function (str) {
  //       var parser = new DOMParser();
  //       var doc = parser.parseFromString(str, 'text/html');
  //       return doc.body;
  //   }; 
  // previewWrapper.append(stringToHTML("<span class=\"remove\">Remove image</span>"));
  // -- remove the image preview visually
  document.querySelectorAll(".img").forEach((i) => {
    i.addEventListener("click", (e) => {
      const transfer = new DataTransfer();
      const name = e.target.dataset.name;
 
      for (const file of chooseFiles.files) {
        if (file.name !== name) {
          transfer.items.add(file);
        }
      }

      chooseFiles.files = transfer.files;
      e.target.remove();
    });
  });
}

</script>


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

        
{{-- category and sub-category doctor related Start  --}}
<script>
  $(document).ready(function() {
    
  $('#change_currency_edit').change(function() {
    // alert('hello');
      var categoryId = $(this).val(); // Get the selected category ID
    //alert(categoryId);
      $('#budget_select_edit').empty(); // Clear the sub-category options
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

      if (categoryId !== '') {
          // Send an AJAX request to fetch the sub-categories
          $.ajax({
           
              url: "{{ url('/admin/append_budget_edit') }}", // Replace with your server-side route
              type: 'POST',
              dataType: 'json',
              data: { category_id: categoryId },
              success: function(response) {
                
                
                     // console.log(response);
                  if (response.length > 0) {
                    $('#budget_select_edit').append(' <option selected disabled default>Select Budget</option>');
                      // Populate the sub-category options based on the response
                      $.each(response, function(index, subCategory) {
                          $('#budget_select_edit').append('<option value="' + subCategory.id + '">' + subCategory.budget + '</option>');
                      });
                  } else {
                      $('#budget_select_edit').append('<option value="">No Budget found</option>');
                  }
              
              },
              error: function(xhr, status, error) {
                  console.error(error); // Handle the error appropriately
              }
          });
      }
  });
});

</script>
{{-- category and sub-category doctor related END  --}}

<script>
  ClassicEditor
      .create( document.querySelector( '#editor_one' ) )
      .catch( error => {
          console.error( error );
      } );
</script>  <script>
ClassicEditor
    .create( document.querySelector( '#editor_two' ) )
    .catch( error => {
        console.error( error );
    } );
</script>
<script>
ClassicEditor
    .create( document.querySelector( '#editor_three' ) )
    .catch( error => {
        console.error( error );
    } );
</script>
<script>
  ClassicEditor
      .create( document.querySelector( '#editor_four' ) )
      .catch( error => {
          console.error( error );
      } );
  </script>

<script>
  ClassicEditor
      .create( document.querySelector( '#editor_five' ) )
      .catch( error => {
          console.error( error );
      } );
  </script>

<script>
  ClassicEditor
      .create( document.querySelector( '#editor_six' ) )
      .catch( error => {
          console.error( error );
      } );
  </script>
<script>

  </script>




<script>
  $('#add_desired').keyup(function() {
  // Get the value of the input field
  var inputTexts = $(this).val();

  // Check if the input field is empty
  if (inputTexts.trim() === '') {
      // $("#add_desired").addClass("country_error");
      $('#errorText').text('');
  $('#show_seven').show();

  } else {
      $('#show_seven').hide();

var value = $('#add_desired').val().trim();
      var regex = /^\d+\s*\*\s*\d+$/; // Regular expression to match "integer * integer" format

      if (regex.test(value)) {
       
          $('#errorText').text('');
      
      } else {
        
          $('#errorText').text('Please enter a valid format: integer * integer');
          return false; // Prevent form submission
      }


$("#add_desired").removeClass("country_error");
   
  }
});

</script>



@endsection