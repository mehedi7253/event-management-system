<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminchatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Chat List";
        $msg_list  = DB::table('chats')
                    ->join('users','users.id','=','chats.sender_id')
                    ->select('users.name as UserName', 'users.id as UserID','chats.id','chats.sender_id','chats.rechiver_id','chats.status')
                    ->groupBy('chats.sender_id')
                    ->get();
        // return $msg_list;
        return view('admin.chat.index', compact('page_name','msg_list'));
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
        $page_name = "Chat Box";
        $users = User::find($id);
        $msgs   = chat::all();
        return view('admin.chat.message', compact('page_name','users','msgs'));
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
        $this->validate($request, [
            'message'   => 'required'
        ],[
            'message.required' => 'Message Not Empty'
        ]);
        
        $msg = new chat();
        $msg->sender_id   = Auth::user()->id;
        $msg->rechiver_id = $id;
        $msg->message     = $request->message;
        $msg->status      = 0;

        $msg->save();
        return back();
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
