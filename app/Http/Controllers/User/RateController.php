<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\orders;
use App\Models\rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $page_name = "Rate Package";
        $orders = orders::find($id);
        $ivoice_number = $orders->invoice_number;

        $cart_item =  DB::table('orders')
              ->join('carts','carts.invoice_number','=','orders.invoice_number')
              ->where('orders.invoice_number','=',$ivoice_number)
              ->groupBy('orders.invoice_number')
              ->get();

        return view('user.rating.index', compact('page_name', 'cart_item','orders'));
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
        $this->validate($request, [
            'status'      => 'required',
            'description' => 'required'
        ]);

        $rate = new rating();
        $rate->package_id    = $request->package_id;
        $rate->status        = $request->status;
        $rate->description   = $request->description;
        $rate->user_id       = Auth::user()->id;

        $update = orders::find($id);
        $update->rating_status = '1';
        $update->save();
        $rate->save();

        return redirect()->route('user-orders.index')->with('success','Rated Successful');
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
