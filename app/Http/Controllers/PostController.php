<?php

namespace App\Http\Controllers;
use App\Post;
use App\Tag;
use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $alldata = Post::orderBy('created_at', 'DESC')->get();
        return view('backend.post.view-post',compact('alldata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['tag'] = Tag::all();
        $data['catagory'] = Category::all();
        return view('backend.post.create-post',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => 'image.jpg',
            'description' => $request->description,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'published_at' => Carbon::now(),
        ]);

        $post->tags()->attach($request->tags);

        if($request->hasFile('image')){
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('upload/posts_photo/', $image_new_name);
            $post->image = $image_new_name;
            $post->save();
        }
        
        $notification=array(
            'message'=>'Successfully Create Post',
            'alert-type'=>'success'
        );
        return redirect()->route('post.view')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alldata = Post::find($id);
        return view('backend.post.show-post',compact('alldata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['edit_data'] = Post::find($id);
        $data['tag'] = Tag::all();
        $data['catagory'] = Category::all();
        return view('backend.post.edit-post',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description;
        $post->category_id = $request->category;

        $post->tags()->sync($request->tags);

        if($request->hasFile('image')){
            $image = $request->image;
            @unlink(public_path('upload/posts_photo/'.$post->image));
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('upload/posts_photo/', $image_new_name);
            $post->image = $image_new_name;
        }

        $post->save();
        $notification=array(
            'message'=>'Successfully update Post',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(file_exists('upload/posts_photo/'.$post->image) AND ! empty($post->image)){
            unlink('upload/posts_photo/'.$post->image);
        }
        $del = $post->delete();
        if($del){
            $notification=array(
                'message'=>'Successfully Delete',
                'alert-type'=>'success'
            );
            return redirect()->route('post.view')->with($notification);
        }    
    }
}
