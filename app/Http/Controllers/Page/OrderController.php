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
        $page_name = 'My Order Details';
        $order_list = cart::find($id);
        $invoice_number = $order_list->invoice_number;

        $order_item = DB::table('carts')
                ->join('packages', 'packages.id', '=', 'carts.package_id')
                ->join('categories', 'categories.id', '=', 'carts.category_id')
                ->join('subcategories', 'subcategories.id', '=', 'carts.sub_category_id')
                ->where('carts.invoice_number', '=', $invoice_number)
                ->get();
        
        return view('pages.package.cart', compact('page_name','order_item'));
        
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
