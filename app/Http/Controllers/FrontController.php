<?php

namespace App\Http\Controllers;
use App\Menu;
use App\Logo;
use App\Body;
use DB;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {

        $logo = DB::table('logos')->
        where('status', 'Active')->get();
        $menu = DB::table('menus')->
        where('menu_status', 'Active')->get();
        $body = DB::table('bodies')->
        where('status', 'Active')->get();
    	return view('frontend.frontMain.frontMain',compact('logo', 'body', 'menu','card1'));
    } 
}
