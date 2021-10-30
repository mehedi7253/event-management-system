<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StackeholderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Stake Holder List";
        $stakeholders = User::all()->where('role_id','=','3');
        return view('admin.stackeholder.index', compact('page_name','stakeholders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Add New Stake Holder";
        return view('admin.stackeholder.create', compact('page_name'));
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
            'name'     => ['required', 'string', 'max:255','regex:/^[a-zA-Z-.\s]+$/'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'    => ['required', 'string', 'min:11', 'max:11','regex:/^[-0-9\+]+$/'],
            'gender'   => ['string', 'max:255'],
            'address'  => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ],[
            'name.required'      => "please Enter Name",
            'name.regex'         => "Please Enter Only Character Value",
            'email.required'     => "Please Enter Email Address",
            'email.unique'       => "This Email Already Registered",
            'phone.required'     => "please Enter Phone Number",
            'phone.min'          => "Phone Number Must Be 11 Digit",
            'phone.max'          => "Phone Number Must Be 11 Digit",
            'phone.regex'        => "Phone Number Must Be 11 Digit Long Numeric Value",
            'gender.required'    => "Please Select One",
            'address.required'   => "please Enter address",
        ]);

        $user = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->phone    = $request->phone;
        $user->address  = $request->address;
        $user->gender   = $request->gender;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success','New StakeHolder Added Successful');

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
