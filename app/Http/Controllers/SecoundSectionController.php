<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SecondWork;
use App\SecondWorkDetails;
use Image;
use Carbon\Carbon;

class SecoundSectionController extends Controller
{
    public function index()
    {
    	$all_second_works = SecondWork::orderBy('id','asc')->paginate(10);
    	return view('admin.second_section.index',compact('all_second_works'));
    }
    public function second_work_post(Request $request)
    {
    	$request->validate([
    		'sec_work_title' => 'required',
    		'sec_work_paragraph' => 'required',
    		'sec_work_multiple_image' => 'required|max:4|min:4',

    	]);
    	$sec_work_id = SecondWork::insertGetId([
          'sec_work_title' => $request->sec_work_title,
          'sec_work_paragraph' => $request->sec_work_paragraph,
          'created_at' => Carbon::now(),
        ]);

        $all_multiple_image = $request->file('sec_work_multiple_image');
        $flag = 1;
        foreach($all_multiple_image as $single_image)
        {
            $new_work_multiple_photo_name = $sec_work_id.'-'.$flag.'.'.$single_image->extension();
            $new_work_multiple_photo_location = base_path('public/uploads/secondSection/second_work_details/'.$new_work_multiple_photo_name);
            Image::make($single_image)->resize(540,360)->save($new_work_multiple_photo_location);

            SecondWorkDetails::insert([
              'sec_work_id' => $sec_work_id,
              'sec_work_multiple_image' => $new_work_multiple_photo_name,
              'created_at' => Carbon::now(),
            ]);

            $flag++;

        }
        return back()->with('upload_success','Work Add Successfully');
    }

    public function sec_work_active($sec_work_id)
    {
    	$sec_work = SecondWork::find($sec_work_id);
        
        if ($sec_work->status == 0) {
        	$get_image = SecondWorkDetails::where('sec_work_id',$sec_work_id)->update([
        		'status' => 1,
        	]);
            SecondWork::find($sec_work_id)->update([
                'status' => 1,
            ]);
        } else {
        	$get_image = SecondWorkDetails::where('sec_work_id',$sec_work_id)->update([
        		'status' => 0,
        	]);
            SecondWork::find($sec_work_id)->update([
                'status' => 0,
            ]);
        }
        return back();
    }
    public function sec_view_work($sec_work_id)
    {
    	$get_work = SecondWork::find($sec_work_id);
    	$get_image = SecondWorkDetails::where('sec_work_id',$sec_work_id)->get();
    	return view('admin.second_section.seccond_view',compact('get_work','get_image'));
    }
    public function delete_work($sec_work_id)
    {
    	SecondWork::withTrashed()->where('id',$sec_work_id)->forceDelete();
        return back()->with('forcedelete_success','Delete Successfully');
    }
}
