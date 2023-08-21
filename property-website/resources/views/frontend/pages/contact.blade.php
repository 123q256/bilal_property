@section('title','Contact')
@extends('layouts.app')
@section('content')

<!-- Contact page Start -->
<div class="contact_main_one">
    <div class="container">
        @if(session('message'))
        <div id="message_bilal" class="alert alert-success">{{session('message')}}</div>
       @endif 
       @if(session('status'))
       <div class="alert alert-success">{{session('message')}}</div>
       
      @endif 
       
        @if($errors->any())

        <div  id="message_bilal_two" class="alert alert-success">
            @foreach($errors->all() as $error)
            <div >{{$error}}</div>
          
            @endforeach
        </div>
        @endif
        <div class="row">
    
            <div class="col-md-1 b_first_check"></div>
          
    
            
                <div class="col-md-5 set_bcimage">
                    <h2 class="bit_color">Tell Us a bit</br> about yourself</h2>
                </div>
                <div class="col-md-6 b_check_contact">
    
                    <div class="col-md-10 mx-auto mt-4 please_form">Please Fill in the Following Form</div>
                    <div class="col-md-11 mx-auto">
                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                                <label class="b_label_form">Name <span class="b_lave_span" > *</span></label>
                                <input type="text" name="name" placeholder="Enter Your Name"  value="{{ old('name') }}" class="form-control b_input_class @error('name') is-invalid @enderror" id="">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                                <label class="b_label_form">Contact Number<span  class="b_lave_span" > *</span></label>
                                <input type="text" name="contact_number" placeholder="Enter Phone Number"  value="{{ old('contact_number') }}" class="form-control b_input_class @error('contact_number') is-invalid @enderror" id="">
                                @error('contact_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                                <label class="b_label_form">E-mail Address <span class="b_lave_span"> *</span></label>
                                <input type="text" name="email" placeholder="Enter E-mail Address"  value="{{ old('email') }}" class="form-control b_input_class @error('email') is-invalid @enderror" id="">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                                <label class="b_label_form">Nationality <span class="b_lave_span" > *</span></label>
                                <input  type="text" name="nationality" placeholder="Enter Nationality"  value="{{ old('nationality') }}" class="form-control b_input_class @error('nationality') is-invalid @enderror" id="">
                                @error('nationality')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                                <label class="b_label_form">Massege <span class="b_lave_span" > *</span></label>
                             
                                <textarea name="messages" class="form-control b_input_class @error('messages') is-invalid @enderror" placeholder="Enter Massege"  rows="4" cols="50">{{ old('messages') }}</textarea>
                                @error('messages')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            
                               <div class="col-md-12 text-center mt-3">
                                <input class="btn btn-primary b_form_btn" type="submit" value="Submit">
                               </div>
                               
                            </form>
                    </div>
                </div>
    
        </div>
    </div>
    <br><br>

</div>
   


<!-- Contact page END -->

@endsection