<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alldata = Category::orderBy('created_at', 'DESC')->get();
        return view('backend.category.view-category',compact('alldata')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create-category');
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
            'name' => 'required|unique:categories|max:25',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->description = $request->description;
        $store = $category->save();
        if($store){
            $notification=array(
                'message'=>'Successfully Create Category',
                'alert-type'=>'success'
            );
            return redirect()->route('category.view')->with($notification);
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editData = Category::find($id);
        return view('backend.category.edit-category',compact('editData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|unique:categories|max:25',
        // ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->description = $request->description;
        $store = $category->save();
        if($store){
            $notification=array(
                'message'=>'Successfully Update Category',
                'alert-type'=>'success'
            );
            return redirect()->route('category.view')->with($notification);
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $del = $category->delete();
        if($del){
            $notification=array(
                'message'=>'Successfully Delete Category',
                'alert-type'=>'success'
            );
            return redirect()->route('category.view')->with($notification);
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
