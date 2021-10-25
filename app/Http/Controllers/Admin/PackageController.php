<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Manage Packaes";
        $packages = Package::all();
        return view('admin.packages.index', compact('page_name','packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Create New Packaes";
        return view('admin.packages.create', compact('page_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'package_name' => 'required | regex:/^[a-zA-Z-.\s]+$/',
            'price'        => 'required | regex:/^[-0-9\+]+$/',
            'description'  => 'required',
            'image'        => 'required | mimes:jpg,png,jpeg|max:7048',
            'status'       => 'required'
        ],[
            'package_name.required'  => "please Enter Package Name",
            'package_name.regex'     => "Please Enter Only Character Value",
            'price.required'         => "please Enter Price",
            'price.regex'            => "Please Enter Only Numaric Value",
            'description.required'   => "Please Enter Description",
            'image.required'         => 'Please Select An Image',
            'image.mimes'            => 'Please Select Jpg,png,jpeg Type',
            'image.max'              => 'Please Select Image Less Then 8 Mb',
            'status.required'        => 'Please Select One'
        ]);

        $package = new package();
        $package->package_name  = $request->package_name;
        $package->price         = $request->price;
        $package->description   = $request->description;
        $package->status        = $request->status;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('package/images/', $fileName);
            $package->image = $fileName;
        } else {
            return $request;
            $package->image = '';
        }

        $package->save();
        return back()->with('success','New Package Added Successful');
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
        $page_name = "Update Package Data";
        $package = package::find($id);
        return view('admin.packages.edit', compact('package_name', 'package'));
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
            'package_name' => 'required | regex:/^[a-zA-Z-.\s]+$/',
            'price'        => 'required | regex:/^[-0-9\+]+$/',
            'description'  => 'required',
            'image'        => 'mimes:jpg,png,jpeg|max:7048',
            'status'       => 'required'
        ],[
            'package_name.required'  => "please Enter Package Name",
            'package_name.regex'     => "Please Enter Only Character Value",
            'price.required'         => "please Enter Price",
            'price.regex'            => "Please Enter Only Numaric Value",
            'description.required'   => "Please Enter Description",
            'image.mimes'            => 'Please Select Jpg,png,jpeg Type',
            'image.max'              => 'Please Select Image Less Then 8 Mb',
            'status.required'        => 'Please Select One'
        ]);

        $package = package::find($id);
        $package->package_name  = $request->package_name;
        $package->price         = $request->price;
        $package->description   = $request->description;
        $package->status        = $request->status;

        if($request->image == ''){
            // $office->update($request->all());
            // $office->save();
        }else{
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $file->move('package/images/', $fileName);
                $package->image = $fileName;
            } else {
                return $request;
                $package->image = '';
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = package::find($id);
        $package->delete();
        return back()->with('success','Package Deleted Successful');
    }
}
