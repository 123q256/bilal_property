<?php

namespace App\Http\Controllers\admin;

use App\Models\Price;
use App\Models\Budget;
use App\Models\Sqfoot;
use App\Models\Addbudget;
use Illuminate\Http\Request;
use App\Models\ListingProperty;
use App\Http\Controllers\Controller;
use App\Models\ListingPropertyImage;
use App\Models\ListingPropertyVideo;
use Illuminate\Support\Facades\File;

class ListingPropertyController extends Controller
{
    public function index()
    {
        $listing_properties = ListingProperty::all();
        return view('admin.listing_property.index', compact('listing_properties')); 
    }

    public function create()
    {
        return view('admin.listing_property.create' );
    }

    public function stores(Request $request)
    {          
        //   dd($request->gallery);  
        $this->validate($request, [
            'types_of_property' => 'required',
            'bed_room_no' => 'required',
            'handover' => 'required',
            'payment_plan' => 'required',
            'second_payment' => 'required',
            'first_payment' => 'required',
            'title_name' => 'required',
            'location' => 'required',
            'budget_select' => 'required',
            'change_currency' => 'required',
            'highlights' => 'required',
            'Project_details' => 'required',
            'amenities_details' => 'required',
            'location_details' => 'required',
            'Interiors_and_Units' => 'required',
            'incentives' => 'required',
            'desired_size' => 'required',
            'developer_information' => 'required',
            'video' => 'mimetypes:video/mp4,video/quicktime|max:50000',
           
        ]);    

        $value_one = $request->input('desired_size');

        $parts = explode("*", $value_one);
        $one_one = $parts[0];
        $two_two = $parts[1];

         $integerone = (int) $one_one; 
         $integertwo = (int) $two_two; 

         $allcalculation_one = $integerone*$integertwo;
        
        

        $PaymentPlans = new ListingProperty;
        $PaymentPlans->type_of_property = $request->input('types_of_property');
        $PaymentPlans->status  =$request->status == true ? '1':'0';
        $PaymentPlans->number_of_bedrooms = $request->input('bed_room_no');
        $PaymentPlans->handover = $request->input('handover');
        $PaymentPlans->payment_plane = $request->input('payment_plan');
        $PaymentPlans->first_payment = $request->input('first_payment');
        $PaymentPlans->second_payment = $request->input('second_payment');
        $PaymentPlans->currencys = $request->input('change_currency');
        $PaymentPlans->title_name = $request->input('title_name');
        $PaymentPlans->budgets = $request->input('budget_select');
        $PaymentPlans->desired_size = $allcalculation_one;
        $PaymentPlans->show_desired_size = $request->input('desired_size');
        $PaymentPlans->location = $request->input('location');
        $PaymentPlans->highlights = $request->input('highlights');
        $PaymentPlans->Project_details = $request->input('Project_details');
        $PaymentPlans->amenities_details = $request->input('amenities_details');
        $PaymentPlans->location_details = $request->input('location_details');
        $PaymentPlans->Interiors_and_Units = $request->input('Interiors_and_Units');
        $PaymentPlans->other_incentives = $request->input('incentives');
        $PaymentPlans->about_the_developer = $request->input('developer_information');
        $PaymentPlans->save();

        $prices = new Price;
        $prices->price_listing = $request->input('budget_select');
        $prices->listing_id = $PaymentPlans->id;
        $prices->developers_id = $request->input('developer_information');
        $prices->save();


        $Sqfoots = new Sqfoot;
        $Sqfoots->sqfoot_listing = $allcalculation_one;
        $Sqfoots->listing_id = $PaymentPlans->id;
        $Sqfoots->developers_id = $request->input('developer_information');
        $Sqfoots->save();


    
        

        if ($request->hasFile("gallery")) {
            foreach ($request->gallery as $img) {
                $imagename = time() . rand(1, 99) . '.' . $img->extension();
                $img->move('admin_images/Listing_property_images/', $imagename );
                $blogsImage = new ListingPropertyImage;
                $blogsImage->list_pro_image  = $imagename;
                $blogsImage->list_property_id = $PaymentPlans->id;
                $blogsImage->save();
            }
        }

        if($request->videos){

        
            foreach ($request->videos as $video) {
                $videoename = time() . rand(1, 99) . '.' . $video->extension();
                $video->move('admin_images/Listing_property_video', $videoename);
                $videoModel = new ListingPropertyVideo();
                $videoModel->list_pro_video = $videoename;
                $videoModel->list_property_id = $PaymentPlans->id;
                $videoModel->save();
            }

        }
        return redirect('admin/listing_property/')->with('success',' Listing Property Add Successfully');	 	 	
    }

