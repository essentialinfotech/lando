<?php

namespace App\Http\Controllers;

use App\Copyright;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CopyrightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $copyrights = Copyright::all();
        return view('backend.showcopyright',compact('copyrights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.copyright');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'copyright' => 'required',
            'status' => 'required|in:0,1',
           
            
        ]); 

        $copyright = new Copyright;
        $copyright->copyright = $request->copyright;
        $copyright->status = $request->status;
       
        $copyright->save();
        Alert::toast('copyright inserted successfully', 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Copyright  $copyright
     * @return \Illuminate\Http\Response
     */
    public function show(Copyright $copyright)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Copyright  $copyright
     * @return \Illuminate\Http\Response
     */
    public function edit(Copyright $copyright,$id)
    {
        $copyright = Copyright::Find($id);
        return view('backend.editcopyright',compact('copyright'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Copyright  $copyright
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'copyright' => 'required',
            'status' => 'required|in:0,1',
           
            
        ]); 
        $copyright = Copyright::Find($id);
        $copyright->copyright = $request->copyright;
        $copyright->status = $request->status;

        $copyright->save();
        Alert::toast('copyright updated successfully', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Copyright  $copyright
     * @return \Illuminate\Http\Response
     */
    public function destroy(Copyright $copyright,$id)
    {
        $copyright = Copyright::Find($id);
        $delete = $copyright->delete();

        if($delete){
            Alert::warning('Warning', 'copyright  Deleted Successfully');
            return redirect()->back();
        }
    }
}
