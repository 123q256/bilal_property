
<div style="width: 100%;margin-left:auto;margin-right:auto;text-align:center;"><img src="https://img.freepik.com/free-vector/gradient-quill-pen-design-template_23-2149837194.jpg" width="100px" alt="Logo"></div>

<h2>Hey, My Name is  {{ $formdata['user_first_name'] }} {{ $formdata['user_last_name'] }}</h2> 


<strong>Form Information About Me: </strong><br>

<strong>First Name: </strong>{{ $formdata['user_first_name'] }} <br>
<strong>Last Name: </strong>{{ $formdata['user_last_name'] }} <br>
<strong>Email: </strong>{{ $formdata['email'] }} <br>
<strong>Date Of Birth </strong>{{ $formdata['user_dateofbirth'] }} <br>

<?php $typeOfPro = App\Models\TypeOfProperty::where('status', '0')->where('id', $formdata['user_property'])->first();?>  
<strong>Type of property: </strong>{{ $typeOfPro->property_type }} <br>


<?php $Bedrooms = App\Models\Bedroom::where('status', '0')->where('id', $formdata['user_bedroom'])->first(); ?> 
<strong>Number of Bedrooms: </strong>{{ $formdata['user_bedroom'] }} <br>


<?php $currencys = App\Models\Addcurrency::where('status', '0')->where('id',$formdata['user_currency'])->first();?> 
<strong> Currency: </strong>{{ $currencys->currency }} <br>
<strong>  Budget: </strong>{{ $formdata['user_budget'] }} <br>


<?php $PaymentPlans = App\Models\PaymentPlan::where('status', '0')->where('id', $formdata['user_payment_plan'])->first(); ?>  
<strong> Payment Plan: </strong>{{ $PaymentPlans->payment_plane_years }} <br>


<?php $Locations = App\Models\Location::where('status', '0')->where('id', $formdata['user_location'])->first();?>  
<strong> Location: </strong>{{ $Locations->location }} <br>

<strong> desired Size in Sq ft: </strong>{{ $formdata['user_desired_size'] }} <br>

Thank you