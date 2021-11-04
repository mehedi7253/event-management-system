<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\package;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Category List";
        $category = category::all();
        return view('admin.ctaegory.index', compact('page_name', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_name = "Create New Category";
        $package = package::all()->where('status', '=', '0');
        return view('admin.ctaegory.create', compact('page_name', 'package'));
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
            'package_id'    => 'required',
            'category_name' => 'required',
            'price'         => 'required',
            'description'   => 'required'
        ],[
            'package_id.required'    => 'Please Select an Package First',
            'category_name.required' => 'Please Enter Catgeory Name',
            'price.requires'         => 'Please Enter Price',
            'description.required'   => 'Please Enter Description' 
        ]);
        $category = new category();
        $category->package_id    = $request->package_id;
        $category->category_name = $request->category_name;
        $category->price         = $request->price;
        $category->description   = $request->description;

        $category->save();
        return back()->with('success', 'New Category Added Successful');
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
        $page_name = "Update Category Data";
        $category = category::find($id);
        return view('admin.ctaegory.edit', compact('page_name','category'));
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
            'category_name' => 'required',
            'price'         => 'required',
            'description'   => 'required'
        ],[
            'package_id.required'     => 'Please Select an Package First',
            'category_name.required'  => 'Please Enter Catgeory Name',
            'price.required'          => 'Please Enter Price',
            'description.required'    => 'Please Enter Description' 
        ]);

        $category = category::find($id);
        $category->category_name = $request->category_name;
        $category->price         = $request->price;
        $category->description   = $request->description;

        $category->save();
        return redirect()->route('categorys.index')->with('success', 'Category Update Successful');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::find($id);
        $category->delete();
        return back()->with('success','Delete Successful');
    }
}
