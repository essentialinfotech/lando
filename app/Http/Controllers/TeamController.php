<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TeamController extends Controller
{
    public function index()
    {
        $sloguns = Team::latest()->get();
        return view('backend.alltitles',compact('sloguns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.teamtitle');
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

        $teams = new Team;
        $teams->title = $request->title;
        $teams->description = $request->description;
        $teams->status = $request->status;

        $teams->save();
        Alert::toast('Information inserted successfully', 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team,$id)
    {
        $titles = Team::Find($id);
        return view('backend.edittitle',compact('titles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:0,1',
            
        ]); 
        $titles = Team::Find($id);
        $titles->title = $request->title;
        $titles->description = $request->description;
        $titles->status = $request->status;

        $titles->save();
        Alert::toast('Information Updated successfully', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team,$id)
    {
        $teams = Team::Find($id);
        $delete = $teams->delete();

        if($delete){
            Alert::warning('Warning', 'Team slogun  Deleted Successfully');
            return redirect()->back();
        }
    }
}
