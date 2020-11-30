<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::latest()->get();
        return view('backend.allmenu',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.addmenu');
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
            'name' => 'required|unique:menus,name',
            'status' => 'required|in:0,1',
           
            
        ]); 

        $menus = new Menu;
        $menus->name = $request->name;
        $menus->status = $request->status;
       
        $menus->save();
        Alert::toast('Menus inserted successfully', 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu,$id)
    {
        $menu = Menu::Find($id);
        return view('backend.editmenu',compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'status' => 'required|in:0,1',
           
            
        ]); 

        $menus = Menu::Find($id);
        $menus->name = $request->name;
        $menus->status = $request->status;
       
        $menus->save();
        Alert::toast('Menus updated successfully', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu,$id)
    {
        $menu = Menu::Find($id);
        $delete = $menu->delete();

        if($delete){
            Alert::warning('Warning', 'menu  Deleted Successfully');
            return redirect()->back();
        }
    }
}
