<?php

namespace App\Http\Controllers;

use App\Fontend;
use App\Copyright;
use App\Menu;
use App\Social;
use App\Team;
use App\Member;
use App\Join;
use Illuminate\Http\Request;

class FontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $copyright =Copyright::where('status',1)->latest()->first();
        $menus =Menu::where('status',1)->latest()->get();
        $socials =Social::latest()->first();
        $slogun =Team::where('status',1)->latest()->first();
        $joins =Join::where('status',1)->latest()->first();
        $members =Member::where('status',1)->latest()->get();
       
        return view('frontend.frontMain.frontMain',compact('copyright','menus','socials','slogun','members','joins'));
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
     * @param  \App\Fontend  $fontend
     * @return \Illuminate\Http\Response
     */
    public function show(Fontend $fontend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fontend  $fontend
     * @return \Illuminate\Http\Response
     */
    public function edit(Fontend $fontend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fontend  $fontend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fontend $fontend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fontend  $fontend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fontend $fontend)
    {
        //
    }
}
