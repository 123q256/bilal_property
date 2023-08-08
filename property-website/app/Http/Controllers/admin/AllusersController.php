<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
class AllusersController extends Controller
{
    public function index()
    {
        $allusers = User::all();
        return view('admin.users.index', compact('allusers'));
    }
    public function create()
    {
      
        return view('admin.users.create' );
    }

    
    public function stores(Request $request)
    {
                       
        //   dd($request->all());  
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'user_role' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

   
        $users = new User;
        $users->name   = $request->input('name');
        $users->email   = $request->input('email');
        $users->user_role   = $request->input('user_role');
        $users->password   = Hash::make($request->input('password'));
        $users->show_password   = $request->input('password');
        $users->status = $request->status == true ? '1':'0';
        $users->save();

        return redirect('admin/users/create')->with('success',' User Add Successfully'); 	 	
    }

    public function edit($id)
    {
        $userse = User::find($id);
        return view('admin.users.edit', compact('userse'));
    }


    public function update(Request $request, $id)
    {
      
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'user_role' => ['required'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $Bedrooms = User::find($id);
        $Bedrooms->update([
            'name' =>$request->name,
            'email' =>$request->email,
            'user_role' =>$request->user_role,
            'password' =>Hash::make($request->password),
            'show_password' =>$request->password,
            'status' => $request->checkbox_get_value == true ? '1':'0',
        ]);

        return redirect('admin/users/')->with('success',' User Update  Successfully');;;
    }


    public function destroy(Request $request)
    {
       
        User::find($request->dataId)->delete();
          return response()->json([
            'status' => 200,
          ]);
    } 

    public function usersDeleteAll(Request $request)
    {

       $ids = $request->join_selected_values;
       $userses = explode(",", $ids);

       foreach ($userses as $userse) {
        $user_delete = User::find($userse);
        $user_delete->delete();
       }

       return response()->json([
           'status' => 200,
           'all_ids'=> $request->join_selected_values,
       ]);
    }


    public function type_users_checkbox(Request $request)
    {
       $users = User::find($request->types_id);

        if($users->status == 1){
            $status2 = 0;
        }else{
            $status2 = 1;
        }
        $users->update([
            'status' =>$status2,
        ]);  

        return response()->json([
            'status' => 200,
            'status2' => $status2,
        
        ]);  
    }
    
}