    public function edit($id)
    {
        $ListingPropertys = ListingProperty::find($id);
        return view('admin.listing_property.edit', compact('ListingPropertys'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'types_of_property' => 'required',
            'bed_room_no' => 'required',
            'handover' => 'required',
            'payment_plan' => 'required',
            'first_payment' => 'required',
            'second_payment' => 'required',
            'location' => 'required',
            'budget_select' => 'required',
            'title_name' => 'required',
            'change_currency' => 'required',
            'highlights' => 'required',
            'Project_details' => 'required',
            'amenities_details' => 'required',
            'location_details' => 'required',
            'Interiors_and_Units' => 'required',
            'incentives' => 'required',
            'desired_size' => 'required',
            'developer_information' => 'required',
            'video' => 'mimetypes:video/mp4,video/quicktime|max:50000',
           
        ]);    

        $value_ones = $request->input('desired_size');

        $partss = explode("*", $value_ones);
        $one_ones = $partss[0];
        $two_twos = $partss[1];

         $integerones = (int) $one_ones; 
         $integertwos = (int) $two_twos; 

         $allcalculation = $integerones*$integertwos;


        $ListingPropertys = ListingProperty::find($id);
        $ListingPropertys->update([
            'title_name' =>$request->title_name,
            'type_of_property' =>$request->types_of_property,
            'number_of_bedrooms' =>$request->bed_room_no,
            'handover' =>$request->handover,
            'payment_plane' =>$request->payment_plan,
            'first_payment' =>$request->first_payment,
            'second_payment' =>$request->second_payment,
            'budgets' =>$request->budget_select,
            'desired_size' =>$allcalculation,
            'show_desired_size' =>$request->desired_size,
            'currencys' =>$request->change_currency,
            'location' =>$request->location,
            'highlights' =>$request->highlights,
            'Project_details' =>$request->Project_details,
            'amenities_details' =>$request->amenities_details,
            'location_details' =>$request->location_details,
            'Interiors_and_Units' =>$request->Interiors_and_Units,
            'other_incentives' =>$request->incentives,
            'about_the_developer' =>$request->developer_information,
            'status' =>$request->status == true ? '1':'0',
        ]);  


        $priceEdit = Price::where('listing_id',$id)->first();
        $priceEdit->update([
            'price_listing' =>$request->budget_select,
            'developers_id' =>$request->developer_information,
       
     
        ]);  

        $sqfootEdit = Sqfoot::where('listing_id',$id)->first();
        $sqfootEdit->update([
            'sqfoot_listing' =>$allcalculation,
            'developers_id' =>$request->developer_information,
          
     
        ]);  


        


        // $prices = new Price;
        // $prices->price_listing = $request->input('budget_select');
        // $prices->listing_id = $PaymentPlans->id;
        // $prices->save();


        // $Sqfoots = new Sqfoot;
        // $Sqfoots->sqfoot_listing = $allcalculation_one;
        // $Sqfoots->listing_id = $PaymentPlans->id;
        // $Sqfoots->save();



        

        if ($request->hasFile("gallery")) {
            foreach ($request->gallery as $img) {
                $imagename = time() . rand(1, 99) . '.' . $img->extension();
                $img->move('admin_images/Listing_property_images/', $imagename );
                $blogsImage = new ListingPropertyImage;
                $blogsImage->list_pro_image  = $imagename;
                $blogsImage->list_property_id = $ListingPropertys->id;
                $blogsImage->save();
            }
        }

        if($request->videos){

            foreach ($request->videos as $video) {
                $videoename = time() . rand(1, 99) . '.' . $video->extension();
                $video->move('admin_images/Listing_property_video', $videoename);
                $videoModel = new ListingPropertyVideo();
                $videoModel->list_pro_video = $videoename;
                $videoModel->list_property_id = $ListingPropertys->id;
                $videoModel->save();
            }

        }

        return redirect('admin/listing_property/')->with('success',' Listing Property Update  Successfully');
    }








    




   
    public function listing_propertyDeleteAll(Request $request)
    {
 
         // dd($request->all());
        $ids = $request->join_selected_values;
        $product_ids = explode(",", $ids);

        foreach ($product_ids as $product_id) {
          ListingProperty::find($product_id)->delete();

      $ListingPropertyImages = ListingPropertyImage::where('list_property_id',$product_id)->get();
        // dd($ListingPropertyImages);
        foreach ($ListingPropertyImages as $ListingPropertyImage) {
        $imagepath =   $ListingPropertyImage-> list_pro_image;
        $path = 'admin_images/Listing_property_images/'.$imagepath;
        if(File::exists($path)){
            File::delete($path);
        }
        } 
        ListingPropertyImage::where('list_property_id',$product_id)->delete();

        $ListingPropertyVideoes = ListingPropertyVideo::where('list_property_id',$product_id)->get();
        foreach ($ListingPropertyVideoes as $ListingPropertyVideo) {
        $videopath =   $ListingPropertyVideo->list_pro_video;
        $path = 'admin_images/Listing_property_video/'.$videopath;
        if(File::exists($path)){
            File::delete($path);
        }
        }
        ListingPropertyVideo::where('list_property_id',$request->dataId)->delete();

        }
        Price::where('listing_id',$request->dataId)->delete();

        Sqfoot::where('listing_id',$request->dataId)->delete(); 
 
        return response()->json([
            'status' => 200,
            'all_ids'=> $request->join_selected_values,
        ]);
     
    }
    


