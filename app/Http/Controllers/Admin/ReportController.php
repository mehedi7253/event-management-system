<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\assignstackholder;
use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $page_name = "Monthly Report";
        $orders = orders::all();
        return view('admin.report.index', compact('page_name', 'orders'));
    }

    public function search(Request $request)
    {
        $page_name = "Monthly Report";
        $search = $request->get('search');
        $data = DB::table('orders')
            ->whereMonth('created_at','=', $search)
            ->get();
        if(count($data)>0)
        {
            $total = DB::table('orders')
                ->whereMonth('created_at', '=', $search)
                ->sum('amount');
        }else{
            $total = 0;
        }
        return view('admin.report.index', compact('data', 'page_name', 'total'));
    }

    public function stakeholderpayment()
    {
        $page_name = $page_name = "Monthly Report Stake holder payment";
        $payment = assignstackholder::all();
        return view('admin.report.cost', compact('page_name','payment'));
    }

    public function costsearch(Request $request)
    {
        $page_name = "Monthly Report Stake holder payment";
        $search = $request->get('search');
        $data = DB::table('assignstackholders')
            ->whereMonth('pay_date','=', $search)
            ->join('users','users.id','=','assignstackholders.stackholder_id')
            ->join('orders','orders.id', '=', 'assignstackholders.order_id')
            ->select('users.name as StakeholderName', 'orders.id as orderID','orders.amount as orderAmount','assignstackholders.comission','assignstackholders.pay_date','assignstackholders.given_amount')
            ->get();

            // return $data;
        if(count($data)>0)
        {
            $total = DB::table('assignstackholders')
                ->whereMonth('pay_date', '=', $search)
                ->sum('given_amount');
        }else{
            $total = 0;
        }
        return view('admin.report.cost', compact('data', 'page_name', 'total'));
    }


}
