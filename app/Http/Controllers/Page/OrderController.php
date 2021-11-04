<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
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
        $order = new orders();
        $order->name           = $request->name;
        $order->email          = $request->email;
        $order->phone          = $request->phone;
        $order->address        = $request->address;
        $order->invoice_number = $request->invoice_number;
        $order->amount         = $request->amount;
        $order->process        = 0;

        $order->save();
        return $order;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_name = 'My Order Details';
        $order_list = cart::find($id);
        $invoice_number = $order_list->invoice_number;
        $package = DB::select(DB::raw("SELECT carts.package_id, carts.invoice_number, packages.id, packages.package_name FROM carts, packages WHERE carts.invoice_number = $invoice_number GROUP By carts.package_id"));

        $sub_cat = DB::table('carts')
                ->join('subcategories', 'subcategories.id', '=', 'carts.sub_category_id')
                ->where('carts.invoice_number','=', $invoice_number)
                ->get();

        $main_cat = DB::table('carts')
                ->join('categories', 'categories.id', '=', 'carts.category_id')
                ->where('carts.invoice_number','=', $invoice_number)
                ->groupBy('carts.category_id')
                ->get();
      
        foreach ($main_cat as $main_price){
           $main_cat_price = $main_price->price;
        } 

        $total_price = $main_cat_price;
        foreach ($sub_cat as $order){
            $total_price    += $order->price;
        } 
        
        return view('pages.package.cart', compact('page_name','package','sub_cat','main_cat','total_price','invoice_number','main_cat_price'));        
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
