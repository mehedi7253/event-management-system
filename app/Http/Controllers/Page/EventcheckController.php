<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\event;
use App\Models\orders;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventcheckController extends Controller
{
    public function search(Request $request)
    {
        $event = event::all();
        $search = $request->event_location;
        $date   = $request->booking_date;
        
        $date_format = date('Y-m-d', strtotime($date));

        // return $format;

        $data = DB::table('orders')
            ->where('event_location', 'LIKE', "%" . $search . "%")
            ->where('booking_date', 'LIKE', "%" . $date_format . "%")
            ->get();

        if (count($data)>0){
            return back()->with('error','Date is Booked..Try Another Date');
        }else{
            return back()->with('success','Date Avilable', compact('data'));
        }
        
    }

    public function update(Request $request, $id)
    {
        $orders = orders::find($id);
        $orders->booking_date   = $request->booking_date;
        $orders->event_location = $request->event_location;
        $orders->save();

        return view('pages.package.success');
    }

  
}
