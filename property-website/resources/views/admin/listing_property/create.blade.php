@extends('layouts.admin')
@section('title','Add Listing Property ')

@section('content')


<style>
    .ck-file-dialog-button{
    display: none!important;
  }
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
                      Listing Property Create</h3>
                  </div>
                    <div class="col-6">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">  <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Apps</li>
                        <li class="breadcrumb-item active">Listing Property Create </li>
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

              <form action="{{url('admin/listing_property/create')}}" method="POST" enctype="multipart/form-data">
                @csrf

           
            
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <div class="form theme-form">
                      <div class="row">

                        <div class="row">
                          <div class="col">
                            <div class="mb-3">
                              <label><strong>Title/Name</strong></label>
                              <input class="form-control @error('title_name') is-invalid @enderror" name="title_name" value="{{ old('title_name') }}"  type="text" placeholder="Title/Name *">
                              @error('title_name')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
                            </div>
                          </div>
                        </div>


                      
                          <?php $TypeOfPropertys = App\Models\TypeOfProperty::where('status', '0')->get();?>  
                        <div class="col-sm-12">
                          <div class="mb-3">
                            <label><strong>Select Types of property</strong></label>
                            <select name="types_of_property" class="form-select @error('types_of_property') is-invalid @enderror">
                            <option value="">Select Types of property</option>
                            @forelse ($TypeOfPropertys as $TypeOfProperty)
                            <option value="{{ $TypeOfProperty->id }}" {{ old('types_of_property') == $TypeOfProperty->id ? 'selected' : '' }}>{{ $TypeOfProperty->property_type }}</option>
                            @empty
                            <option value="option2">No Found Property</option>
                            @endforelse
                            </select>
                            @error('types_of_property')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                          </div>
                        </div>

                        <?php 
                        $Bedrooms = App\Models\Bedroom::where('status', '0')->get();
                        ?> 

                        <div class="col-sm-12">
                          <div class="mb-3">
                            <label><strong>Bed Room Number</strong></label>
                            <select  name="bed_room_no"  class="form-select @error('bed_room_no') is-invalid @enderror">
                              <option value="">Select Bed Room Number</option>
                              @forelse ($Bedrooms as $Bedroom)
                              <option value="{{ $Bedroom->id }}" {{ old('bed_room_no') == $Bedroom->id ? 'selected' : '' }}>{{ $Bedroom->number_of_bed }}</option>
                              @empty
                              <option value="option2">No Found Bed Room</option>
                              @endforelse
                            </select>
                            @error('bed_room_no')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                          </div>
                        </div>
                      </div>

                      {{-- <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label>Handover</label>
                            <input class="form-control" name="handover"  type="text" placeholder="handover *">
                          </div>
                        </div>
                      </div> --}}


                      
                      <?php $CompletionDates = App\Models\CompletionDate::where('status', '0')->get();?>  
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="mb-3">
                            <label><strong>Add Completion Date/Handover</strong></label>
                            <select name="handover"  class="form-select @error('handover') is-invalid @enderror">
                              <option value="" >Select Completion Date</option>
                              @forelse ($CompletionDates as $CompletionDate)
                              <option value="{{ $CompletionDate->id }}" {{ old('handover') == $CompletionDate->id ? 'selected' : '' }}>{{ $CompletionDate->completions }}</option>
                              @empty
                              <option value="option2">No Found Completion Date</option>
                              @endforelse
                            </select>
                            @error('handover')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                          </div>
                        </div>
                      </div>




                      <div class="container mb-3" >
                        <div class="columns">
                          <div class="column is-half">
                            <label class="pb-2"><strong>Upload Images</strong></label>
                            <div class="file">
                              <label class="file-label">
                                <input id="choose-files"  class="select" type="file" name="gallery[]"  style="max-width: 100%;" multiple>
                                
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                  
                      <div class="container mb-3">
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
                                <input  id="videoFiles" class="" name="videos[]"  type="file" style="max-width: 100%;" multiple>
                            
                              </label>
                            </div>
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
                            <label><strong>Payment Plans Heading</strong></label>
                            <select  name="payment_plan" class="form-select @error('payment_plan') is-invalid @enderror">
                              <option value="" >Select Payment Plans</option>
                              @forelse ($PaymentPlans as $PaymentPlan)
                              <option value="{{ $PaymentPlan->id }}" {{ old('payment_plan') == $PaymentPlan->id ? 'selected' : '' }}>{{ $PaymentPlan->payment_plane_years }}</option>
                              @empty
                              <option value="option2">No Found Payment</option>
                              @endforelse
                            </select>
                            @error('payment_plan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label><strong>First payment Plans</strong></label>
                            <input class="form-control @error('first_payment') is-invalid @enderror" name="first_payment" value="{{ old('first_payment') }}" type="text" placeholder="First payment Plans">
                            @error('first_payment')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label><strong>Second payment Plans</strong></label>
                            <input class="form-control @error('second_payment') is-invalid @enderror" name="second_payment"  value="{{ old('second_payment') }}" type="text" placeholder="Second payment Plans">
                            @error('second_payment')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
                          </div>
                        </div>
                      </div>


                      <?php $currencys = App\Models\Addcurrency::where('status', '0')->get();?>  
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="mb-3">
                            <label><strong>Add Currency</strong></label>
                            <select name="change_currency"  class="form-select @error('change_currency') is-invalid @enderror">
                              <option value="" >Select Currency</option>
                              @forelse ($currencys as $currency)
                              <option value="{{ $currency->id }}" {{ old('change_currency') == $currency->id ? 'selected' : '' }}>{{ $currency->currency }}</option>
                              @empty
                              <option value="option2">No Found Currency</option>
                              @endforelse
                            </select>
                            @error('change_currency')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                          </div>
                        </div>
                      </div>



                    
                      {{-- <div class="row">
                        <div class="col-sm-12">
                          <div class="mb-3">
                            <label>Add Budget</label>
                            <select name="budget_select" id="budget_select" class="form-select">
                              <option selected disabled default>First selcet the Currency</option>
                            
                            </select>
                          </div>
                        </div>
                      </div> --}}

                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label><strong>Add Budget</strong></label>
                            <input class="form-control @error('budget_select') is-invalid @enderror" name="budget_select" value="{{ old('budget_select') }}" type="text" placeholder="Add Budget">
                            @error('budget_select')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label><strong>Enter a desired Size in the format of "integer * integer":</strong></label>
                    
                            <input  placeholder="Enter value in format:eg275*456" value="{{ old('desired_size') }}" id="add_desired" type="text" name="desired_size" class="form-control @error('desired_size') is-invalid @enderror">
                            @error('desired_size')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
                            <select name="location" class="form-select @error('location') is-invalid @enderror">
                              <option value=""  >Select Location</option>
                              @forelse ($Locations as $Location)
                              <option value="{{ $Location->id }}" {{ old('location') == $Location->id ? 'selected' : '' }}>{{ $Location->location }}</option>
                              @empty
                              <option value="option2">No Found Location</option>
                              @endforelse
                            </select>
                            @error('location')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label><strong>Highlights</strong></label>
                          
                            <textarea class="form-control @error('highlights') is-invalid @enderror" placeholder="Highlights" name="highlights" id="editor_one"  rows="3">{{ old('highlights') }}</textarea>
                            @error('highlights')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                          </div>
                        </div>
                      </div>


                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label><strong>Project Details</strong> </label>
                              <textarea class="form-control @error('Project_details') is-invalid @enderror" placeholder="Project Details" name="Project_details" id="editor_two" rows="3">{{ old('Project_details') }}</textarea>
                              @error('Project_details')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                          @enderror
                            </div>
                        </div>
                      </div>

                      
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label><strong>Amenities</strong> </label>
                
                  <textarea class="form-control @error('amenities_details') is-invalid @enderror" placeholder="Amenities" name="amenities_details" id="editor_three" rows="3">{{ old('amenities_details') }}</textarea>
                  @error('amenities_details')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label><strong>Location </strong></label>
                
                  <textarea class="form-control @error('location_details') is-invalid @enderror" placeholder="Location" name="location_details" id="editor_four" rows="3">{{ old('location_details') }}</textarea>
                  @error('location_details')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label><strong>Interiors and Units</strong> </label>
               
                  <textarea class="form-control @error('Interiors_and_Units') is-invalid @enderror" placeholder="Interiors and Units" name="Interiors_and_Units" id="editor_five" rows="3">{{ old('Interiors_and_Units') }}</textarea>
                  @error('Interiors_and_Units')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror
                </div>
              </div>
            </div>

                  

                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label><strong>Incentives</strong></label>
                         
                            <textarea class="form-control @error('incentives') is-invalid @enderror" placeholder="Incentives" name="incentives" id="editor_six" rows="3">{{ old('incentives') }}</textarea>
                            @error('incentives')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                          </div>
                        </div>
                      </div>
                      <?php $Developers = App\Models\Developer::where('status', '0')->get();?>  
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="mb-3">
                            <label><strong>Developers</strong></label>
                            <select name="developer_information" class="form-select @error('developer_information') is-invalid @enderror">
                              <option value="" >Select Developer </option>
                          
                 
                             @forelse ($Developers as $Developer)
                             <option value="{{ $Developer->id }}" {{ old('developer_information') == $Developer->id ? 'selected' : '' }}>{{ $Developer->developer_name }}</option>
                             @empty
                             <option value="option2">No Found Developer</option>
                             @endforelse
                            </select>
                            @error('developer_information')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
                              <input type="checkbox"   class="check_get_id"  {{ old('status') ? 'checked' : '' }}   name="status">
                              <span class="slider round"></span>
                          </label>
                          </div>
                        </div>
              

                      <div class="row">
                        <div class="col">
                          <div class="text-end">
                            <button class="btn btn-success me-3" type="submit">Add Listing Property</button>
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