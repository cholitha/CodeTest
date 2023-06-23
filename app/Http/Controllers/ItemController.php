<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    //All products ready to sell
    public function viewAvailabeSellingProducts(){
        $sellinglists=DB::table('stocks')
                ->join('users','stocks.seller_id','=','users.id')->get();
        return view('itemlist',compact('sellinglists'));
    }
}
