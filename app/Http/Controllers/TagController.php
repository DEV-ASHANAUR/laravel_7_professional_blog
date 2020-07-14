<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alldata = Tag::orderBy('created_at', 'DESC')->get();
        return view('backend.tag.view-tag',compact('alldata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tag.create-tag');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:tags|max:25',
        ]);
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name, '-');
        $tag->description = $request->description;
        $store = $tag->save();
        if($store){
            $notification=array(
                'message'=>'Successfully Create Tag',
                'alert-type'=>'success'
            );
            return redirect()->route('tag.view')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            //return Redirect()->back()->with($notification);
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editData = Tag::find($id);
        return view('backend.tag.edit-tag',compact('editData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|unique:tags|max:25',
        // ]);
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name, '-');
        $tag->description = $request->description;
        $tag = $tag->save();
        if($tag){
            $notification=array(
                'message'=>'Successfully Update Tag',
                'alert-type'=>'success'
            );
            return redirect()->route('tag.view')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            //return Redirect()->back()->with($notification);
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $del = $tag->delete();
        if($del){
            $notification=array(
                'message'=>'Successfully Delete Tag',
                'alert-type'=>'success'
            );
            return redirect()->route('tag.view')->with($notification);
        }else{
            $notification=array(
                'message'=>'Something went worng!',
                'alert-type'=>'error'
            );
            //return Redirect()->back()->with($notification);
            return redirect()->back()->with($notification);
        }
    }
}
