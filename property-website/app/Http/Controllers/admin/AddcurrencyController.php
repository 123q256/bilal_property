<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Addcurrency;
use Illuminate\Http\Request;

class AddcurrencyController extends Controller
{
    public function index()
    {
         $addcurrencys = Addcurrency::all();
        return view('admin.currency.index', compact('addcurrencys'));
      
    }
    public function create()
    {
        return view('admin.currency.create' );
    }

    
    public function stores(Request $request)
    {
                       
        //   dd($request->all());  
        $this->validate($request, [
            'currency' => 'required',           
        ]);
    
        $addcurrencys = new Addcurrency;
        $addcurrencys->currency   = $request->input('currency');
        $addcurrencys->status  =$request->status == true ? '1':'0';
        $addcurrencys->save();

        return redirect('admin/addcurrencys/create')->with('success',' Currency Add Successfully'); 	 	
    }

    public function edit($id)
    {
        $addcurrencys = Addcurrency::find($id);
        return view('admin.currency.edit', compact('addcurrencys'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'currency' => 'required',
        ]);

        $addcurrencys = Addcurrency::find($id);
        $addcurrencys->update([
            'currency' =>$request->currency,
            'status' =>$request->status == true ? '1':'0',
        ]);  
        return redirect('admin/addcurrencys/')->with('success',' Currency Update  Successfully'); 
    }


    public function destroy(Request $request)
    {
       
        Addcurrency::find($request->dataId)->delete();
        return response()->json([
            'status' => 200,
        ]);
    } 

    public function currencyDeleteAll(Request $request)
    {

       $ids = $request->join_selected_values;
       $addcurrencys = explode(",", $ids);

        foreach ($addcurrencys as $addcurrency) {
            $addcurrencys_delete = Addcurrency::find($addcurrency);
            $addcurrencys_delete->delete();
        }

        return response()->json([
           'status' => 200,
           'all_ids'=> $request->join_selected_values,
        ]);
    }


    public function type_property_checkbox(Request $request)
    {

       $addcurrencys = Addcurrency::find($request->types_id);

        if($addcurrencys->status == 1){
            $status2 = 0;
        }else{
            $status2 = 1;
        }

        $addcurrencys->update([
            'status' =>$status2,
        ]);  

        return response()->json([
            'status' => 200,
            'status2' => $status2,
        
        ]);
    }
}
