<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.master');
    }

    
    // public function teamtitle()
    // {
    //     return view('backend.teamtitle');
    // }
    // public function social()
    // {
    //     return view('backend.sociallink');
    // }
 
   
}