    public function destroy(Request $request)
    {
       
        ListingProperty::find($request->dataId)->delete();

        $ListingPropertyImages = ListingPropertyImage::where('list_property_id',$request->dataId)->get();
        // dd($ListingPropertyImages);

        foreach ($ListingPropertyImages as $ListingPropertyImage) {
        $imagepath =   $ListingPropertyImage-> list_pro_image;
        $path = 'admin_images/Listing_property_images/'.$imagepath;
        if(File::exists($path)){
            File::delete($path);
        }
        } 
        
        ListingPropertyImage::where('list_property_id',$request->dataId)->delete();

        $ListingPropertyVideoes = ListingPropertyVideo::where('list_property_id',$request->dataId)->get();
        foreach ($ListingPropertyVideoes as $ListingPropertyVideo) {
        $videopath =   $ListingPropertyVideo->list_pro_video;
        $path = 'admin_images/Listing_property_video/'.$videopath;
        if(File::exists($path)){
            File::delete($path);
        }
        }
        ListingPropertyVideo::where('list_property_id',$request->dataId)->delete();


         Price::where('listing_id',$request->dataId)->delete();

         Sqfoot::where('listing_id',$request->dataId)->delete(); 

          return response()->json([
            'status' => 200,
          ]);
  

}
    
   public function listing_property_checkbox(Request $request)
   {

  
       $ListingPropertys = ListingProperty::find($request->types_id);

       if($ListingPropertys->status == 1){
         $status2 = 0;
       }else{
        $status2 = 1;
       }

       $ListingPropertys->update([
        'status' =>$status2,
    ]);  

    return response()->json([
        'status' => 200,
        'status2' => $status2,
      
    ]);
      
   }

 public function ajax_one_image_delete(Request $request)
 {

    $ListingPropertys = ListingPropertyImage::find($request->item_img_id);

        $imagepath =   $ListingPropertys-> list_pro_image;
        $path = 'admin_images/Listing_property_images/'.$imagepath;
        if(File::exists($path)){
            File::delete($path);
        }
    
        ListingPropertyImage::find($request->item_img_id)->delete();

        return response()->json([
            'status' => 200,
            'img_item_delete'=> $request->item_img_id,
          
        ]);
  
 }

 public function ajax_one_video_delete(Request $request)
 {

    $ListingPropertyVideos = ListingPropertyVideo::find($request->item_video_id);

        $imagepath =   $ListingPropertyVideos-> list_pro_video;
        $path = 'admin_images/Listing_property_video/'.$imagepath;
        if(File::exists($path)){
            File::delete($path);
        }
    
        ListingPropertyVideo::find($request->item_video_id)->delete();

        return response()->json([
            'status' => 200,
            'video_item_delete'=> $request->item_video_id,
          
        ]);
  
 }

 




//  public function append_budget(Request $request){

//     $subCategory = Addbudget::where('currency_id',$request->category_id)->where('status','0')->get();
// //    dd($subCategory);
//     return response()->json($subCategory);
   
// }


// public function append_budget_edit(Request $request){

//     $subCategory = Addbudget::where('currency_id',$request->category_id)->where('status','0')->get();
// //    dd($subCategory);
//     return response()->json($subCategory);
   
// }



}
