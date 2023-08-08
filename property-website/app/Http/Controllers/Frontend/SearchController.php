<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\ListingProperty;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function searching_property(Request $request)
    {
     
        $ListingProperty = ListingProperty::select("listing_properties.*",
        DB::raw('(select list_pro_image from listing_property_images where list_property_id  =   listing_properties.id order by id asc limit 1) as photo')  )
        ->leftJoin("payment_plans","payment_plans.id","listing_properties.payment_plane")
        ->leftJoin("bedrooms","bedrooms.id","listing_properties.number_of_bedrooms")
        ->leftJoin("locations","locations.id","listing_properties.location")
        ->leftJoin("type_of_properties","type_of_properties.id","listing_properties.type_of_property")
        ->where('payment_plans.id', $request->paymentplan)
        ->where('bedrooms.id', $request->bedroom)
        ->where('locations.id', $request->location)
        ->where('type_of_properties.id', $request->typeofproperty)    
        // ->orderby('type_of_properties.id','ASC')    
        ->get();
        // dd($ListingProperty);

        return view('frontend.search.searchofproperty' , compact('ListingProperty'));
    }


    public function email_search($user_property ,$user_bedroom ,$user_currency, $user_payment_plan, $user_location, $user_desired_size, $user_budget)
    {
        // dd($user_property);

        $EmailListingProperty = ListingProperty::select("listing_properties.*", 
        DB::raw('(select list_pro_image from listing_property_images where list_property_id  =   listing_properties.id order by id asc limit 1) as photo')  )
        ->leftJoin("payment_plans","payment_plans.id","listing_properties.payment_plane")
        ->leftJoin("bedrooms","bedrooms.id","listing_properties.number_of_bedrooms")
        ->leftJoin("locations","locations.id","listing_properties.location")
        ->leftJoin("addcurrencies","addcurrencies.id","listing_properties.currencys")
        ->leftJoin("type_of_properties","type_of_properties.id","listing_properties.type_of_property")
        ->where('payment_plans.id', $user_payment_plan)
        ->where('bedrooms.id', $user_bedroom)
        ->where('locations.id', $user_location)
        ->where('type_of_properties.id', $user_property)    
        ->where('addcurrencies.id', $user_currency)    
        ->where('listing_properties.desired_size', $user_desired_size)    
        ->where('listing_properties.budgets', $user_budget)    
        // ->orderby('type_of_properties.id','ASC')    
        ->get();
        //  dd($EmailListingProperty);

        return view('frontend.search.emailsearchofproperty' , compact('EmailListingProperty'));

    }

    
}
