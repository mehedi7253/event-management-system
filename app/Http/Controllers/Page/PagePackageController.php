<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagePackageController extends Controller
{
    public function index(){
        $page_name = "Our Packages";
        $package   = package::all()->where('status','=','0');
        return view('pages.package.index', compact('page_name','package'));
    }

    public function show($name)
    {
        $package = DB::table('packages')
                ->where('package_name','=', $name)
                ->get();
        
        foreach($package as $packages){
            $package_id = $packages->id;
        }
    
        $main_menu = DB::table('categories')
                ->where('package_id','=',$package_id)
                ->get();

       return view('pages.package.show', compact('package', 'main_menu'));
    }

    public function AddToCart(Request $request)
    {
        $this->validate($request,[
            'sub_category_id'
        ]);
        $invoice = rand(100,1000000);
        foreach ($request->sub_category_id as $i => $package) 
        {
            $cart = new cart();
            $cart->package_id      = $request->package_id;
            $cart->category_id     = $request->category_id;
            $cart->sub_category_id = $request->sub_category_id [$i];
            $cart->invoice_number  = $invoice;
            $cart->save();
        }
         $cart_id = $cart->id;
        return redirect()->route('orders.show',[$cart_id]);

    }
}
