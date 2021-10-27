<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagePackageController extends Controller
{
    public function index(){
        $page_name = "Our Packages";
        $package   = package::all()->where('status','=','0');
        return view('pages.package.index', compact('page_name','package'));
    }

    public function show($name)
    {
        // $cvservices = package::all();
        $package = DB::select(DB::raw("SELECT * FROM packages where package_name = '$name'"));
        // $packages = package::all()->where('package_name','=', '$name');
      
        return $package;
        return view('pages.package.show', compact('package'));
    }
}
