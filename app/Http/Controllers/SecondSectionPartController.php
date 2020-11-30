<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SecondSectionImage;
use Image;
use Carbon\Carbon;

class SecondSectionPartController extends Controller
{
    public function add_second_image()
    {
    	$all_image = SecondSectionImage::orderBy('id','asc')->paginate(5);
    	return view('admin.secondpart_image.index',compact('all_image'));
    }
    public function second_image_post(Request $request)
    {
    	$add_image = SecondSectionImage::create([
    		'image_number' => $request->image_number,
    		'image_title' => $request->image_title,
    		'created_at' => Carbon::now(),
    	]);
    	$upload_first_photo = $request->file('first_single_image');
    	$new_upload_first_photo_name = $add_image->id.'.'.$upload_first_photo->extension();
    	$new_first_photo_location = base_path('public/uploads/secondpart/image/').$new_upload_first_photo_name;
    	Image::make($upload_first_photo)->resize(540,360)->save($new_first_photo_location);
    	SecondSectionImage::find($add_image->id)->update([
    		'first_single_image' => $new_upload_first_photo_name,
    	]);
    	return back()->with('success','Image Upload Successfully');
    }
    public function second_image_active($image_id)
    {
        $image = SecondSectionImage::find($image_id);
        
        if ($image->status == 0) {
            SecondSectionImage::find($image_id)->update([
                'status' => 1,
            ]);
        } else {
            SecondSectionImage::find($image_id)->update([
                'status' => 0,
            ]);
        }
        
        return back();
    }
     public function second_image_delete($image_id)
    {
        //AddBanner::withTrashed()->where('id',$banner_id)->forceDelete();
        SecondSectionImage::find($image_id)->delete();
        return back()->with('delete','Image Delete Successfully');
    }
    public function second_edit_image($image_id)
    {
        $get_image = SecondSectionImage::find($image_id);
       return view('admin.secondpart_image.edit',compact('get_image'));
    }
    public function second_edit_image_post(Request $request)
    {
        $get_image = SecondSectionImage::find($request->id);
        $request->all();
        if ($request->hasFile('first_single_image')) {
          if ($get_image->first_single_image != 'photo.jpg') {
            $delete_location = base_path('public/uploads/secondpart/image/'.$get_image->first_single_image);
            unlink($delete_location);
          }
          $upload_first_photo = $request->file('first_single_image');
        $new_upload_first_photo_name = $get_image->id.'.'.$upload_first_photo->extension();
        $new_first_photo_location = base_path('public/uploads/secondpart/image/').$new_upload_first_photo_name;
        Image::make($upload_first_photo)->resize(540,360)->save($new_first_photo_location);
          $get_image->first_single_image = $new_upload_first_photo_name;
        }
        $get_image->image_number = $request->image_number;
        $get_image->image_title = $request->image_title;
        $get_image->save();
        return back()->with('success','Image Edit Successfully');
    }
}
