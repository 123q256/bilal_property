<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Mail\DeveloperMail;
use Illuminate\Http\Request;
use App\Models\TypeOfProperty;
use App\Mail\DeveloperUpdateMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class TypesOfPrpertyController extends Controller
{
    public function index()
    {
        $TypeOfPropertys = TypeOfProperty::all();
        return view('admin.types_of_property.index', compact('TypeOfPropertys'));
      
    }

    public function create()
    {
        return view('admin.types_of_property.create' );
    }

    public function stores(Request $request)
    {          
        //   dd($request->all());  
        $this->validate($request, [
            'type_of_property' => 'required',
        ]);
    
        $TypeOfPropertys = new TypeOfProperty;
        $TypeOfPropertys->property_type   = $request->input('type_of_property');
        $TypeOfPropertys->status  =$request->status == true ? '1':'0';
        $TypeOfPropertys->save();
     
        return redirect('admin/type_property/create')->with('success',' Type of Property Name  Add Successfully');	
    }

    public function edit($id)
    {
        $TypeOfPropertys = TypeOfProperty::find($id);
        return view('admin.types_of_property.edit', compact('TypeOfPropertys'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'type_of_property' => 'required',
        ]);

        $TypeOfPropertys = TypeOfProperty::find($id);
        $TypeOfPropertys->update([
            'property_type' =>$request->type_of_property,
            'status' =>$request->status == true ? '1':'0',
        ]);  

   
        return redirect('admin/type_property/')->with('success',' Type of Property Name  Update  Successfully');
    }


    public function destroy(Request $request)
    {
       
        TypeOfProperty::find($request->dataId)->delete();
        return response()->json([
            'status' => 200,
        ]);
    } 

   public function deleteAll(Request $request)
   {

       $ids = $request->join_selected_values;
       $developers = explode(",", $ids);

        foreach ($developers as $developer) {
            $developer = TypeOfProperty::find($developer);
            $developer->delete();
        }

        return response()->json([
            'status' => 200,
            'all_ids'=> $request->join_selected_values,
        ]);
    }

   public function type_property_checkbox(Request $request)
   {
       $TypeOfPropertys = TypeOfProperty::find($request->types_id);

        if($TypeOfPropertys->status == 1){
            $status2 = 0;
        }else{
            $status2 = 1;
        }

        $TypeOfPropertys->update([
            'status' =>$status2,
        ]);  

        return response()->json([
            'status' => 200,
            'status2' => $status2,
        ]);
    }


}
