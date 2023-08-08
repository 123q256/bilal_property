<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function index()
    {
        $Locations = Location::all();
        return view('admin.location.index', compact('Locations'));
    }

    public function create()
    {
        return view('admin.location.create' );
    }

    public function stores(Request $request)
    {
                       
        //   dd($request->all());  
        $this->validate($request, [
            'location' => 'required',
        ]);
    
        $PaymentPlans = new Location;
        $PaymentPlans->location   = $request->input('location');
        $PaymentPlans->status  =$request->status == true ? '1':'0';
        $PaymentPlans->save();

        return redirect('admin/locations/create')->with('success',' Locations Add Successfully'); 	 	 	
    }

    public function edit($id)
    {
        $Locations = Location::find($id);
        return view('admin.location.edit', compact('Locations'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'location' => 'required',
        ]);

        $Locations = Location::find($id);
        $Locations->update([
            'location' =>$request->location,
            'status' =>$request->status == true ? '1':'0',
        ]);  

        return redirect('admin/locations/')->with('success',' Location Update  Successfully');;;
    }

    public function destroy(Request $request)
    {
       
        Location::find($request->dataId)->delete();
        return response()->json([
            'status' => 200,
        ]);
    } 

   public function locationDeleteAll(Request $request)
   {
       $ids = $request->join_selected_values;
       $Locations = explode(",", $ids);

        foreach ($Locations as $Location) {
            $Location_delete = Location::find($Location);
            $Location_delete->delete();
        }

        return response()->json([
            'status' => 200,
            'all_ids'=> $request->join_selected_values,
        ]);
        
   }

   public function locations_checkbox(Request $request)
   {
       $PaymentPlans = Location::find($request->types_id);

        if($PaymentPlans->status == 1){
            $status2 = 0;
        }else{
            $status2 = 1;
        }

        $PaymentPlans->update([
            'status' =>$status2,
        ]);  

        return response()->json([
            'status' => 200,
            'status2' => $status2,
        
        ]);
    }
}
