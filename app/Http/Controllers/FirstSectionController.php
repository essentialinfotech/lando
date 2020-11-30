<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FirstSectionImage;
use Image;
use Carbon\Carbon;

class FirstSectionController extends Controller
{
    public function add_first_image()
    {
    	$all_image = FirstSectionImage::orderBy('id','asc')->paginate(5);
    	return view('admin.firstpart_image.index',compact('all_image'));
    }

    public function first_image_post(Request $request)
    {
    	$add_image = FirstSectionImage::create([
    		'image_number' => $request->image_number,
    		'image_title' => $request->image_title,
    		'created_at' => Carbon::now(),
    	]);
    	$upload_first_photo = $request->file('first_single_image');
    	$new_upload_first_photo_name = $add_image->id.'.'.$upload_first_photo->extension();
    	$new_first_photo_location = base_path('public/uploads/firstpart/image/').$new_upload_first_photo_name;
    	Image::make($upload_first_photo)->resize(540,360)->save($new_first_photo_location);
    	FirstSectionImage::find($add_image->id)->update([
    		'first_single_image' => $new_upload_first_photo_name,
    	]);
    	return back()->with('success','Image Upload Successfully');
    }

    public function image_active($image_id)
    {
        $image = FirstSectionImage::find($image_id);
        
        if ($image->status == 0) {
            FirstSectionImage::find($image_id)->update([
                'status' => 1,
            ]);
        } else {
            FirstSectionImage::find($image_id)->update([
                'status' => 0,
            ]);
        }
        
        return back();
    }

    public function image_delete($image_id)
    {
        //AddBanner::withTrashed()->where('id',$banner_id)->forceDelete();
        FirstSectionImage::find($image_id)->delete();
        return back()->with('delete','Image Delete Successfully');
    }

    public function edit_image($image_id)
    {
        $get_image = FirstSectionImage::find($image_id);
       return view('admin.firstpart_image.edit',compact('get_image'));
    }
    public function edit_image_post(Request $request)
    {
        $get_image = FirstSectionImage::find($request->id);
        $request->all();
        if ($request->hasFile('first_single_image')) {
          if ($get_image->first_single_image != 'photo.jpg') {
            $delete_location = base_path('public/uploads/firstpart/image/'.$get_image->first_single_image);
            unlink($delete_location);
          }
          $upload_first_photo = $request->file('first_single_image');
        $new_upload_first_photo_name = $get_image->id.'.'.$upload_first_photo->extension();
        $new_first_photo_location = base_path('public/uploads/firstpart/image/').$new_upload_first_photo_name;
        Image::make($upload_first_photo)->resize(540,360)->save($new_first_photo_location);
          $get_image->first_single_image = $new_upload_first_photo_name;
        }
        $get_image->image_number = $request->image_number;
        $get_image->image_title = $request->image_title;
        $get_image->save();
        return back()->with('success','Image Edit Successfully');
    }

}
