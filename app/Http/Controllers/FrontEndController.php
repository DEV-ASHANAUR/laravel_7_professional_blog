<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\Setting;
use App\User;
use App\Contact;
class FrontEndController extends Controller
{
    public function __construct()
    {
        $category = Category::take(5)->get();
        view()->share('category', $category);

        $setting = Setting::first();
        view()->share('setting', $setting);
    }
    public function home()
    {
        $posts = Post::with('category','user')->orderBy('created_at','DESC')->take(5)->get();
        $firstpost = $posts->splice(0,2);
        $middlepost = $posts->splice(0,1);
        $lastpost = $posts->splice(0);

        $footerPosts = Post::with('category', 'user')->inRandomOrder()->limit(4)->get();
        $firstFooterPost = $footerPosts->splice(0, 1);
        $firstfooterPosts2 = $footerPosts->splice(0, 2);
        $lastFooterPost = $footerPosts->splice(0, 1);

        $recentPosts = Post::with('category','user')->orderBy('created_at','DESC')->paginate(9);
        return view('website.home',compact(['posts','recentPosts','firstpost','middlepost','lastpost','firstFooterPost','firstfooterPosts2','lastFooterPost']));
    }
    public function about()
    {
        $User = User::first();
        return view('website.about',compact('User'));
    }
    public function singlepost($slug,$id)
    {
        $post = Post::with('category','user')->where('slug',$slug)->where('id',$id)->first();
        $popular = Post::with('category', 'user')->inRandomOrder()->limit(3)->get();
        // More related posts
        $relatedPosts = Post::orderBy('category_id', 'desc')->inRandomOrder()->take(4)->get();
        $firstRelatedPost = $relatedPosts->splice(0, 1);
        $firstRelatedPosts2 = $relatedPosts->splice(0, 2);
        $lastRelatedPost = $relatedPosts->splice(0, 1);

        $category = Category::all();
        $tagdata = Tag::orderBy('created_at', 'DESC')->get();
        return view('website.post',compact(['post','popular','category','tagdata','firstRelatedPost','firstRelatedPosts2','lastRelatedPost']));       
    }
    public function category($slug)
    {
        //dd($slug);
        $catdata = Category::where('slug', $slug)->first();
        $posts = Post::with('category','user')->where('category_id',$catdata->id)->orderBy('created_at','DESC')->paginate(9);
        //dd($category);
        return view('website.category',compact(['catdata','posts']));
    }
    public function tag($slug)
    {
        //dd($slug);
        $tag = Tag::where('slug', $slug)->first();
        $posts = $tag->posts()->orderBy('created_at', 'desc')->paginate(9);
        //dd($posts);
        //return $posts;
        return view('website.tag',compact(['tag','posts']));
    }
    public function contact()
    {
        return view('website.contact');
    }
    public function Message_send(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email|max:200',
            'subject' => 'required|max:255',
            'message' => 'required|min:50',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        $notification=array(
            'message'=>'Successfully Send Message!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
