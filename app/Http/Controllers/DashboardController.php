<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //Display admin dashboard
    public function viewadmindashboard(){
        return view('admin.dashboard');
    }
    //Display seller dashboard
    public function viewdashboard(){
        $tickets=DB::table('tickets')
                ->join('stocks','tickets.stock_id','=','stocks.id')
                ->join('users','stocks.seller_id','=','users.id')->where('stocks.seller_id','=',Auth::user()->id)
                ->select('tickets.*','stocks.item_name','users.name')
                ->get();
        return view('Sellers.dashboard',compact('tickets'));
    }
}
