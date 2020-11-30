<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Body;
use DB;

class Section1Controller extends Controller
{
    public function index()
    {

        $section1 = DB::table('bodies')->
        where('status', 'Active')->get();
    	return view('frontend.frontMain.frontMain',compact('section1'));
    } 
}
