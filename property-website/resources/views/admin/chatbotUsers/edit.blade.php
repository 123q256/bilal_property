@extends('layouts.admin')
@section('title','Edit Chat Bot Users')

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

<div class="container-fluid">
  <div class="page-title">
    <div class="row">
        <div class="col-6">
          <h3>
           Update Chat Bot User </h3>
        </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">  <i data-feather="home"></i></a></li>
              <li class="breadcrumb-item">Apps</li>
              <li class="breadcrumb-item active">Update Chat Bot Users </li>
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
    <form action="{{url('admin/chatusers/'.$chatbotuserse->id)}}" method="POST" enctype="multipart/form-data">
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
                    <label><strong>Categoty</strong></label>
                    <input class="form-control" name="chatbox_category" value="{{ $chatbotuserse->chatbox_category }}"  type="text" placeholder="Category*">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label><strong>Name</strong></label>
                    <input class="form-control" name="chatbox_your_name" value="{{ $chatbotuserse->chatbox_your_name }}"  type="text" placeholder="Name *">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label><strong>Company Name</strong></label>
                    <input class="form-control" name="chatbox_company_name" value="{{ $chatbotuserse->chatbox_company_name }}"  type="text" placeholder="ompany Name *">
                  </div>
                </div>
              </div> 

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label><strong>Email</strong> </label>
                    <input class="form-control" name="chatbox_email" value="{{ $chatbotuserse->chatbox_email }}"  type="text" placeholder="Email *">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label><strong>Phone No</strong></label>
                    <input class="form-control" name="chatbox_phone_no" value="{{ $chatbotuserse->chatbox_phone_no }}"  type="text" placeholder="phone No *">
                  </div>
                </div>
              </div>


            
           
                <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label><strong>Select What is your preferred currency</strong></label>
                  <select name="chatbox_budget" class="form-select">
                  <option selected disabled default>Select What is your preferred currency</option>
                  <option  @if($chatbotuserse->chatbox_budget === 'AED' ) selected  @endif value="AED">AED</option>
                    <option  @if($chatbotuserse->chatbox_budget === 'USD' ) selected  @endif value="USD">USD</option>
                    <option  @if($chatbotuserse->chatbox_budget === 'EUR' ) selected  @endif value="EUR">EUR</option>
                    <option   @if($chatbotuserse->chatbox_budget === 'GBP' ) selected @endif value="GBP">GBP</option>
                  </select>
                </div>
              </div>
            </div>
        

            <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label><strong>Select Let us know your suitable investment range</strong></label>
                    <select name="chatbox_investment" class="form-select">
                    <option selected disabled default>Select suitable investment range</option>
                 

                      <option @if($chatbotuserse->chatbox_investment === 'AED' ) selected  @endif value="AED">'<'AED </option>
                      <option @if($chatbotuserse->chatbox_investment === 'AED 500K -1 Million' ) selected  @endif value="AED 500K -1 Million">AED 500K -1 Million</option>
                      <option @if($chatbotuserse->chatbox_investment === 'AED 1-2 Million' ) selected  @endif value="AED 1-2 Million">AED 1-2 Million</option>
                      <option @if($chatbotuserse->chatbox_investment === 'AED 1-3.5 Million' ) selected  @endif value="AED 1-3.5 Million">AED 1-3.5 Million</option>
                      <option @if($chatbotuserse->chatbox_investment === 'AED 3.5-5 Million' ) selected  @endif value="AED 3.5-5 Million">AED 3.5-5 Million</option>
                      <option @if($chatbotuserse->chatbox_investment === 'AED 5 Million +' ) selected  @endif value="AED 5 Million +">AED 5 Million +</option>
                    </select>
                  </div>
                </div>
              </div> 


              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label><strong>Select What property type are you looking for</strong></label>
                    <select name="chatbox_aed" class="form-select">
                    <option selected disabled default>Select What property type are you looking for</option>
                      <option  @if($chatbotuserse->chatbox_aed === 'Apartments' ) selected @endif   value="Apartments">Apartments</option>
                      <option  @if($chatbotuserse->chatbox_aed === 'Villas' ) selected @endif   value="Villas">Villas</option>
                      <option  @if($chatbotuserse->chatbox_aed === 'Townhouses' ) selected @endif   value="Townhouses">Townhouses</option>
                      <option  @if($chatbotuserse->chatbox_aed === 'Aplots' ) selected  @endif  value="Aplots">Aplots</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label><strong>Select the number of bedrooms</strong></label>
                    <select name="chatbox_apartment" class="form-select">
                    <option selected disabled default>Select the number of bedrooms</option>


                      <option @if($chatbotuserse->chatbox_apartment === 'Studio' ) selected @endif  value="Studio">Studio</option>
                      <option @if($chatbotuserse->chatbox_apartment === '1 Bedroom' ) selected @endif  value="1 Bedroom">1 Bedroom</option>
                      <option @if($chatbotuserse->chatbox_apartment === '2 Bedroom' ) selected @endif  value="2 Bedroom">2 Bedroom</option>
                      <option @if($chatbotuserse->chatbox_apartment === '3 Bedroom' ) selected @endif  value="3 Bedroom">3 Bedroom</option>
                      <option @if($chatbotuserse->chatbox_apartment === '4 Bedroom' ) selected @endif  value="4 Bedroom">4 Bedroom</option>
                      <option @if($chatbotuserse->chatbox_apartment === '5 Bedroom +' ) selected @endif  value="5 Bedroom +">5 Bedroom +</option>
                    </select>
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label><strong>Select How soon are you looking to buy a property</strong></label>
                    <select name="chatbox_studio" class="form-select">
                    <option selected disabled default>Select How soon are you looking to buy a property</option>
                      <option  @if($chatbotuserse->chatbox_studio === 'Immediately' ) selected @endif value="Immediately">Immediately</option>
                      <option  @if($chatbotuserse->chatbox_studio === '1-2 mouths' ) selected @endif value="1-2 mouths">1-2 mouths</option>
                      <option  @if($chatbotuserse->chatbox_studio === '3-6 mouths' ) selected @endif value="3-6 mouths">3-6 mouths</option>
                      <option  @if($chatbotuserse->chatbox_studio === 'I am just exploring options at this stage' ) selected @endif value="I am just exploring options at this stage">I am just exploring options at this stage</option>
                    
                    </select>
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label><strong>Select Are you currently in Dubai?</strong></label>
                    <select name="chatbox_immediately" class="form-select">
                    <option selected disabled default>Select Are you currently in Dubai?</option>
                      <option @if($chatbotuserse->chatbox_immediately === 'Yes I am currently in Dubai' ) selected  @endif  value="Yes I am currently in Dubai">Yes, I am currently in Dubai?</option>
                      <option @if($chatbotuserse->chatbox_immediately === 'No, but I am planing to visit soon' ) selected  @endif  value="No, but I am planing to visit soon">No, but i am planing to visit soon</option>
                      <option @if($chatbotuserse->chatbox_immediately === 'No plans to visit Dubai at this stage' ) selected  @endif  value="No plans to visit Dubai at this stage">No plans to visit Dubai at this stage</option>
                    </select>
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label><strong>Select Do you have any specific requirements?</strong></label>
                    <select name="chatbox_specific_requirement" class="form-select">
                    <option selected disabled default>Select Do you have any specific requirements?</option>
                      <option @if($chatbotuserse->chatbox_specific_requirement === 'Yes' ) selected @endif value="Yes">Yes</option>
                      <option @if($chatbotuserse->chatbox_specific_requirement === 'No' ) selected @endif value="No">No</option>
                    </select>
                  </div>
                </div>
              </div>

         
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label><strong>Details</strong></label>
                  <textarea class="form-control" placeholder="Chatbox Details" name="chatbox_details" id="exampleFormControlTextarea4" rows="3">@if(!empty($chatbotuserse->chatbox_details)) {{ $chatbotuserse->chatbox_details }}  @else No Details Found  @endif</textarea>
                </div>
              </div>
            </div>
           
           
            <div class="row">
              <div class="col">
                <div class="text-end">
                  <button class="btn btn-success me-3" type="submit">Update Listing Property</button>
                  <a class="btn btn-danger" href=" {{url('admin/chatusers')}}">Cancel</a>
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
@endsection