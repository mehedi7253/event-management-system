<?php

namespace App\Http\Controllers\Stack;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StackController extends Controller
{
    public function index()
    {
        return view('stakeholder.index');
    }
}
