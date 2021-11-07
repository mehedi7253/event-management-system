<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\assignstackholder;
use App\Models\orders;
use App\Models\stakeholderpayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StakholderPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Stake Holder Payment List";
        $orders    = DB::table('assignstackholders')
                ->join('users','users.id','=','assignstackholders.stackholder_id')
                // ->join('orders','orders.id','=', 'assignstackholders.order_id')
                // ->select('users.name as StakeholderName','users.id as stakeholderID','orders.id as OrderID','orders.invoice_number')
                ->groupBy('assignstackholders.stackholder_id')
                ->get();
        
    return view('admin.payment.index', compact('page_name','orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_name = "Work Details";
        $orders  = DB::table('assignstackholders')
                ->join('users','users.id','=','assignstackholders.stackholder_id')
                ->join('orders','orders.id','=', 'assignstackholders.order_id')
                ->select('orders.id as orderID','orders.invoice_number','orders.created_at','orders.amount','assignstackholders.comission', 'assignstackholders.id as AssignID', 'assignstackholders.given_amount')
                ->get();
       

        return view('admin.payment.show', compact('page_name','orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = "Stakeholder Payment";
        $assign_id = assignstackholder::find($id);
        $payable_amount = DB::table('assignstackholders')
                        ->join('orders','orders.id','=','assignstackholders.order_id')
                        ->where('assignstackholders.id','=', $id)
                        ->get();
        
        return view('admin.payment.giveamount', compact('assign_id','page_name','payable_amount')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stakeholder_payment = assignstackholder::find($id);
        $date = @date('m-d-Y');

        $stakeholder_payment->given_amount  = $request->given_amount;
        $stakeholder_payment->pay_date      = $date;
        $stakeholder_payment->process       = 1;

        $stakeholder_payment->save();
        return redirect()->route('stackeholder-payments.index')->with('success','Payment Given Successful');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
