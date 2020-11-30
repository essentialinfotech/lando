<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        
    	return view('backend.master');
    }  

    public function store(Request $request)
    {
        $data=array();
        $data['email']=$request->name;
        DB::table('users')->insert($data);     
        return redirect()->back();
    }
}
