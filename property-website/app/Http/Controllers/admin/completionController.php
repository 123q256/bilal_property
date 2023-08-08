<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\CompletionDate;
use App\Http\Controllers\Controller;

class completionController extends Controller
{
    public function index()
    {
        $completionDates = CompletionDate::all();
        return view('admin.completions.index', compact('completionDates'));
    }
    public function create()
    {
    
        return view('admin.completions.create' );
    }

    
    public function stores(Request $request)
    {
                       
        //   dd($request->all());  
        $this->validate($request, [
            'completions' => 'required',
        ]);
    
        $CompletionDatese = new CompletionDate;
        $CompletionDatese->completions   = $request->input('completions');
        $CompletionDatese->status  =$request->status == true ? '1':'0';
        $CompletionDatese->save();

        return redirect('admin/completions/create')->with('success',' completions Date Add Successfully'); 	 	
    }

    public function edit($id)
    {
        $completionDateedit = CompletionDate::find($id);
        return view('admin.completions.edit', compact('completionDateedit'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'completions' => 'required',
        ]);

        $CompletionDateupdate = CompletionDate::find($id);
        $CompletionDateupdate->update([
            'completions' =>$request->completions,
            'status' =>$request->status == true ? '1':'0',
        ]);

        return redirect('admin/completions/')->with('success',' Completions Date Update  Successfully');;;
    }


    public function destroy(Request $request)
    {
       
        CompletionDate::find($request->dataId)->delete();
          return response()->json([
            'status' => 200,
          ]);
    } 

    public function completionsDeleteAll(Request $request)
    {

       $ids = $request->join_selected_values;
       $Bedrooms = explode(",", $ids);

       foreach ($Bedrooms as $Bedroom) {
        $Bedrooms_delete = CompletionDate::find($Bedroom);
        $Bedrooms_delete->delete();
       }

       return response()->json([
           'status' => 200,
           'all_ids'=> $request->join_selected_values,
       ]);
    }


    public function type_property_checkbox(Request $request)
    {
       $Bedrooms = CompletionDate::find($request->types_id);

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
