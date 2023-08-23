@section('title','Profile')
@extends('layouts.app')
@section('content')
<style>
    .set_position{
        position: absolute;
        top: 13px;
        left: 90px;
        z-index: 1;
    }
</style>
<div class="container emp-profile">
    <form action="{{url('/profile')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-5">
               

               
                <div class="profile-img">
                   
                    @if(isset(auth()->user()->avatar))

                    <div id="imagePreview" style="position: relative;">
                <a class="btn btn-danger mb-3 set_position" onclick="return confirm('Are You sure ,As you want to Delete the Image')" href="{{url('/image/delete/'.auth()->user()->id)}}"><i class="bi bi-trash3-fill"></i></a>
                          
                          <img src="{{asset('users-images/'.auth()->user()->avatar)}}" class="circle-image" style="position: relative;" id="image_hides" title="{{auth()->user()->first_name}}"  alt=""/>
                    </div><br>
                    
                    
                
                    @else
                    <div id="imagePreview">
                        <img src="{{ asset('/users-images/default-avatar.png')  }}" alt=""/>
                    </div><br>
                   
                    @endif
                   
                    <div  class="file btn btn-lg btn-primary">
                        Change Photo
                        <input style="cursor: pointer" id="imageInput"  type="file" name="avatar"/>
                    </div>
                   
                   
                </div>
                @if(isset(auth()->user()->avatar))
                <div class="col-md-12 d-flex justify-content-center ">
                {{-- <a class="btn btn-danger" onclick="return confirm('Are You sure ,As you want to Delete the Image')" href="{{url('admin/image/delete/'.auth()->user()->id)}}">delete Image</a> --}}

                </div>
                @endif
                {{-- <br><div  id="imagePreview"></div><br> --}}
                
             </div>
          
             <div class="col-md-7">
                @if (session('message'))
                <div id="message_bilal" class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
              @endif
                <div class="row">
                    <div class="col-md-8">
                <h3 style="font-weight:600">User Details</h3>
                    </div>
            </div>
           
            <div class="row">
                <div class="col-md-12">

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label><strong>First Name</strong></label>
                            <input type="text" name="first_name"  value="{{auth()->user()->first_name}}" class="form-control @error('first_name') is-invalid @enderror" >
                            @error('first_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label><strong>Last Name</strong></label>
                            <input type="text" name="last_name"  value="{{auth()->user()->last_name}}" class="form-control @error('last_name') is-invalid @enderror" >
                            @error('last_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </div>
                    {{-- <input type="tel" name="phone_number[main]" id="phone_number" class="form-control" /> --}}
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label><strong>Email Address</strong></label>
                            <input type="text" disabled  readonly value="{{auth()->user()->email}}" name="email"  class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </div>

                    <input type="hidden"  name="phoneuser_hide" id="phoneuser_hide" class="form-control">


                    @if(isset(auth()->user()->phone_no))
                    <div class="col-md-12" id="change_numbers" >
                        <div class="mb-3" style="position: relative;">
                            <label><strong>Phone No</strong></label><br>
                    <input type="text" name="phone_no"   value="{{auth()->user()->phone_no}}" class="form-control"><br>
                    <a style="position: absolute; right: 0; top: 23px;" class="btn btn-primary" onclick="changePhoneNumber()">Change Number</a>
                  
                </div>
            </div>


            <div class="col-md-12" id="backnumbers" style="position: relative;display:none;">
                <div class="mb-3" style="display: grid;position: relative;">
                    <label><strong>Phone No</strong></label><br>
                    <input type="text" name="phone_no" style="" id="phone_three" class="form-control add-ini">
                    <a style="position: absolute; right: 0; top: 23px;"  class="btn btn-primary" onclick="backPhoneNumber()">Back</a>

                    
                </div>

                @error('phone_no')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            </div>
            @enderror



            
                    @else
                    <div class="col-md-12" id="backnumbers" style="position: relative;">
                        <div class="mb-3" style="display: grid;position: relative;">
                            <label><strong>Phone No</strong></label><br>
                            <input type="text" name="phone_no" style="" id="phone_three" class="form-control add-ini">
                            {{-- <a style="position: absolute; right: 0; top: 0px;"  class="btn btn-primary" onclick="backPhoneNumber()">Back</a> --}}

                            
                        </div>

                        @error('phone_no')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    </div>
                    @enderror

                    @endif


               

                </div>
            </div>

            <div class="col-md-12">
                      
                <button type="submit" id="register_user" class="btn btn-primary">Save Profile</button>
             
          </div>

            </div>
           
        </div>
       
    </form>           
</div>
<br><br>

   


<!-- Contact page END -->

@endsection


@section('script')

<script>
  $(document).ready(function() {
    // alert('fsdfsd');
    // Listen for the change event on the file input
    $('#imageInput').on('change', function() {
      // Get the selected file
      var file = $(this)[0].files[0];
  
      // Create a FileReader object
      var reader = new FileReader();
  
      // Set the onload event handler
      reader.onload = function(e) {
        // Create an image element
        var imagees = $('<img>').attr('src', e.target.result);
  
        // Clear the previous content of the imagePreview div
        $('#imagePreview').empty();
  
        // Append the image to the imagePreview div
        $('#imagePreview').append(imagees);
      };
  
      // Read the selected file as a data URL
      reader.readAsDataURL(file);
    });

  });
  function changePhoneNumber() {
 
    $('#change_numbers').hide();
    $('#backnumbers').show();
}

function backPhoneNumber() {
 
 $('#change_numbers').show();
 $('#backnumbers').hide();
}


  </script>

@endsection