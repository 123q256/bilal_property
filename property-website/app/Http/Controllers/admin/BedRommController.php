<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bedroom;
use Illuminate\Http\Request;

class BedRommController extends Controller
{
    public function index()
    {
        $Bedrooms = Bedroom::all();
        return view('admin.bedroom.index', compact('Bedrooms'));
    }
    public function create()
    {
      
        return view('admin.bedroom.create' );
    }

    
    public function stores(Request $request)
    {
                       
        //   dd($request->all());  
        $this->validate($request, [
            'bed_room_number' => 'required',
        ]);
    
        $Bedrooms = new Bedroom;
        $Bedrooms->number_of_bed   = $request->input('bed_room_number');
        $Bedrooms->status  =$request->status == true ? '1':'0';
        $Bedrooms->save();

        return redirect('admin/bedrooms/create')->with('success',' Bed Room Number Add Successfully'); 	 	
    }

    public function edit($id)
    {
        $Bedrooms = Bedroom::find($id);
        return view('admin.bedroom.edit', compact('Bedrooms'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'bed_room_number' => 'required',
        ]);

        $Bedrooms = Bedroom::find($id);
        $Bedrooms->update([
            'number_of_bed' =>$request->bed_room_number,
            'status' =>$request->status == true ? '1':'0',
        ]);

        return redirect('admin/bedrooms/')->with('success',' Bed Room Number Update  Successfully');;;
    }


    public function destroy(Request $request)
    {
       
        Bedroom::find($request->dataId)->delete();
          return response()->json([
            'status' => 200,
          ]);
    } 

    public function bedroomsDeleteAll(Request $request)
    {

       $ids = $request->join_selected_values;
       $Bedrooms = explode(",", $ids);

       foreach ($Bedrooms as $Bedroom) {
        $Bedrooms_delete = Bedroom::find($Bedroom);
        $Bedrooms_delete->delete();
       }

       return response()->json([
           'status' => 200,
           'all_ids'=> $request->join_selected_values,
       ]);
    }


    public function type_property_checkbox(Request $request)
    {
       $Bedrooms = Bedroom::find($request->types_id);

        if($Bedrooms->status == 1){
            $status2 = 0;
        }else{
            $status2 = 1;
        }
        $Bedrooms->update([
            'status' =>$status2,
        ]);  

        return response()->json([
            'status' => 200,
            'status2' => $status2,
        
        ]);  
    }

}
