<?php

namespace App\Http\Controllers;

use App\Social;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SocialController extends Controller
{
    public function index()
    {
        $links = Social::latest()->get();
        return view('backend.allsociallink',compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sociallink');
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
            'facebook' => 'required',
            'twitter' => 'required',
            'linkedin' => 'required',
            
        ]); 

        $socials = new Social;
        $socials->facebook = $request->facebook;
        $socials->twitter = $request->twitter;
        $socials->linkedin = $request->linkedin;

        $socials->save();
        Alert::toast('Social links inserted successfully', 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(Social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit(Social $social,$id)
    {
        $link = Social::Find($id);
        return view('backend.editsociallink',compact('link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $links = Social::Find($id);
        $links->facebook = $request->facebook;
        $links->twitter = $request->twitter;
        $links->linkedin = $request->linkedin;

        $links->save();
        Alert::toast('Social links updated successfully', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social,$id)
    {
        $social = Social::Find($id);
        $delete = $social->delete();

        if($delete){
            Alert::warning('Warning', 'Team Member  Deleted Successfully');
            return redirect()->back();
        }
    }
}
