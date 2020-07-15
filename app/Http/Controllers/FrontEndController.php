<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class FrontEndController extends Controller
{
    public function home()
    {
        $data['posts'] = Post::orderBy('created_at','DESC')->take(5)->get();
        $data['recentPosts'] = Post::orderBy('created_at','DESC')->paginate(9);
        return view('website.home',$data);
    }
    public function about()
    {
        return view('website.about');
    }
    public function post()
    {
        return view('website.post');
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
