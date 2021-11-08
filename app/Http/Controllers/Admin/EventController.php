<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Event list";
        $event     = event::all();
        return view('admin.event.index', compact('page_name','event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Create New Event";
        return view('admin.event.create', compact('page_name'));
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
            'event_name'  => 'required',
            'location'    => 'required',
            'description' => 'required',
            'image'       => 'required | mimes:jpg,png,jpeg|max:7048',
            'status'      => 'required'
        ],[
            'event_name.required'    => 'Please Enter Event Name',
            'location.requires'      => 'Please Enter Location',
            'description.required'   => 'Please Enter Description',
            'image.required'         => 'Please Select an Image',
            'image.mimes'            => 'Please Select Jpg,png,jpeg Type',
            'image.max'              => 'Please Select Image Less Then 8 Mb',
            'status.required'        => 'Please Select One'
        ]);

        $event = new event();
        $event->event_name   = $request->event_name;
        $event->location     = $request->location;
        $event->description  = $request->description;
        $event->status       = $request->status;

        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('event/images/', $fileName);
            $event->image = $fileName;
        } else {
            return $request;
            $event->image = '';
        }

        $event->save();
        return back()->with('success', 'Event Create Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page_name = "Event Details";
        $event = event::find($id);
        return view('admin.event.show', compact('page_name','event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_name = "Update Event Data";
        $event = event::find($id);
        return view('admin.event.edit', compact('page_name','event'));
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
            'event_name'  => 'required',
            'location'    => 'required',
            'description' => 'required',
            'image'       => 'mimes:jpg,png,jpeg|max:7048',
            'status'       => 'required'
        ],[
            'event_name.required'    => 'Please Enter Event Name',
            'location.requires'      => 'Please Enter Location',
            'description.required'   => 'Please Enter Description',
            'image.mimes'            => 'Please Select Jpg,png,jpeg Type',
            'image.max'              => 'Please Select Image Less Then 8 Mb',
            'status.required'        => 'Please Select One'
        ]);

        $event = event::find($id);
        $event->event_name   = $request->event_name;
        $event->location     = $request->location;
        $event->status       = $request->status;
        $event->description  = $request->description;

        if($request->image == ''){
            // $office->update($request->all());
            // $office->save();
        }else{
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $file->move('event/images/', $fileName);
                $event->image = $fileName;
            } else {
                return $request;
                $event->image = '';
            }
        }
        $event->save();
        return back()->with('success', 'Event Data Update Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = event::find($id);
        $event->delete();
        return back()->with('success', 'Event Data Delete Successful');
    }
}
