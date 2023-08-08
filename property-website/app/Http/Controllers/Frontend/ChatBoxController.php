<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Chatbox;
use Illuminate\Http\Request;
use App\Models\Interestproperty;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatBoxController extends Controller
{
    public function chatbox_datas(Request $request){
            // dd($request->all());

            $chatboxs = new Chatbox;
            $chatboxs->chatbox_category = $request->category;
            $chatboxs->chatbox_your_name = $request->your_name;
            $chatboxs->chatbox_company_name = $request->company_name;
            $chatboxs->chatbox_email = $request->email_name;
            $chatboxs->chatbox_phone_no = $request->phone_no;
            $chatboxs->chatbox_budget = $request->budget;
            $chatboxs->chatbox_investment = $request->investment;
            $chatboxs->chatbox_aed = $request->AED;
            $chatboxs->chatbox_apartment = $request->Apartments;
            $chatboxs->chatbox_studio = $request->Studio;
            $chatboxs->chatbox_immediately = $request->Immediately;
            $chatboxs->chatbox_specific_requirement = $request->Yes_I_am_currently_in_Dubai;
            $chatboxs->chatbox_details = $request->details;
            $redict_pages = '/';
            $chatboxs->save();
            return response()->json([
                'status' => 200,
                'redirectURL' => $redict_pages
            ]);
    }
    public function interest_property_forms(Request $request){
        // dd($request->all());
        $recaptcha_secret = "6Lff74knAAAAAELFG2A6ttrT3eDxcO0nMnmxF2Nx";
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$request->input('g-recaptcha-response'));
    
        $response = json_decode($response, true);
        
        if($response['success'] === true){
        

        $interestproperty = new Interestproperty;
        $interestproperty->interest_name = $request->interest_name;
        $interestproperty->interest_email = $request->interest_email;
        $interestproperty->phone = $request->hide_phonesone.''.$request->phone;
        $interestproperty->language = $request->language;
        $interestproperty->interest_message = $request->interest_message;
        $interestproperty->property_id = $request->property_id;
     
        $interestproperty->save();
        return response()->json([
            'status' => 200,
      
        ]);
    }else{
        return response()->json([
            'status' => 100,
          
        ]);
    }
}

public function interest_property_forms_two(Request $request){
    // dd($request->all());

    $recaptcha_secret = "6Lff74knAAAAAELFG2A6ttrT3eDxcO0nMnmxF2Nx";
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$recaptcha_secret."&response=".$request->input('g-recaptcha-response'));

    $response = json_decode($response, true);

    if($response['success'] === true){
        $interestproperty = new Interestproperty;
        $interestproperty->interest_name = $request->interest_name_two;
        $interestproperty->interest_email = $request->interest_email_two;
        $interestproperty->phone = $request->hide_phonesone_two.''.$request->phone_two;
        $interestproperty->language = $request->language_two;
        $interestproperty->interest_message = $request->interest_message_two;
        $interestproperty->property_id = $request->property_id_two;
     
        $interestproperty->save();
        return response()->json([
            'status' => 200,
          
        ]);
    }else{
        return response()->json([
            'status' => 100,
          
        ]);
    }


}


}
