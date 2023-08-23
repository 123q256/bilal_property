<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserProfileChangeController extends Controller
{

    public function index(){
        return view('frontend.users-profiles.user-profile');
    }

    public function updateuserdetails(Request $request){
       
        //  dd($request->all());
        $request->validate([
            'first_name'=>['required'],
            'last_name'=>['required'],
            'email'=>['required'],
        ]);

      $last_pho = $request->phoneuser_hide.''.$request->phone_no;

      $user = User::FindOrFail(auth()->user()->id);
   
//dd($user);

            if($request->phone_no){
            $user->update([
                'phone_no'=> $last_pho,
            
            ]);
        }

    

      if($request->hasFile('avatar')){
       // dd('ha');
  
        $userimages = User::FindOrFail(auth()->user()->id);
        if($userimages){
          //  dd('ha11');
            $imagepath= $user->avatar;
            $path = 'users-images/'.$imagepath;
            if(File::exists($path)){
                File::delete($path);
            }
        

        $files = $request->File('avatar');
           $imagename = $files->getClientOriginalName();
           $files->move('users-images/', $imagename );
        //    $userdetails->Image = $imagename;
         
        $userimages->update([
            'avatar' => $imagename,
          ]);

         }
        }

         $user->update([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
           
           
          ]);
    

   
    return redirect()->back()->with('message','User Profile Update Successfully');
   
    }


    public function passwordcreate(){
        return view('frontend.users-profiles.change-password');
    }


    public function changepassword(Request $request){
        $request->validate([
            'current_password' => ['required','string','min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if($currentPasswordStatus){

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message','Password Updated Successfully');

        }else{

            return redirect()->back()->with('message','Current Password does not match with Old Password');
        }

    }


    public function deleteImage($id){
        //dd($id);
 
         $userses = User::FindOrFail($id);
         //  dd($userses->image);
 
         $imagepath= $userses->avatar;
         $path = 'users-images/'.$imagepath;
         if(File::exists($path)){
             File::delete($path);
         }
         
 
          $userses->update([
            'avatar'=> NULL,
         
          ]);
 
        
          return redirect()->back()->with('message','Image Delete Successfully');
 
     }

}
