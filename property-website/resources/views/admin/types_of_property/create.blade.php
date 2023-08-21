@extends('layouts.admin')
@section('title','Add Types of Property')

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

  
  .customizer-links{
        display: none;
    }

    </style>



<div class="container-fluid">
  <div class="page-title">
    <div class="row">
        <div class="col-6">
          <h3>
            Add Type of Property</h3>
        </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i data-feather="home"></i></a></li>
              <li class="breadcrumb-item">Apps</li>
              <li class="breadcrumb-item active">Add Type of Property </li>
            </ol>
          </div>
    </div>
  </div>
</div>
 <!-- Container-fluid starts-->
 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">

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
      <div class="card">
        <div class="card-body">

          <form action="{{url('admin/type_property/create')}}"  method="POST" enctype="multipart/form-data">
            @csrf
         
          <div class="form theme-form">
            <div class="row">

              <div class="col">
                <div class="mb-3">
                  <label><strong> Type of Property</strong></label>
                  <input class="form-control @error('type_of_property') is-invalid @enderror"  name="type_of_property" type="text" placeholder="Add Property of Type*">
                  @error('type_of_property')
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
                  <div class="col-md-12 mt-2">
                    <div class="field">
                  <label><strong> Status</strong></label>
                      Checked:Hidden ,Unchecked:Visible
                  </div>
                  <!-- Default switch -->
                        <label class="switch">
                          <input type="checkbox"   class="check_get_id"   {{ old('status') ? 'checked' : '' }}     name="status">
                          <span class="slider round"></span>
                      </label>
                    </div>
                  
                </div>
              </div>
            </div>
            <div class="row"> 
              <div class="col">
                <div class="text-end">
                  <button type="submit" class="btn btn-success me-3">Add Type of Property</button>
                
                  <a class="btn btn-danger" href="{{url('admin/type_property')}}">Cancel</a>
                </div>
              </div>
            </div>
          </div>
          </form>
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
@endsection