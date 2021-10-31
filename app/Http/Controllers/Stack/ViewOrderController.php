<?php

namespace App\Http\Controllers\Stack;

use App\Http\Controllers\Controller;
use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ViewOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Order List";
        $order_list = DB::table('assignstackholders')
                ->join('orders','orders.id', '=', 'assignstackholders.order_id')
                ->where('assignstackholders.stackholder_id', '=', Auth::user()->id)
                ->where('assignstackholders.process','=', '0')
                ->get();

        return view('stakeholder.orders.index',compact('page_name','order_list'));
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
        $page_name = "Order Details";
        $orders    = orders::find($id);
        $invoice_number = $orders->invoice_number;

        $order_item = DB::table('orders')
                    ->join('carts','carts.invoice_number', '=', 'orders.invoice_number')
                    ->join('packages','packages.id', '=', 'carts.package_id')
                    ->join('categories', 'categories.id', '=', 'carts.category_id')
                    ->join('subcategories', 'subcategories.id', 'carts.sub_category_id')
                    ->where('orders.invoice_number','=', $invoice_number)
                    ->get();

         $total_price = 0;
        foreach ($order_item as $order){
            $package_name   = $order->package_name;
            $package_price  = $order->price;
            $main_menu      = $order->name;
            $total_price   += $order->price;
        }  
       
       $stake_holder = DB::table('assignstackholders')
                ->join('orders','orders.id', '=', 'assignstackholders.order_id')
                ->join('users','users.id', '=', 'assignstackholders.stackholder_id')
                ->where('assignstackholders.order_id','=', $orders->id)
                ->get();
        return view('stakeholder.orders.invoice', compact('page_name','order_item','orders', 'package_name', 'total_price', 'main_menu','stake_holder'));
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
