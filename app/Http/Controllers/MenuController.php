<?php

namespace App\Http\Controllers;
use App\Menu;
use DB;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        
        $menu = DB::table('menus')->get();
    	return view('backend.menu',compact('menu'));
    }


    public function store(Request $request)
    {
        $data=array();
        $data['name']=$request->name;
        $data['link']=$request->link;
        $data['menu_status']=$request->menu_status;
        DB::table('menus')->insert($data);     
        return redirect()->back();
    }


    public function destroy($id)
    {
        $menu =Menu::where('id',$id)->first();
        $menu->delete();
        return redirect()->back();                   
    }

    public function update(Request $request , $id)
    {  
        $menu=Menu::find($request->id);
        $menu->name=$request->name;
        $menu->link=$request->link;
        $menu->menu_status=$request->menu_status;
        $menu->save();
        return redirect()->back();
    }
}
