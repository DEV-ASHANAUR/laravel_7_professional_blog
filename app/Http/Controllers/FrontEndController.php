<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
class FrontEndController extends Controller
{
    public function home()
    {
        $posts = Post::with('category', 'user')->orderBy('created_at','DESC')->take(5)->get();
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
        return view('website.about');
    }
    public function singlepost($slug)
    {
        $post = Post::with('category','user')->where('slug',$slug)->first();
        $popular = Post::with('category', 'user')->inRandomOrder()->limit(3)->get();
        $category = Category::all();
        $tagdata = Tag::orderBy('created_at', 'DESC')->get();
        return view('website.post',compact(['post','popular','category','tagdata']));       
    }
    public function category()
    {
        return view('website.category');
    }
    public function contact()
    {
        return view('website.contact');
    }
}
