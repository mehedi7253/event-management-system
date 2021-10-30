<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "New Order List";
        $orders = orders::all();

        return view('admin.orders.index', compact('page_name','orders'));
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
       
        return view('admin.orders.invoice', compact('page_name','order_item','orders', 'package_name', 'total_price', 'main_menu'));
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
