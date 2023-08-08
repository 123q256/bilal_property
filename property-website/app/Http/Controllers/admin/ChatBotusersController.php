<?php

namespace App\Http\Controllers\admin;

use App\Models\Chatbox;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatBotusersController extends Controller
{
    public function index()
    {
        $Chatboxs = Chatbox::all();
        return view('admin.chatbotUsers.index', compact('Chatboxs'));
    }
    public function create()
    {
      
        return view('admin.users.create' );
    }


    public function edit($id)
    {
        $chatbotuserse = Chatbox::find($id);
        return view('admin.chatbotUsers.edit', compact('chatbotuserse'));
    }


    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'chatbox_category' => ['required'],
            'chatbox_your_name' => ['required'],
            'chatbox_company_name' => ['required'],
            'chatbox_email' => ['required'],
            'chatbox_phone_no' => ['required'],
            'chatbox_budget' => ['required'],
            'chatbox_investment' => ['required'],
            'chatbox_aed' => ['required'],
            'chatbox_apartment' => ['required'],
            'chatbox_studio' => ['required'],
            'chatbox_immediately' => ['required'],
            'chatbox_specific_requirement' => ['required'],
            // 'chatbox_details' => ['required'],
      
             	 	 	 	 	 	 	 
                
        ]);

        $Chatboxs = Chatbox::find($id);
        $Chatboxs->update([
            'chatbox_category' =>$request->chatbox_category,
            'chatbox_your_name' =>$request->chatbox_your_name,
            'chatbox_company_name' =>$request->chatbox_company_name,
            'chatbox_email' =>$request->chatbox_email,
            'chatbox_phone_no' =>$request->chatbox_phone_no,
            'chatbox_budget' =>$request->chatbox_budget,
            'chatbox_investment' =>$request->chatbox_investment,
            'chatbox_aed' =>$request->chatbox_aed,
            'chatbox_apartment' =>$request->chatbox_apartment,
            'chatbox_studio' =>$request->chatbox_studio,
            'chatbox_immediately' =>$request->chatbox_immediately,
            'chatbox_specific_requirement' =>$request->chatbox_specific_requirement,
            'chatbox_details' =>$request->chatbox_details,
          
        ]);

        return redirect('admin/chatusers/')->with('success',' Chat Bot User Update  Successfully');;;
    }


    public function destroy(Request $request)
    {
       
        Chatbox::find($request->dataId)->delete();
          return response()->json([
            'status' => 200,
          ]);
    } 

    public function chatusersDeleteAll(Request $request)
    {

       $ids = $request->join_selected_values;
       $userses = explode(",", $ids);

       foreach ($userses as $userse) {
        $user_delete = Chatbox::find($userse);
        $user_delete->delete();
       }

       return response()->json([
           'status' => 200,
           'all_ids'=> $request->join_selected_values,
       ]);
    }
    
}
