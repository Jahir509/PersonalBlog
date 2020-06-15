<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index(){
        // \DB::enableQueryLog();
        $posts = Post::with('author')->LatestFirst()->simplePaginate(3);

        return view('blog.index',compact('posts'));
        // dd(\DB::getQueryLog());
    }
}
