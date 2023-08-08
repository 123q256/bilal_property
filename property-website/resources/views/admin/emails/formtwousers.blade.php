
<div style="width: 100%;margin-left:auto;margin-right:auto;text-align:center;"><img src="https://img.freepik.com/free-vector/gradient-quill-pen-design-template_23-2149837194.jpg" width="100px" alt="Logo"></div>
<p>Thank you for signing up at our platform and for submitting your details. We are glad that you joined us.</p>

<strong>Attached are your login details</strong><br>

<strong>Email: </strong>{{ Auth::user()->email }} <br>
<strong>Password </strong>{{ Auth::user()->show_password }} <br>

<p>Here are your custom details regarding listings</p>

<?php $TypeOfPropertys = App\Models\TypeOfProperty::where('status', '0')->where('id', $formdatasingle['user_property'])->first();?>  
<strong>Type of property: </strong>{{ $TypeOfPropertys->property_type }} <br>


<?php $Bedrooms = App\Models\Bedroom::where('status', '0')->where('id', $formdatasingle['user_bedroom'])->first(); ?> 
<strong>Number of Bedrooms: </strong>{{ $Bedrooms->number_of_bed }} <br>


<?php $currencys = App\Models\Addcurrency::where('status', '0')->where('id',$formdatasingle['user_currency'])->first();?> 
<strong> Currency: </strong>{{ $currencys->currency }} <br>

<strong>  Budget: </strong>{{ $formdatasingle['user_budget'] }} <br>

<?php $PaymentPlans = App\Models\PaymentPlan::where('status', '0')->where('id', $formdatasingle['user_payment_plan'])->first(); ?>  
<strong> Payment Plan: </strong>{{ $PaymentPlans->payment_plane_years }} <br>


<?php $Locations = App\Models\Location::where('status', '0')->where('id', $formdatasingle['user_location'])->first();?>  
<strong> Location: </strong>{{ $Locations->location }} <br>


<strong> desired Size in Sq ft: </strong>{{ $formdatasingle['user_desired_size'] }} <br>
<p>Please visit from the link below. We have sent you best listings which match your submission and register to their details today. </p>

<strong> <h2>Click This Url</h1> </strong><a style="font-size: 18px;" href="{{ url('http://localhost:8000/email-search/'.$formdatasingle['user_property'].'/'.$formdatasingle['user_bedroom'].'/'.$formdatasingle['user_currency'].'/'.$formdatasingle['user_payment_plan'].'/'.$formdatasingle['user_location'].'/'.$formdatasingle['user_desired_size'].'/'.$formdatasingle['user_budget']) }}">Click Here</a> <br>

    Have a nice day,
    Link of property comparison website