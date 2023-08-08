<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\Interestproperty;
use App\Http\Controllers\Controller;

class InterestpropertyController extends Controller
{
    public function index()
    {
        $Interestpropertys = Interestproperty::all();
        return view('admin.interestedUserProperty.index', compact('Interestpropertys'));
    }

    public function destroy(Request $request)
    {
       
        Interestproperty::find($request->dataId)->delete();
          return response()->json([
            'status' => 200,
          ]);
    } 

    public function interestusersDeleteAll(Request $request)
    {

       // dd($request->join_selected_values);
       $ids = $request->join_selected_values;
       $userses = explode(",", $ids);

       foreach ($userses as $userse) {
        $user_delete = Interestproperty::find($userse);
        $user_delete->delete();
       }

       return response()->json([
           'status' => 200,
           'all_ids'=> $request->join_selected_values,
       ]);
    }
}
