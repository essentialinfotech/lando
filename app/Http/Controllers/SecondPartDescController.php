<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SecondPart;
use Carbon\Carbon;

class SecondPartDescController extends Controller
{
    public function add_sec_description()
    {
    	$all_desc = SecondPart::orderBy('id','asc')->paginate(5);
    	return view('admin.secondpart_desc.index',compact('all_desc'));
    }
    public function add_sec_description_post(Request $request)
    {
    	$request->validate([
	      'first_title'=>'required',
	      'first_paragraph'=>'required',
    	]);

      SecondPart::insert([
        'first_title'=> $request->first_title,
        'first_paragraph'=> $request->first_paragraph,
        'created_at' => Carbon::now(),
      ]);
      return back()->with('success','Add Description Successfully');
    }
    public function sec_desc_active($desc_id)
    {
    	$desc = SecondPart::find($desc_id);
    	if ($desc->status == 0) {
    		SecondPart::find($desc_id)->update([
    			'status' => 1,
    		]);
    	}
    	SecondPart::where('id','!=',$desc_id)->update([
    		'status' => 0,
    	]);
    	return back();
    }
    public function sec_desc_trash($desc_id)
    {
    	SecondPart::find($desc_id)->delete();
        return back()->with('delete','Delete Successfully');
    }
    public function sec_desc_edit($desc_id)
    {
      $desc_edit = SecondPart::find($desc_id);
      return view('admin.secondpart_desc.edit',compact('desc_edit'));
    }
    public function sec_edit_description_post(Request $request)
    {
    	SecondPart::find($request->id)->update([
        'first_title'=>$request->first_title,
        'first_paragraph' => $request->first_paragraph
      ]);
      return back()->with('update_success','Update Successfully');
    }
}
