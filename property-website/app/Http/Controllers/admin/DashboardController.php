<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Developer;
use App\Models\ListingProperty;

class DashboardController extends Controller
{
    public function index() {
   
        // $totalproducts = Product::count();
        // $totalcategory = Category::count();
        $totallistingproperty = ListingProperty::count();
        $totalDeveloper = Developer::count();
        $totaluser = User::where('user_role','0')->count();
        $totaluserForm = User::where('user_role','2')->count();
        // $totaladmin = User::where('role_as','1')->count();
        // $totalorder = Order::count();

        // $todatdate = Carbon::now()->format('d-m-Y');
        // $todayorder = Order::whereDate('created_at',$todatdate)->count();

        // $thismonth = Carbon::now()->format('m');
        // $monthorder = Order::whereMonth('created_at',$thismonth)->count();

        // $thisyear = Carbon::now()->format('Y');
        // $yearorder = Order::whereYear('created_at',$thisyear)->count();

            return view('dashboard',compact('totaluser','totalDeveloper','totallistingproperty','totaluserForm'));
    }
}
