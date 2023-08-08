<?php

namespace App\Http\Controllers\Frontend;
use Exception;
use App\Models\User;
use App\Mail\FormAdminMail;
use App\Mail\FormUsersMail;
use App\Models\UserProperty;
use Illuminate\Http\Request;
use App\Mail\FromTwoUserMail;
use App\Mail\FromTwoAdminMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserPropertyController extends Controller
{
    public function store(Request $request){
        // dd($request->all());
      
        $user_first_name = $request->input('user_first_name');
        $user_last_name = $request->input('user_last_name');
        $combinedData = $user_first_name . ' ' . $user_last_name;

        $dateString = $request->input('user_dateofbirth');
        $formattedDate = date("mm/dd/yy", strtotime($dateString));

        $checkemail = User::where('email', $request->email)->first();
//  dd($request->email);
        // dd($checkemail->id);
         if(!empty($checkemail->id)){
 
             return response()->json([
                 'status' => 100,
                 'message' => 'email already exist ',
             ]);
 
         }

         if($request->input('password') == $request->input('password_confirmation')){
            $users = new User;
            $users->name   = $combinedData;
            $users->email   = $request->input('email');
            $users->password   = Hash::make($request->input('password'));
            $users->show_password   = $request->input('password');
            $users->user_role   = '2';
            $users->save();
    
    
            $UserPropertys = new UserProperty;
            $UserPropertys->user_property   = $request->input('user_property');
            $UserPropertys->user_bedroom   = $request->input('user_bedroom');
            $UserPropertys->user_currency   = $request->input('user_currency');
            $UserPropertys->user_budget   = $request->input('user_budget');
            $UserPropertys->user_payment_plan   = $request->input('user_payment_plan');
            $UserPropertys->user_location   = $request->input('user_location');
            $UserPropertys->user_desired_size   = $request->input('user_desired_size');
            $UserPropertys->user_dateofbirth   = $formattedDate;
            $UserPropertys->user_id   = $users->id;
          
            $UserPropertys->save();

            $admincheck = User::where('user_role','1')->first();

            $formdata = [
                'user_property' => $request->user_property,
                'user_bedroom' => $request->user_bedroom,
                'user_currency' => $request->user_currency,
                'user_budget' =>$request->user_budget,
                'user_payment_plan' =>$request->user_payment_plan,
                'user_location' =>$request->user_location,
                'user_desired_size' =>$request->user_desired_size,
                'user_first_name' =>$request->user_first_name,
                'user_last_name' =>$request->user_last_name,
                'email' =>$request->email,
                'user_dateofbirth' =>$request->user_dateofbirth,
            
            ];
          
              // dd($formdata);
            try{  
    
                Mail::to($admincheck->email)->send(new FormAdminMail($formdata));
                Mail::to($request->email)->send(new FormUsersMail($formdata));
        
              }catch(Exception $e){
                return response()->json([
                    'status' => 400,
                    'error' => $e->getMessage()
                ]);
              }
            $redict_pages = '/';
            return response()->json([
                'status' => 200,
                'redirectURLs' => $redict_pages
              ]);
         }else{
            return response()->json([
                'status' => 300,
                'message' => 'password Does Not Match ',
            ]);
         }

        
        // return redirect('/forms')->with('success',' Your Information Add Successfully');	 	 	

    }


    public function store_two(Request $request){
        // dd($request->all());
       

            $UserPropertys = new UserProperty;
            $UserPropertys->user_property   = $request->input('user_property');
            $UserPropertys->user_bedroom   = $request->input('user_bedroom');
            $UserPropertys->user_currency   = $request->input('user_currency');
            $UserPropertys->user_budget   = $request->input('user_budget');
            $UserPropertys->user_payment_plan   = $request->input('user_payment_plan');
            $UserPropertys->user_location   = $request->input('user_location');
            $UserPropertys->user_desired_size   = $request->input('user_desired_size');
            $UserPropertys->user_dateofbirth   = $request->input('user_dateofbirth');
            $UserPropertys->user_id   = Auth::user()->id;
          
            $UserPropertys->save();

            $adminmail = User::where('user_role','1')->first();

            $formdatasingle = [
                'user_property' => $request->user_property,
                'user_bedroom' => $request->user_bedroom,
                'user_currency' => $request->user_currency,
                'user_budget' =>$request->user_budget,
                'user_payment_plan' =>$request->user_payment_plan,
                'user_location' =>$request->user_location,
                'user_desired_size' =>$request->user_desired_size,
            
            ];

            $usermail = User::where('id',Auth::user()->id)->first();
            // dd($usermail->email);

            try{  
    
                 Mail::to($adminmail->email)->send(new FromTwoAdminMail($formdatasingle));
                 Mail::to($usermail->email)->send(new FromTwoUserMail($formdatasingle));
        
              }catch(Exception $e){
                return response()->json([
                    'status' => 400,
                     'message' => 'Mail Some things Wrong'.$e->getMessage(),
                ]);
              
              }

            $redict_page = '/';
            return response()->json([
                'status' => 200,
                'redirectURL' => $redict_page
              ]);
        
         }
 	

    


}
