<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FirstSectionDesc;
use Carbon\Carbon;

class FirstPartDesController extends Controller
{
    public function add_description()
    {
    	$all_desc = FirstSectionDesc::orderBy('id','asc')->paginate(5);
    	return view('admin.firstpart_desc.index',compact('all_desc'));
    }
    public function add_description_post(Request $request)
    {
    	$request->validate([
	      'first_title'=>'required',
	      'first_paragraph'=>'required',
    	]);

      FirstSectionDesc::insert([
        'first_title'=> $request->first_title,
        'first_paragraph'=> $request->first_paragraph,
        'created_at' => Carbon::now(),
      ]);
      return back()->with('success','Add Description Successfully');
    }
    public function desc_active($desc_id)
    {
    	$desc = FirstSectionDesc::find($desc_id);
    	if ($desc->status == 0) {
    		FirstSectionDesc::find($desc_id)->update([
    			'status' => 1,
    		]);
    	}
    	FirstSectionDesc::where('id','!=',$desc_id)->update([
    		'status' => 0,
    	]);
    	return back();
    }
    public function desc_trash($desc_id)
    {
    	
    	FirstSectionDesc::find($desc_id)->delete();
        return back()->with('delete','Delete Successfully');
    }
    public function desc_edit($desc_id)
    {
      $desc_edit = FirstSectionDesc::find($desc_id);
      return view('admin.firstpart_desc.edit',compact('desc_edit'));
    }
    public function edit_description_post(Request $request)
    {
    	FirstSectionDesc::find($request->id)->update([
        'first_title'=>$request->first_title,
        'first_paragraph' => $request->first_paragraph
      ]);
      return back()->with('update_success','Update Successfully');
    }
}
