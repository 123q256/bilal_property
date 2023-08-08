
<div style="width: 100%;margin-left:auto;margin-right:auto;text-align:center;"><img src="https://img.freepik.com/free-vector/gradient-quill-pen-design-template_23-2149837194.jpg" width="100px" alt="Logo"></div>

<strong>Dear User: </strong>{{ $formdata['user_first_name'] }} {{ $formdata['user_last_name'] }}<br>
<strong>Form Related details: </strong><br>

<strong>Email: </strong>{{ $formdata['email'] }} <br>
<strong>Date Of Birth </strong>{{ $formdata['user_dateofbirth'] }} <br>


<?php $TypeOfPropertys = App\Models\TypeOfProperty::where('status', '0')->where('id', $formdata['user_property'])->first();?>  
<strong>Type of property: </strong>{{ $TypeOfPropertys->property_type }} <br>


<?php $Bedrooms = App\Models\Bedroom::where('status', '0')->where('id', $formdata['user_bedroom'])->first(); ?> 
<strong>Number of Bedrooms: </strong>{{ $Bedrooms->number_of_bed }} <br>


<?php $currencys = App\Models\Addcurrency::where('status', '0')->where('id',$formdata['user_currency'])->first();?> 
<strong> Currency: </strong>{{ $currencys->currency }} <br>

<strong>  Budget: </strong>{{ $formdata['user_budget'] }} <br>

<?php $PaymentPlans = App\Models\PaymentPlan::where('status', '0')->where('id', $formdata['user_payment_plan'])->first(); ?>  
<strong> Payment Plan: </strong>{{ $PaymentPlans->payment_plane_years }} <br>


<?php $Locations = App\Models\Location::where('status', '0')->where('id', $formdata['user_location'])->first();?>  
<strong> Location: </strong>{{ $Locations->location }} <br>


<strong> desired Size in Sq ft: </strong>{{ $formdata['user_desired_size'] }} <br>
<p>Thank you for submitting your property details and for signing up.</p>

<p>Please check your email in which we have sent you the login credentials to your account along with the best available listings on our platform matching your custom request.</p>
<strong> <h2>Click This Url</h1> </strong><a style="font-size: 18px;" href="{{ url('http://localhost:8000/email-search/'.$formdata['user_property'].'/'.$formdata['user_bedroom'].'/'.$formdata['user_currency'].'/'.$formdata['user_payment_plan'].'/'.$formdata['user_location'].'/'.$formdata['user_desired_size'].'/'.$formdata['user_budget']) }}">Click Here</a> <br>

    Thank you 
    Link of property comparison website