<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Ticket;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    //Create messages
    public function createMessagetoSupplier(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
            'customer' => 'required',
            'problem' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json(['errors' => $errors], 422);
        }
        DB::beginTransaction();
        try {
            $ticket=Ticket::create([
                'stock_id'=>$request->id,
                'customer'=>$request->customer,
                'email'=>$request->email,
                'ref_number'=>Str::upper(Str::random(3)).random_int(1000, 9999),
                'problem_description'=>$request->problem,
                'mobile_number'=>$request->mobile,
                'ticket_status'=>1
            ]);
            DB::commit();
            return response()->json(['success' => 'Thank you for the message,Please use this reference number for the inquiries : '.$ticket->ref_number], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['errors' => 'Unableto Save'], 422);
        }
        
    }

    //Get ticket Details
    public function getTicketDetails(Request $request){
        $validator = Validator::make($request->all(), [
            'number' => 'required'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return response()->json(['errors' => $errors], 422);
        }
        $tikcet=DB::table('tickets')->where('ref_number','=',$request->number)->get();
        return response()->json(['success' => ($tikcet[0]->ticket_status==1)?'Your ticket is in  : Pending status':'Your ticket is in  : Resolve status'], 201);
    }
    //Get ticket Details
    public function viewStatus(){
        return view('ticketstatus');
    }

    //Update Status
    public function updateTicketStatus(Request $request){
        $ticket=Ticket::find($request->id);
        $ticket->ticket_status=0;
        $ticket->save();
    }
}
