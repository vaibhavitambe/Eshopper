<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Cms;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$cmsPages = Cms::get();
        return view('cms.index')->with(compact('cmsPages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
        if($request->isMethod('post'))
        {
        	$data = $request->all();
        	$cmsPages = new Cms;
        	$cmsPages->title = $data['title'];
        	$cmsPages->content = $data['content'];
        	$cmsPages->meta_title = $data['metatitle'];
        	$cmsPages->meta_description = $data['metades'];
        	$cmsPages->meta_keywords = $data['metakey'];
        	$cmsPages->save();

      
        	return redirect()->route('cms.index')->with('flash_message_success','Cms page has been added successfully');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$cmsPage = Cms::where('id',$id)->first();
     	return view('cms.edit')->with(compact('cmsPage'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Cms::find($id)->update($request->all());
        return redirect()->route('cms.index')->with('flash_message_success','Cms Page updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cms::find($id)->delete();  
        return redirect()->route('cms.index')->with('flash_message_success','User deleted successfully');
    }

}
