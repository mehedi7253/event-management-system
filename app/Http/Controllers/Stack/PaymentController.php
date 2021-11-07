<?php

namespace App\Http\Controllers\Stack;

use App\Http\Controllers\Controller;
use App\Models\assignstackholder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "My Payment List";
        $orders  = DB::table('assignstackholders')
        ->join('orders','orders.id','=', 'assignstackholders.order_id')
        ->where('assignstackholders.stackholder_id', '=', Auth::user()->id)
        ->select('orders.id as orderID','orders.invoice_number','orders.created_at','orders.amount','assignstackholders.comission', 'assignstackholders.id as AssignID', 'assignstackholders.given_amount')
        ->get();

        $total = DB::table('assignstackholders')->where('stackholder_id','=',Auth::user()->id)->sum('given_amount');
        
        return view('stakeholder.payment.index', compact('page_name','orders', 'total'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
