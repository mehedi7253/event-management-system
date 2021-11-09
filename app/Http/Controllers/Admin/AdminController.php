<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $today = @date('Y-m-d');
        $month = date('m');

        // $new_work = DB::table('orders')->where()->count();
        $monthly_earn = DB::table('orders')
                ->whereMonth('created_at', '=', $month)
                ->sum('amount');

        $neworder = DB::table('orders')
                ->where('process','=', '0')
                ->count();
                
        $orders = orders::select("id","created_at" , DB::raw("(sum(amount)) as Total"), DB::raw("(DATE_FORMAT(created_at, '%d')) as day"))
                ->orderBy('created_at')
                ->groupBy(DB::raw("DATE_FORMAT(created_at, '%d')"))
                ->whereMonth('created_at', '=', $month)
                ->get();

            
        $members = User::all()->where('role_id','=','2')->count();

        $stakeholders = User::all()->where('role_id','=','3')->count();

        return view('admin.index', compact('monthly_earn','members','stakeholders','neworder','orders'));
    }
}
