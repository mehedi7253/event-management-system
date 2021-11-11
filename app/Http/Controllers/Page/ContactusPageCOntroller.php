<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\contacus;
use Illuminate\Http\Request;

class ContactusPageCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Fell Free To Send Message";
        return view('pages.contact.index', compact('page_name'));
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
        $this->validate($request,[
            'name'    => 'required',
            'email'   => 'required',
            'phone'   => 'required',
            'message' => 'required'
        ],[
            'name.required'    => 'Please Enter Your Name',
            'email.required'   => 'please Enter Your Email',
            'phone.required'   => 'Please Enter Phone Number',
            'message.required' => 'Please Enter Your Message'
        ]);

        $msg = new contacus();
        $msg->name    = $request->name;
        $msg->email   = $request->email;
        $msg->phone   = $request->phone;
        $msg->message = $request->message;
        $msg->save();
        return back()->with('success','Message Sent Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
