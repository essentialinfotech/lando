<?php

namespace App\Http\Controllers;
use App\Logo;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LogoController extends Controller
{
    public function index()
    {   
        $logo = DB::table('logos')->get();
    	return view('backend.logo',compact('logo'));
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
        $directory = 'public/image/imageLogo/';
        $imgUrl = $directory.$imageName;
        $postImage->move($directory, $imageName);
            // data sent to database
        $data=array();
        $data['image']=$imgUrl;
        $data['status']=$request->status;
        DB::table('logos')->insert($data);
        return redirect()->back();
        }
        $data=array();
        $data['status']=$request->status;
        DB::table('logos')->insert($data);
        return redirect()->back(); 
        
    }


    public function destroy($id)
    {
        $logo =Logo::where('id',$id)->first();
        $logo->delete();
        return redirect()->back();                   
    }

    public function update(Request $request , $id)
    {  
        $logo=Logo::find($request->id);
        $logo->status=$request->status;
        $logo->save();
        return redirect()->back(); 
    }

}
