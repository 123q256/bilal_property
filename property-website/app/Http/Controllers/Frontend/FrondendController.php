<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Price;
use App\Models\Sqfoot;
use App\Models\Bedroom;
use App\Models\Location;
use App\Models\Developer;
use Illuminate\Http\Request;
use App\Models\CompletionDate;
use App\Models\TypeOfProperty;
use App\Models\ListingProperty;
use App\Http\Controllers\Controller;
use App\Models\ListingPropertyImage;

class FrondendController extends Controller
{
    public function form(){
        return view('frontend.pages.forms');
    }
    public function formtwo(){
        return view('frontend.pages.formtwo');
    }
    
    public function contact(){
        return view('frontend.pages.contact');
    }
      public function propert_type(){
        return view('frontend.pages.property');
    }
    public function propert_detail($id){
        $listing_details = ListingProperty::where('id',$id)->first();
        return view('frontend.pages.property_details',compact('listing_details'));
    }

    public function developers(){
        return view('frontend.pages.developers');
    }
    public function developer_detail($id){
        $developers = Developer::where('status', '0')->where('id', $id)->first();
        $listing_details = ListingProperty::where('about_the_developer',$id)->get();
        $listing_detai_paginate = ListingProperty::where('about_the_developer',$id)->paginate(6);

        // dd($developers);

        return view('frontend.pages.developer_detail',compact('listing_details','developers','listing_detai_paginate'));
    }
    
    public function model_filter_lists($id)
    {
        $listing_details = ListingProperty::where('about_the_developer', $id)->get();
    
        $tableRow = '';
        foreach($listing_details as $listing_detail){
            $listing_image11 = ListingPropertyImage::where('list_property_id', $listing_detail->id)->first();
            $typeofpropertys11 = TypeOfProperty::where('id', $listing_detail->type_of_property)->first();
            $bedrooms11 = Bedroom::where('id', $listing_detail->number_of_bedrooms)->first();
            $developers11 = Developer::where('id', $listing_detail->about_the_developer)->first();
            $locations11 = Location::where('id', $listing_detail->location)->first();
            $completion = CompletionDate::where('id', $listing_detail->handover)->first();
        
            // Generate the HTML table row with the data

            $tableRow .= '<tr>' .
                        '<td><img src="/admin_images/Listing_property_images/' . $listing_image11->list_pro_image . '" width="40px"></td>' .
                        '<td>' . $listing_detail->title_name . '</td>' .
                        '<td>' . $developers11->developer_name . '</td>' .
                        '<td>' . $locations11->location . '</td>' .
                        '<td>' . $bedrooms11->number_of_bed . '</td>' .
                        '<td>' . $typeofpropertys11->property_type . '</td>' .
                        '<td>' . $completion->completions . '</td>' .
                        '<td>' . $listing_detail->budgets . '</td>' .
                        '<td>' . $listing_detail->desired_size . '</td>' .
                        '</tr>';
         }

                    echo $tableRow;
   
    }

    public function model_filter_list_developer_details($id)
    {
        // die();

        $listing_details = ListingProperty::where('about_the_developer', $id)->get();
    
        $tableRow = '';
        foreach($listing_details as $listing_detail){
            $listing_image11 = ListingPropertyImage::where('list_property_id', $listing_detail->id)->first();
            $typeofpropertys11 = TypeOfProperty::where('id', $listing_detail->type_of_property)->first();
            $bedrooms11 = Bedroom::where('id', $listing_detail->number_of_bedrooms)->first();
            $developers11 = Developer::where('id', $listing_detail->about_the_developer)->first();
            $locations11 = Location::where('id', $listing_detail->location)->first();
            $completion = CompletionDate::where('id', $listing_detail->handover)->first();
        
            // Generate the HTML table row with the data

            $tableRow .= '<tr>' .
                        '<td><img src="/admin_images/Listing_property_images/' . $listing_image11->list_pro_image . '" width="40px"></td>' .
                        '<td>' . $listing_detail->title_name . '</td>' .
                        '<td>' . $developers11->developer_name . '</td>' .
                        '<td>' . $locations11->location . '</td>' .
                        '<td>' . $bedrooms11->number_of_bed . '</td>' .
                        '<td>' . $typeofpropertys11->property_type . '</td>' .
                        '<td>' . $completion->completions . '</td>' .
                        '<td>' . $listing_detail->budgets . '</td>' .
                        '<td>' . $listing_detail->desired_size . '</td>' .
                        '</tr>';
         }

                    echo $tableRow;


    }

    public function model_filter_optionOne($id){

$price_filters = Price::selectRaw('DISTINCT price_listing')->orderBy('price_listing', 'ASC')->where('developers_id', $id)->get();
// dd($price_filters);
    $options = '';



    foreach ($price_filters as $option) {
        // Append each option to the $options variable
        $options .= '<option value="'. $option->price_listing . '">' . $option->price_listing . '</option>';
    }
    echo $options;

    }


    public function model_filter_optiontwo($id){

         $sqfoot_filters = Sqfoot::selectRaw('DISTINCT sqfoot_listing')->orderBy('sqfoot_listing', 'ASC')->where('developers_id', $id)->get(); 
        
            $optionstwo = '';
        
            foreach ($sqfoot_filters as $options) {
                // Append each option to the $options variable
                $optionstwo .= '<option value="'. $options->sqfoot_listing .'">' . $options->sqfoot_listing . '</option>';
            }
            echo $optionstwo;
        
            }

    
}
