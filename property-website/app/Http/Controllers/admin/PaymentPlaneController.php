<?php

namespace App\Http\Controllers\admin;

use App\Models\PaymentPlan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentPlaneController extends Controller
{
    public function index()
    {
        $PaymentPlans = PaymentPlan::all();
        return view('admin.payment_plane.index', compact('PaymentPlans'));
    }

    public function create()
    {
        return view('admin.payment_plane.create' );
    }

    public function stores(Request $request)
    {
                       
        //   dd($request->all());  
        $this->validate($request, [
            'payment_plane_years' => 'required',
        ]);
    
        $PaymentPlans = new PaymentPlan;
        $PaymentPlans->payment_plane_years   = $request->input('payment_plane_years');
        $PaymentPlans->status  =$request->status == true ? '1':'0';
        $PaymentPlans->save();

        return redirect('admin/payment_planes/create')->with('success',' Payment Plane Add Successfully');	 	 	
    }

    public function edit($id)
    {
        $PaymentPlans = PaymentPlan::find($id);
        return view('admin.payment_plane.edit', compact('PaymentPlans'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'payment_plane_years' => 'required',
        ]);

        $PaymentPlans = PaymentPlan::find($id);
        $PaymentPlans->update([
            'payment_plane_years' =>$request->payment_plane_years,
            'status' =>$request->status == true ? '1':'0',
        ]);  

        return redirect('admin/payment_planes/')->with('success',' Payment Plane Update  Successfully');
    }

    public function destroy(Request $request)
    {
        PaymentPlan::find($request->dataId)->delete();
        return response()->json([
            'status' => 200,
        ]);
    } 

   public function payment_planesDeleteAll(Request $request)
   {
       $ids = $request->join_selected_values;
       $PaymentPlans = explode(",", $ids);

        foreach ($PaymentPlans as $PaymentPlan) {
            $PaymentPlan_delete = PaymentPlan::find($PaymentPlan);
            $PaymentPlan_delete->delete();
        }

        return response()->json([
            'status' => 200,
            'all_ids'=> $request->join_selected_values,
        ]);
    }

   public function payment_planes_checkbox(Request $request)
   {
       $PaymentPlans = PaymentPlan::find($request->types_id);

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
