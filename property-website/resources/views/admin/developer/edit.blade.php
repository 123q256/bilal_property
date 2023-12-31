@extends('layouts.admin')
@section('title','Edit Developer')

@section('content')
<style>
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

<div class="container-fluid">
  <div class="page-title">
    <div class="row">
        <div class="col-6">
          <h3>
           Update Developer </h3>
        </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ ('admin/dashboard') }}"> <i data-feather="home"></i></a></li>
              <li class="breadcrumb-item">Apps</li>
              <li class="breadcrumb-item active">Update Developer  </li>
            </ol>
          </div>
    </div>
  </div>
</div>


 <!-- Container-fluid starts-->
 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">

          @if(session('message'))
          <div class="alert alert-success">{{session('message')}}</div>
         @endif 

          @if($errors->any())

          <div class="alert alert-success">
              @foreach($errors->all() as $error)
              <div>{{$error}}</div>
              @endforeach
          </div>
        @endif
          <div class="form theme-form">
            <form action="{{url('admin/developer/'.$developers->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label><strong>Developer Name</strong></label>
                  <input class="form-control" value="{{$developers->developer_name}}"  name="developer_name"type="text" placeholder="Developer Name *">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label><strong>Email</strong> </label>
                  <input class="form-control" value="{{$developers->email}}"  name="email" type="email" placeholder="Email *">
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label><strong>Password</strong></label>
                  <input class="form-control" value="{{$developers->password_show}}"  id="password-field" name="password" type="password" placeholder="Enter Password ">
                  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  <span class="icon is-small is-left">
                 
                  </span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label><strong>Logo/Image</strong></label>
                  <input class="form-control"  id="imageInput" name="developer_logo" type="file" >
                
                  @if(!empty($developers->developer_logo))
                  <div class="imgesize" id="imagePreview">
                  <img src="{{asset('admin_images/developer_logo/'.$developers->developer_logo)}}" width="100px" />
              </div>
                  @else
                  <div>No Image Found</div>
                  @endif
                </div>
               
              </div>
            </div>
        

            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label><strong>Description</strong></label>
                  <textarea class="form-control" name="description" id="exampleFormControlTextarea4"  placeholder="Description" rows="3">{{$developers->description}}</textarea>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <div class="field">
                    <label for="label"><strong>Status</strong></label>
                    Checked:Hidden ,Unchecked:Visible
                  </div>
              <!-- Default switch -->
                  <label class="switch">
                    <input type="checkbox"   class="check_get_id"  {{ $developers->status == '1' ? 'checked':'' }}    name="status">
                    <span class="slider round"></span>
                  </label>
                </div>
              
                </div>
              </div>
            </div>


            <div class="row">
              <?php $TypeOfPropertys = App\Models\TypeOfProperty::where('status', '0')->get();?>  
              <div class="col-sm-4">
                <div class="mb-3">
                  <label><strong>Types of property</strong></label>
                  <select class="form-select" name="type_property" style="max-width: 100%;">
                    <option disabled default>Select Types of property</option>
        
                    @forelse ($TypeOfPropertys as $TypeOfProperty)
                    <option  @if($TypeOfProperty->id == $developers->type_of_property ) selected  @endif value="{{ $TypeOfProperty->id }}" >{{ $TypeOfProperty->property_type }}</option>
                    @empty
                    <option value="option2">No Found Property</option>
                    @endforelse
                  </select>
                </div>
              </div>



              <?php $Locations = App\Models\Location::where('status', '0')->get();?>  
              <div class="col-sm-4">
                <div class="mb-3">
                  <label><strong>Location</strong></label>
                  <select name="location" class="form-select">
                    <option disabled default>Select location </option>
                    @forelse ($Locations as $Location)
                    <option @if($Location->id == $developers->location ) selected  @endif  value="{{ $Location->id }}">{{ $Location->location }}</option>
                    @empty
                    <option value="option2">No Found Payment</option>
                    @endforelse
                  </select>
                </div>
              </div>
            </div>
          
          
           
            <div class="row">
              <div class="col">
                <div class="text-end">
                  <button class="btn btn-success me-3"  type="submit">Update  Developer</button>
                
                  <a class="btn btn-danger" href="{{url('admin/developer')}}">Cancel</a></div>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Container-fluid Ends-->







@endsection


@section('custom_js')
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


{{-- admin profile single image upload then show on div start  --}}
<script>
  $(document).ready(function() {
  
    // Listen for the change event on the file input
    $('#imageInput').on('change', function() {
      // Get the selected file
      var file = $(this)[0].files[0];
  
      // Create a FileReader object
      var reader = new FileReader();
  
      // Set the onload event handler
      reader.onload = function(e) {
        // Create an image element
        var imagees = $('<img width="200px">').attr('src', e.target.result);
  
        // Clear the previous content of the imagePreview div
        $('#imagePreview').empty();
  
        // Append the image to the imagePreview div
        $('#imagePreview').append(imagees);
      };
  
      // Read the selected file as a data URL
      reader.readAsDataURL(file);
    });
  });
  </script>
  {{-- admin profile single image upload then show on div End  --}}
@endsection