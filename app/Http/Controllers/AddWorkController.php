<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Addwork;
use App\WorkDetails;
use Image;
use Carbon\Carbon;

class AddWorkController extends Controller
{
    public function index()
    {
    	$all_works = Addwork::orderBy('id','asc')->paginate(10);
    	return view('admin.addwork.index',compact('all_works'));
    }
    public function add_work_post(Request $request)
    {
    	$request->validate([
    		'work_title' => 'required',
    		'work_paragraph' => 'required',

    	]);
    	$work_id = Addwork::insertGetId([
          'work_title' => $request->work_title,
          'work_paragraph' => $request->work_paragraph,
          'created_at' => Carbon::now(),
        ]);

        // $uploaded_work_photo = $request->file('work_single_image');
        // $new_work_photo_name = $work_id.'.'.$uploaded_work_photo->extension();
        // $new_work_photo_location = base_path('public/uploads/work/'.$new_work_photo_name);
        // Image::make($uploaded_work_photo)->resize(600,622)->save($new_work_photo_location);

        // Addwork::find($work_id)->update([
        //   'work_single_image' => $new_work_photo_name,
        // ]);

        $all_multiple_image = $request->file('work_multiple_image');
        $flag = 1;
        foreach($all_multiple_image as $single_image)
        {
            $new_work_multiple_photo_name = $work_id.'-'.$flag.'.'.$single_image->extension();
            $new_work_multiple_photo_location = base_path('public/uploads/work/work_details/'.$new_work_multiple_photo_name);
            Image::make($single_image)->resize(540,360)->save($new_work_multiple_photo_location);

            WorkDetails::insert([
              'work_id' => $work_id,
              'work_multiple_image' => $new_work_multiple_photo_name,
              'created_at' => Carbon::now(),
            ]);

            $flag++;

        }
        return back()->with('upload_success','Work Add Successfully');
    }
    public function work_active($work_id)
    {
    	$work = Addwork::find($work_id);
        
        if ($work->status == 0) {
        	$get_image = WorkDetails::where('work_id',$work_id)->update([
        		'status' => 1,
        	]);
            Addwork::find($work_id)->update([
                'status' => 1,
            ]);
        } else {
        	$get_image = WorkDetails::where('work_id',$work_id)->update([
        		'status' => 0,
        	]);
            Addwork::find($work_id)->update([
                'status' => 0,
            ]);
        }
        
        return back();
    }
    public function view_work($work_id)
    {
    	$get_work = Addwork::find($work_id);
    	$get_image = WorkDetails::where('work_id',$work_id)->get();
    	return view('admin.addwork.view',compact('get_work','get_image'));
    }
    public function delete_work($work_id)
    {
    	Addwork::withTrashed()->where('id',$work_id)->forceDelete();
        return back()->with('forcedelete_success','Delete Successfully');
    }
}
