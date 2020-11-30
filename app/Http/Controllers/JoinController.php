<?php

namespace App\Http\Controllers;

use App\Join;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joins = Join::latest()->get();
        return view('backend.alljoinmsg',compact('joins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.addjoinmsg');
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
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:0,1',
            
        ]); 

        $joins = new Join;
        $joins->title = $request->title;
        $joins->description = $request->description;
        $joins->status = $request->status;

        $joins->save();
        Alert::toast('Joining message inserted successfully', 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Join  $join
     * @return \Illuminate\Http\Response
     */
    public function show(Join $join)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Join  $join
     * @return \Illuminate\Http\Response
     */
    public function edit(Join $join,$id)
    {
        $joins = Join::Find($id);
        return view('backend.editjoinmsg',compact('joins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Join  $join
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:0,1',
            
        ]); 

        $joins = Join::Find($id);
        $joins->title = $request->title;
        $joins->description = $request->description;
        $joins->status = $request->status;

        $joins->save();
        Alert::toast('Joining message updated successfully', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Join  $join
     * @return \Illuminate\Http\Response
     */
    public function destroy(Join $join,$id)
    {
        $joins = Join::Find($id);
        $delete = $joins->delete();

        if($delete){
            Alert::warning('Warning', 'Joining slogun  Deleted Successfully');
            return redirect()->back();
        }
    }
}
