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
                                <input type="text" name="name" placeholder="Enter Your Name" class="form-control b_input_class" id="">
            
                                <label class="b_label_form">Contact Number<span  class="b_lave_span" > *</span></label>
                                <input type="text" name="contact_number" placeholder="Enter Phone Number" class="form-control b_input_class" id="">
            
                                <label class="b_label_form">E-mail Address <span class="b_lave_span"> *</span></label>
                                <input type="text" name="email" placeholder="Enter E-mail Address" class="form-control b_input_class" id="">
            
                                <label class="b_label_form">Nationality <span class="b_lave_span" > *</span></label>
                                <input  type="text" name="nationality" placeholder="Enter Nationality" class="form-control b_input_class" id="">
    
                                <label class="b_label_form">Massege <span class="b_lave_span" > *</span></label>
                             
                                <textarea name="messages" class="form-control b_input_class" placeholder="Enter Massege"  rows="4" cols="50"></textarea>

                            
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