<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\ListingProperty;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DeveloperFilterController extends Controller
{
    public function filter_list(Request $request ){
    //  dd($request->all());
        // $ararayset =  array();

      
    
        if(empty($request->area) && empty($request->bedroom) && empty($request->propertyType) && empty($request->competion) && empty($request->price) && empty($request->sqfoot) ){

            $items = ListingProperty::where('id','-90');
        }else{
            $items = ListingProperty::
            leftJoin("completion_dates","completion_dates.id","listing_properties.handover")
            ->leftJoin("type_of_properties","type_of_properties.id","listing_properties.type_of_property")
            ->leftJoin("bedrooms","bedrooms.id","listing_properties.number_of_bedrooms")
            ->leftJoin("payment_plans","payment_plans.id","listing_properties.payment_plane")
            ->leftJoin("locations","locations.id","listing_properties.location")
            ->leftJoin("developers","developers.id","listing_properties.about_the_developer")
            ->select('listing_properties.*', 'type_of_properties.property_type', 'bedrooms.number_of_bed', 'payment_plans.payment_plane_years', 'locations.location', 'developers.developer_name', 'completion_dates.completions',
            DB::raw('(select list_pro_image from listing_property_images where list_property_id  =   listing_properties.id order by id asc limit 1) as photo')  
            );
        }
        
        // dd($items);
        if (!empty($request->area)) {
            $value_one = $request->area;
            $part = explode("/", $value_one);
            $one_area = $part[0];
            $one_developer_id = $part[1];
            $items->where('locations.id', $one_area)->where('about_the_developer', $one_developer_id);
        }
        
        if (!empty($request->bedroom)) {
            $value_two = $request->bedroom;
            $part_two = explode("/", $value_two);

            $two_area = $part_two[0];
            $two_developer_id = $part_two[1];

            $items->where('bedrooms.id', $two_area)->where('about_the_developer', $two_developer_id);
        }
        if (!empty($request->propertyType)) {
            $value_three = $request->propertyType;
            $part_three = explode("/", $value_three);

            $three_area = $part_three[0];
            $three_developer_id = $part_three[1];

            $items->Where('type_of_properties.id', $three_area)->where('about_the_developer', $three_developer_id);
        }
        if (!empty($request->competion)) {
            $value_four = $request->competion;
            $part_four = explode("/", $value_four);

            $four_area = $part_four[0];
            $four_developer_id = $part_four[1];

            $items->where('completion_dates.id', $four_area)->where('about_the_developer', $four_developer_id);
        }

        if (!empty($request->price)) {
            $value_five = $request->price;
            $part_five = explode("/", $value_five);

            $five_area = $part_five[0];
            $five_developer_id = $part_five[1];

            $items->where('budgets', $five_area)->where('about_the_developer', $five_developer_id);
        }

        if (!empty($request->sqfoot)) {
            $value_six = $request->sqfoot;
            $part_six = explode("/", $value_six);

            $six_area = $part_six[0];
            $six_developer_id = $part_six[1];

            $items->where('desired_size', $six_area)->where('about_the_developer', $six_developer_id);
        }

       
        $item= $items->get();
         
        // dd($item);
    

        return response()->json([
            'status' => 200,
            'record' => $item
        ]);
    }





    public function filter_list_two(Request $request ){
        // dd($request->all());
        // $ararayset =  array();

        if(empty($request->area) && empty($request->bedroom) && empty($request->propertyType) && empty($request->competion) && empty($request->price) && empty($request->sqfoot) ){

            $itemstwo = ListingProperty::where('id','-90');
        }else{
    

        $itemstwo = ListingProperty::
        leftJoin("completion_dates","completion_dates.id","listing_properties.handover")
        ->leftJoin("type_of_properties","type_of_properties.id","listing_properties.type_of_property")
        ->leftJoin("bedrooms","bedrooms.id","listing_properties.number_of_bedrooms")
        ->leftJoin("payment_plans","payment_plans.id","listing_properties.payment_plane")
        ->leftJoin("locations","locations.id","listing_properties.location")
        ->leftJoin("developers","developers.id","listing_properties.about_the_developer")
        ->select('listing_properties.*', 'type_of_properties.property_type', 'bedrooms.number_of_bed', 'payment_plans.payment_plane_years', 'locations.location', 'developers.developer_name', 'completion_dates.completions',
        DB::raw('(select list_pro_image from listing_property_images where list_property_id  =   listing_properties.id order by id asc limit 1) as photo')  
        );
    }
        // dd($items);
        if (!empty($request->area)) {

            $itemstwo->where('locations.id', $request->area)->where('about_the_developer', $request->hidden1); 
        }
       
        if (!empty($request->bedroom)) {
          

            $itemstwo->where('bedrooms.id', $request->bedroom)->where('about_the_developer', $request->hidden1);
        }
        if (!empty($request->propertyType)) {
           

            $itemstwo->Where('type_of_properties.id', $request->propertyType)->where('about_the_developer', $request->hidden1);
        }
        if (!empty($request->competion)) {
          

            $itemstwo->where('completion_dates.id', $request->competion)->where('about_the_developer', $request->hidden1);
        }

        if (!empty($request->price)) {
          

            $itemstwo->where('budgets', $request->price)->where('about_the_developer', $request->hidden1);
        }

        if (!empty($request->sqfoot)) {
          

            $itemstwo->where('desired_size', $request->sqfoot)->where('about_the_developer', $request->hidden1);
        }

       
        $itemdone= $itemstwo->get();
         
        // dd($item);
    

        return response()->json([
            'status' => 200,
            'record' => $itemdone
        ]);
    }


    public function check_loaction($id){

       // dd($id);

        $ListingProperty = ListingProperty::where('location',$id)->get();
       //  dd($ListingProperty);

     $locatisearch = Location::where('id',$id)->first();

        return view('frontend.search.searchloactions' , compact('ListingProperty','locatisearch'));
    }

}
