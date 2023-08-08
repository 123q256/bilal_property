<?php

namespace App\Http\Controllers\admin;
use Exception;
use App\Models\Developer;
use App\Mail\DeveloperMail;
use Illuminate\Http\Request;
use App\Mail\DeveloperUpdateMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
class DeveloperController extends Controller
{
    public function index()
    {
        $developers = Developer::all();
        return view('admin.developer.index' , compact('developers'));
    }
    public function create()
    {
        return view('admin.developer.create' );
    }

    public function stores(Request $request)
    {       
        //   dd($request->all());  
        $this->validate($request, [
            'developer_name' => 'required',
            'email'=> 'required', 'string', 'email', 'max:255', 'unique:developer',
            'password' => 'required', 'string', 'min:8',
            'description' => 'required',
            'location' => 'required',
            'type_property' => 'required',
            'developer_logo' => 'required',

            
           
        ]);   	 	
    
        $Developers = new Developer;
        $Developers->developer_name  = $request->input('developer_name');
        $Developers->status  =$request->status == true ? '1':'0';
        $Developers->password_show  = $request->input('password');
        $Developers->email  = $request->input('email');
        $Developers->password  = Hash::make($request->input('password'));
        $Developers->description  = $request->input('description');
        $Developers->location  = $request->input('location');
        $Developers->type_of_property  = $request->input('type_property');


        if($request->hasFile('developer_logo')){
            $files = $request->File('developer_logo');
            $imagename = time().$files->getClientOriginalName();
            $files->move('admin_images/developer_logo/', $imagename );
            $Developers->developer_logo  = $imagename;
            // dd('helo');
             }

        $Developers->save();

        $details = [
            'developer_name' => $request->developer_name,
            'password' => $request->password,
            'email' => $request->email,
            'description' => $request->description,
            'location' =>$request->location,
            'type_of_property' =>$request->type_property,
        ];

        try{

            Mail::to("$request->email")->send(new DeveloperMail($details));
            // return response()->json(['success'=> '200']);
            return redirect('admin/developer/')->with('message',' Mail  has been sent to '.$request->email)->with('success',' Developer Add Successfully');;
        
        }catch(Exception $e){
            // dd($e);
            return redirect('admin/developer/')->with('message','  Mail Something went Wroung.!')->with('success',' Developer Add Successfully');;;
            // return response()->json(['success'=> '404']);
        }

        // return redirect('admin/developer')->with('success',' Developer Add Successfully');
      	 	 	 	
    }
    public function edit($id)
    {
        $developers = Developer::find($id);
        return view('admin.developer.edit', compact('developers'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'developer_name' => 'required',
            'email'=> 'required', 'string', 'email', 'max:255', 'unique:developer',
            'password' => 'required', 'string', 'min:8',
            'description' => 'required',
            'location' => 'required',
            'type_property' => 'required',
           
        ]);
        $Developers = Developer::find($id);
        // $Developers->update([
        //     'developer_name' =>$request->developer_name,
        //     'status' =>$request->status == true ? '1':'0',
        //     'email' =>$request->email,
        //     'password_show' =>$request->password,
        //     'password' => Hash::make($request->password),
        //     'description' =>$request->description,
        //     'location' =>$request->location,
        //     'type_of_property' =>$request->type_property,
        //     // 'developer_logo' => 'required',

        // ]);  


        $Developers['developer_name'] = $request->developer_name;
        $Developers['status'] = $request->status == true ? '1':'0';
        $Developers['email'] = $request->email;
        $Developers['password_show'] = $request->password;
        $Developers['password'] = Hash::make($request->password);
        $Developers['description'] = $request->description;
        $Developers['location'] = $request->location;
        $Developers['type_of_property'] = $request->type_of_property;


        if($request->hasFile('developer_logo')){
            //dd('yes');
 
             $imagepath =   $Developers['developer_logo'];
             $path = 'admin_images/developer_logo/'.$imagepath;
             if(File::exists($path)){
                 
                 File::delete($path);
             }
 
             $files = $request->File('developer_logo');
                $imagename = time().$files->getClientOriginalName();
                $files->move('admin_images/developer_logo/', $imagename );
                $Developers['developer_logo'] = $imagename;
                 //dd( $doctors['doctor_image']);
              }


              $Developers->update();

        $details = [
            'developer_name' => $request->developer_name,
            'password' => $request->password,
            'email' => $request->email,
            'description' => $request->description,
            'location' =>$request->location,
            'type_of_property' =>$request->type_property,
        ];
      
        try{

            Mail::to("$request->email")->send(new DeveloperUpdateMail($details));
            // return response()->json(['success'=> '200']);
            return redirect('admin/developer/')->with('message',' Mail  has been sent to '.$request->email)->with('success',' Developer Add Successfully');;
    
        }catch(Exception $e){
            // dd($e);
            return redirect('admin/developer/')->with('message','  Mail Something went Wroung.!')->with('success',' Developer Add Successfully');;;
            // return response()->json(['success'=> '404']);
  
        }
    }

    public function destroy(Request $request)
    { 
       $Developer =  Developer::find($request->dataId);

        if($Developer){
            $imagepath= $Developer->developer_logo;
            $path = 'admin_images/developer_logo/'.$imagepath;
            if(File::exists($path)){
                File::delete($path);
            }

       }
       $Developer->delete();
        return response()->json([
            'status' => 200,
        ]);
    } 

   public function deleteAll(Request $request)
   {
       $ids = $request->join_selected_values;
       $developers = explode(",", $ids);

        foreach ($developers as $developer) {
            $developer = Developer::find($developer);
            $imagepath = $developer->developer_logo;
            $path = 'admin_images/developer_logo/'.$imagepath;
            if(File::exists($path)){
                File::delete($path);
            }
            
            $developer->delete();
        }


        return response()->json([
           'status' => 200,
           'all_ids'=> $request->join_selected_values,
        ]);
    }


   public function developer_checkbox(Request $request)
   {
       $developer = Developer::find($request->developer_id);

        if($developer->status == 1){
            $status1 = 0;
        }else{
            $status1 = 1;
        }

        $developer->update([
            'status' =>$status1,
        ]);  

        return response()->json([
            'status' => 200,
            'status1' => $status1,
        ]);  
    }
}
