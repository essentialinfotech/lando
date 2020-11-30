<?php

namespace App\Http\Controllers;

use DB;
use App\Body;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BodyController extends Controller
{
    public function index()
    {   
        $body = DB::table('bodies')->get();
    	return view('backend.first_section',compact('body'));
    }

    public function store(Request $request)
    {
        $request->validate([
        	'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

     if ($request->hasFile('image')) {
            // uploading image
        $postImage = $request->file('image');
        $imageName = $postImage->getClientOriginalName();
        $directory = 'public/image/imageSection/';
        $imgUrl = $directory.$imageName;
        $postImage->move($directory, $imageName);
            // data sent to database
        $data=array();
        $data['image']=$imgUrl;
        $data['heading']=$request->heading;
        $data['para1']=$request->para1;
        $data['para2']=$request->para2;
        $data['para3']=$request->para3;
        $data['card_title']=$request->card_title;
        $data['card_amount']=$request->card_amount;
        $data['status']=$request->status;
        DB::table('bodies')->insert($data);
        return redirect()->back();
        }
        $data=array();
        $data['heading']=$request->heading;
        $data['para1']=$request->para1;
        $data['para2']=$request->para2;
        $data['para3']=$request->para3;
        $data['card_title']=$request->card_title;
        $data['card_amount']=$request->card_amount;
        $data['status']=$request->status;
        DB::table('bodies')->insert($data);
        return redirect()->back(); 
        
    }


    public function destroy($id)
    {
        $body =Body::where('id',$id)->first();
        $body->delete();
        return redirect()->back();                   
    }

    public function update(Request $request , $id)
    {  
        $body=Body::find($request->id);
        $data['heading']=$request->heading;
        $data['para1']=$request->para1;
        $data['para2']=$request->para2;
        $data['para3']=$request->para3;
        $data['card_amount']=$request->status;
        $data['card_title']=$request->para3;
        $data['status']=$request->status;
        $body->save();
        return redirect()->back();
    }
}
