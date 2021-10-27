<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
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
        $page_name = "Add Sub Category";
        $categories = category::find($id);
        $sub_categorie = subcategory::all()->where('category_id','=',$id);
        return view('admin.subcategory.create', compact('page_name','categories','sub_categorie'));
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
            'name'  => 'required',
            'price' => 'required',
        ],[
            'name.required'  => 'Please Enter Sub Category Name',
            'price.required' => 'Please Enter Price'
        ]);

        $sub_category = new subcategory();
        $sub_category->name        = $request->name;
        $sub_category->price       = $request->price;
        $sub_category->category_id = $id;
        $sub_category->package_id  = $request->package_id;
        $sub_category->save();
        return back()->with('success','New sub Category Added Successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sub_categories = subcategory::find($id);
        $sub_categories->delete();
        return back()->with('success','Sub Category Delete Successful');
    }
}
