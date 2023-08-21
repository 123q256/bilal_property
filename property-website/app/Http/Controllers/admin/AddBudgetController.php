<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Addbudget;
use Illuminate\Http\Request;

class AddBudgetController extends Controller
{
    public function index()
    {
         $addbudgets = Addbudget::all();
        return view('admin.Range_Budget.index', compact('addbudgets'));
      
    }
    public function create()
    {
        return view('admin.Range_Budget.create' );
    }

    
    public function stores(Request $request)
    {
                       
          // dd($request->all());  
        $this->validate($request, [
             'currency_ids' => 'required',           
             'budget' => 'required',           
        ]);
    
        $addcreate = new Addbudget;
        // dd($addcreate);
        $addcreate->currency_id    = $request->input('currency_ids');
        $addcreate->budget   = $request->input('budget');
        $addcreate->status  =$request->status == true ? '1':'0';
        $addcreate->save();

        return redirect('admin/addbudget/create')->with('success',' Budget Add Successfully'); 	 	
    }

    public function edit($id)
    {
        $addbudgets = Addbudget::find($id);
        return view('admin.Range_Budget.edit', compact('addbudgets'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
             'currency_id' => 'required',
        ]);

        $addbudgets = Addbudget::find($id);
        $addbudgets->update([
            'currency_id' =>$request->currency_id,
            'budget' =>$request->budget,
            'status' =>$request->status == true ? '1':'0',
        ]);  
        return redirect('admin/addbudget/')->with('success',' Budget Update  Successfully'); 
    }


    public function destroy(Request $request)
    {
       
        Addbudget::find($request->dataId)->delete();
        return response()->json([
            'status' => 200,
        ]);
    } 

    public function addbudgetDeleteAll(Request $request)
    {

       $ids = $request->join_selected_values;
       $addbudgets = explode(",", $ids);

        foreach ($addbudgets as $addbudget) {
            $addbudgets_delete = Addbudget::find($addbudget);
            $addbudgets_delete->delete();
        }

        return response()->json([
           'status' => 200,
           'all_ids'=> $request->join_selected_values,
        ]);
    }


    public function type_property_checkbox(Request $request)
    {

       $addbudgets = Addbudget::find($request->types_id);

        if($addbudgets->status == 1){
            $status2 = 0;
        }else{
            $status2 = 1;
        }

        $addbudgets->update([
            'status' =>$status2,
        ]);  

        return response()->json([
            'status' => 200,
            'status2' => $status2,
        
        ]);
    }
}
