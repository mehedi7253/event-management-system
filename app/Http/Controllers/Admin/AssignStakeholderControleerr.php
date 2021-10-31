<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\assignstackholder;
use App\Models\orders;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignStakeholderControleerr extends Controller
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = "Assign Stake Holder";
        $stakeholders = User::all()->where('role_id','=','3');
        $order = orders::find($id);
       
        $deactive = DB::table('assignstackholders')
                ->join('users','users.id', '=', 'assignstackholders.stackholder_id')
                ->where('assignstackholders.process', '=', '1')
                ->get();
        
        return view('admin.orders.assignworker', compact('page_name','stakeholders','order','deactive'));

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
        $this->validate($request,[
            'comission'      => 'required',
            'stackholder_id' => 'required'
        ],[
            'comission.required' => 'Please Enter Comission Amount'
        ]);

        $assign = new assignstackholder();
        $assign->order_id       = $id;
        $assign->stackholder_id = $request->stackholder_id;
        $assign->comission      = $request->comission;
        $assign->process        = 0;

        $update = orders::find($id);
        $update->process = '2';
        $update->save();
        $assign->save();
        return back()->with('success','Stakeholder Assigned Successful');
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
