<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ContactUserMail;
use App\Mail\ContactAdminMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'contact_number' => 'required',
            'email' => 'required|email',
            'nationality' => 'required',
            'messages' => 'required',
        ]);

        $admincheck = User::where('user_role','1')->first();
        // dd($admincheck->email);
        try{
    
            Mail::to($validatedData['email'])->send(new ContactUserMail($validatedData));
            Mail::to($admincheck->email)->send(new ContactAdminMail($validatedData));
    
        return redirect('/contacts')->with('message',' Mail  has been sent');
    
          }catch(Exception $e){
          
             return redirect('/contacts')->with('message','  Mail Something went wrong.!');
         
          }

   
    }
}
