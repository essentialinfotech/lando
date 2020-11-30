<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::latest()->get();
        return view('backend.allmember',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.teammembers');
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
           
            'name' => 'required',
            'position' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:20000',
            'status' => 'required|in:0,1',
            
        ]); 

        $members = new Member;
        $members->name = $request->name;
        $members->position = $request->position;
        $members->status = $request->status;

        $image = $request->file('image');
   

        if($request->hasFile('image')){
            $members->image = $this->storeImage($image);

            // if($request->oldlogo != null){
            //     unlink($request->oldlogo);
            // }
        }

        $members->save();
        Alert::toast('Team Member inserted successfully', 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member,$id)
    {
        $member = Member::Find($id);
        return view('backend.editmember',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        // $this->validate($request,[
           
        //     'name' => 'required',
        //     'position' => 'required',
            
            
        // ]);


        $members = Member::Find($id);
        $members->name = $request->name;
        $members->position = $request->position;
        $members->status = $request->status;
        $image = $request->file('image');
   

        if($request->hasFile('image')){
            $members->image = $this->storeImage($image);

            if($request->oldimg != null){
                unlink($request->oldimg);
            }

            $members->save();
            Alert::toast('Team Member updated successfully', 'success');
            return redirect()->back();
        }else{
            $members->image = $request->oldimg;

            $members->save();
            Alert::toast('Team Member updated successfully', 'success');

             return redirect()->back();
        }

        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member,$id)
    {
        $member = Member::Find($id);
        $delete = $member->delete();

        if($delete){
            Alert::warning('Warning', 'Team Member  Deleted Successfully');
            return redirect()->back();
        }
      

    }

    public function storeImage($file)
    {
        $extention = strtolower($file->getClientOriginalExtension());
        $filename = time().'.'.$extention;
        $imgpath =$imgpath ='uploads/member/';
        $imgurl= $imgpath.$filename;
        $success=  $file->move($imgpath,$filename);

        return $imgurl;
       

    }
}
