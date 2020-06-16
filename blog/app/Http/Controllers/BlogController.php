<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    
    public function index(){
        // \DB::enableQueryLog();
        $posts = Post::with('author')
                    ->latestFirst()
                    ->published()
                    ->simplePaginate(3);

        return view('blog.index',compact('posts'));
        // dd(\DB::getQueryLog());
    }

    public function show(Post $post){
        
        return view('blog.show',compact('post'));
    }
}
