
<div style="width: 100%;margin-left:auto;margin-right:auto;text-align:center;"><img src="https://img.freepik.com/free-vector/gradient-quill-pen-design-template_23-2149837194.jpg" width="100px" alt="Logo"></div>


<strong>Form Information About Me: </strong><br>

<strong> User Name : </strong>{{ Auth::user()->name }} <br>

<strong>Email: </strong>{{  Auth::user()->email }} <br>

<?php $typeOfPro = App\Models\TypeOfProperty::where('status', '0')->where('id', $formdatasingle['user_property'])->first();?>  
<strong>Type of property: </strong>{{ $typeOfPro->property_type }} <br>


<?php $Bedrooms = App\Models\Bedroom::where('status', '0')->where('id', $formdatasingle['user_bedroom'])->first(); ?> 
<strong>Number of Bedrooms: </strong>{{ $formdatasingle['user_bedroom'] }} <br>


<?php $currencys = App\Models\Addcurrency::where('status', '0')->where('id',$formdatasingle['user_currency'])->first();?> 
<strong> Currency: </strong>{{ $currencys->currency }} <br>
<strong>  Budget: </strong>{{ $formdatasingle['user_budget'] }} <br>


<?php $PaymentPlans = App\Models\PaymentPlan::where('status', '0')->where('id', $formdatasingle['user_payment_plan'])->first(); ?>  
<strong> Payment Plan: </strong>{{ $PaymentPlans->payment_plane_years }} <br>


<?php $Locations = App\Models\Location::where('status', '0')->where('id', $formdatasingle['user_location'])->first();?>  
<strong> Location: </strong>{{ $Locations->location }} <br>

<strong> desired Size in Sq ft: </strong>{{ $formdatasingle['user_desired_size'] }} <br>

Thank you