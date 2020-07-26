<?php

namespace App\Http\Controllers;
use App\Tag;
use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $data['post'] = Post::all()->count();
        $data['cat'] = Category::all()->count();
        $data['tag'] = Tag::all()->count();
        $data['user'] = User::all()->count();

        return view('backend.dashboard.index',$data);
    }
}
