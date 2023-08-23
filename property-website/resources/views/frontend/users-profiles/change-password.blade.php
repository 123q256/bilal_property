@section('title','Change Password')
@extends('layouts.app')
@section('content')

<!-- Contact page Start -->
<div class="container" style="width: 90%;">
  
    <div class="row">
        <div class="col-md-4">
         
               
                <img src="{{asset('/password-image/change-password.jpg')}}" width="100%" style="padding-top: 56px;" alt=""/>
           
        </div>
        <div class="col-md-8">
            @if (session('message'))
            <h5 class="alert alert-success mb-2">{{ session('message') }}</h5>
        @endif

        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
        </ul>
        @endif

            <div class="row">
                <div class="col-md-8">
            <h3 style="font-weight:600">Change Password</h3>
                </div>
                {{-- <div class="col-md-4">   <a href="{{url('/profile')}}" class="btn btn-warning float-end">Back</a></div> --}}
        </div>
       
        <div class="row">
            <div class="col-md-12">

             
                <form action="{{ url('change-password') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label><strong> Password</strong></label>
                        <input type="password" name="current_password" required class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label><strong>New Password</strong></label>
                        <input type="password" name="password" required class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label><strong>Confirm Password</strong></label>
                        <input type="password" name="password_confirmation" required class="form-control" />
                    </div>
                    <div class="mb-3 text-end">
                        
                        <button type="submit" class="btn btn-primary">Update Password</button>
                    </div>
                </form>
              



            </div>
        </div>

  

        </div>
       
    </div>
   
      
</div>


   


<!-- Contact page END -->

@endsection